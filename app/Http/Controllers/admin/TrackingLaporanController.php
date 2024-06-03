<?php

namespace App\Http\Controllers\admin;

use App\Helpers\ApiHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class TrackingLaporanController extends Controller
{


    public function store(Request $request)
    {
        $headers = ApiHelper::getAuthorizationHeader($request);
        $validator = Validator::make($request->all(), [
            'no_registrasi' => 'required|string|max:255',
            'keterangan' => 'required|string|max:255',
            'document' => 'required|file|mimes:jpeg,png,jpg|max:7000',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $no_registrasi = $request->input('no_registrasi');
        $keterangan = $request->input('keterangan');
        $document = $request->file('document');

        $response = Http::withHeaders($headers)
            ->asMultipart()
            ->attach('document', file_get_contents($document), $document->getClientOriginalName())
            ->post(env('API_URL') . 'api/admin/create-tracking-laporan', [
                'no_registrasi' => $no_registrasi,
                'keterangan' => $keterangan,
            ]);

        if ($response->successful()) {
            Alert::success('Success', $response->json('message'));
            return redirect()->back();
        } else {
            Alert::success('Success', $response->json('message'));
            return redirect()->back();
        }
    }
}
