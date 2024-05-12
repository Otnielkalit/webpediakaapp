<?php

namespace App\Http\Controllers\admin;

use App\Helpers\ApiHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class AdminLaporanController extends Controller
{

    public function index(Request $request)
    {
        $headers = ApiHelper::getAuthorizationHeader($request);
        $response = Http::withHeaders($headers)->get(env('API_URL') . 'api/admin/laporan');
        if ($response->successful()) {
            $laporan = $response->json()['Data'];
        } else {
            $laporan = [];
        }
        return view('admin.pages.laporan.index', [
            'title' => 'Laporan Masyarakat',
            'laporan' => $laporan,
        ]);
    }


    public function detail(Request $request, string $no_registrasi)
    {
        $headers = ApiHelper::getAuthorizationHeader($request);
        $response = Http::withHeaders($headers)->get(env('API_URL') . 'api/admin/detail-laporan/' . $no_registrasi);
        if ($response->successful()) {
            $laporanDetail = $response->json()['Data'];
            return view('admin.pages.laporan.detail_laporan', [
                'title' => 'Detail Laporan',
                'laporanDetail' => $laporanDetail,
            ]);
        }
        return redirect()->route('admin.laporan')->with('error', 'Failed to fetch report detail');
    }
}
