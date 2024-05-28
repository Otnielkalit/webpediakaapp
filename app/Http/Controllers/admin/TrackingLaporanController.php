<?php

namespace App\Http\Controllers\admin;

use App\Helpers\ApiHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class TrackingLaporanController extends Controller
{
    public function store(Request $request)
    {
        $headers = ApiHelper::getAuthorizationHeader($request);
        $validator = Validator::make($request->all(), [
            'no_registrasi' => 'required|string|max:255',
            'keterangan' => 'required|string|max:255',
            'file.*' => 'required|file|mimes:jpeg,png,jpg,gif,mp4,avi,mkv,pdf,doc,docx|max:7000',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $no_registrasi = $request->input('no_registrasi');
        $keterangan = $request->input('keterangan');
        $documents = $request->file('document');
        $response = Http::withHeaders($headers)
            ->asMultipart();

        // Menambahkan file ke request
        foreach ($documents as $document) {
            $response->attach('file[]', file_get_contents($document), $document->getClientOriginalName());
        }

        // Mengirim data ke API
        $response = $response->post(env('API_URL') . 'api/admin/create-tracking-laporan', [
            'no_registrasi' => $no_registrasi,
            'keterangan' => $keterangan,
        ]);

        // Memeriksa apakah request berhasil
        if ($response->successful()) {
            return redirect()->route('tracking.index')->with('success', 'Tracking laporan berhasil dibuat');
        } else {
            // Mendapatkan pesan error dari response
            $errorMessage = $response->json()['message'] ?? 'Gagal membuat tracking laporan. Silakan coba lagi.';
            return redirect()->back()->with('error', $errorMessage);
        }
    }
}
