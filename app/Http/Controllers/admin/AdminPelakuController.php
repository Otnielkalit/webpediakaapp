<?php

namespace App\Http\Controllers\admin;

use App\Helpers\ApiHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Http;
use RealRashid\SweetAlert\Facades\Alert;

class AdminPelakuController extends Controller
{
    public function store(Request $request)
    {
        $headers = ApiHelper::getAuthorizationHeader($request);
        $no_registrasi = $request->input('no_registrasi');
        $nik_pelaku = $request->input('nik_pelaku');
        $nama_pelaku = $request->input('nama_pelaku');
        $usia_pelaku = $request->input('usia_pelaku');
        $jenis_kelamin = $request->input('jenis_kelamin');
        $agama = $request->input('agama');
        $no_telepon = $request->input('no_telepon');
        $pendidikan = $request->input('pendidikan');
        $pekerjaan = $request->input('pekerjaan');
        $status_perkawinan = $request->input('status_perkawinan');
        $kebangsaan = $request->input('kebangsaan');
        $hubungan_dengan_korban = $request->input('hubungan_dengan_korban');
        $keterangan_lainnya = $request->input('keterangan_lainnya');
        $image = $request->file('image');
        $validator = Validator::make($request->all(), [
            'no_registrasi' => 'required|string|max:255',
            'nik_pelaku' => 'required|string|max:255',
            'nama_pelaku' => 'required|string|max:255',
            'usia_pelaku' => 'required|integer',
            'jenis_kelamin' => 'required|string|max:255',
            'agama' => 'required|string|max:255',
            'no_telepon' => 'required|string|max:255',
            'pendidikan' => 'required|string|max:255',
            'pekerjaan' => 'required|string|max:255',
            'status_perkawinan' => 'required|string|max:255',
            'kebangsaan' => 'required|string|max:255',
            'hubungan_dengan_korban' => 'required|string|max:255',
            'keterangan_lainnya' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:7000',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $response = Http::withHeaders($headers)
            ->attach('image', file_get_contents($image), $image->getClientOriginalName())
            ->post(env('API_URL') . 'api/admin/create-pelaku-kekerasan', [
                'no_registrasi' => $no_registrasi,
                'nik_pelaku' => $nik_pelaku,
                'nama_pelaku' => $nama_pelaku,
                'usia_pelaku' => $usia_pelaku,
                'jenis_kelamin' => $jenis_kelamin,
                'agama' => $agama,
                'no_telepon' => $no_telepon,
                'pendidikan' => $pendidikan,
                'pekerjaan' => $pekerjaan,
                'status_perkawinan' => $status_perkawinan,
                'kebangsaan' => $kebangsaan,
                'hubungan_dengan_korban' => $hubungan_dengan_korban,
                'keterangan_lainnya' => $keterangan_lainnya,
            ]);

        if ($response->successful()) {
            Alert::success('Success', $response->json('message'));
            return redirect()->back()->with('success', 'Data pelaku berhasil ditambahkan');
        } else {
            Alert::error('Success', $response->json('message'));
            return redirect()->back()->with('error', 'Gagal menambahkan data pelaku. Silakan coba lagi.');
        }
    }
}
