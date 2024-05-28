<?php

namespace App\Http\Controllers\admin;

use App\Helpers\ApiHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class AdminLaporanController extends Controller
{

    public function masuk(Request $request)
    {
        $headers = ApiHelper::getAuthorizationHeader($request);
        $response = Http::withHeaders($headers)->get(env('API_URL') . 'api/admin/laporans');

        $laporans = [];

        if ($response->successful()) {
            $data = $response->json();
            if (isset($data['Data']) && is_array($data['Data'])) {
                $laporans = array_filter($data['Data'], function ($item) {
                    return isset($item['status']) && $item['status'] == 'Laporan masuk';
                });
            }
        }

        return view('admin.pages.laporan.baru_masuk.index', [
            'title' => 'Laporan Masyarakat',
            'laporans' => $laporans,
        ]);
    }


    public function masukDetail(Request $request, string $no_registrasi)
    {
        $headers = ApiHelper::getAuthorizationHeader($request);
        $response = Http::withHeaders($headers)->get(env('API_URL') . 'api/admin/detail-laporan/' . $no_registrasi);
        if ($response->successful()) {
            $laporanDetail = $response->json()['Data'];
            return view('admin.pages.laporan.baru_masuk.detail_laporan', [
                'title' => 'Detail Laporan',
                'laporanDetail' => $laporanDetail,
            ]);
        }
        return redirect()->back()->with('error', 'Failed to fetch report detail');
    }


    public function lihat(Request $request)
    {
        $no_registrasi = $request->route('no_registrasi');

        Log::info('no_registrasi: ' . $no_registrasi);

        $headers = ApiHelper::getAuthorizationHeader($request);
        $response = Http::withHeaders($headers)->put(env('API_URL') . 'api/admin/lihat-laporan/' . $no_registrasi);

        if ($response->successful()) {
            return redirect()->route('laporan.detail-dilihat', ['no_registrasi' => $no_registrasi])->with('success', 'Laporan berhasil dilihat.');
        }

        return redirect()->back()->with('error', 'Gagal menyetujui janji temu. Silakan coba lagi.');
    }




    public function dilihat(Request $request)
    {
        $headers = ApiHelper::getAuthorizationHeader($request);
        $response = Http::withHeaders($headers)->get(env('API_URL') . 'api/admin/laporans');

        $laporanDilihat = [];

        if ($response->successful()) {
            $data = $response->json();
            if (isset($data['Data']) && is_array($data['Data'])) {
                $laporanDilihat = array_filter($data['Data'], function ($item) {
                    return isset($item['status']) && $item['status'] == 'Dilihat';
                });
            }
        }

        return view('admin.pages.laporan.dilihat.laporan_dilihat', [
            'title' => 'Laporan Masyarakat',
            'laporanDilihat' => $laporanDilihat,
        ]);
    }

    public function detailDilihat(Request $request, string $no_registrasi)
    {
        $headers = ApiHelper::getAuthorizationHeader($request);
        $response = Http::withHeaders($headers)->get(env('API_URL') . 'api/admin/detail-laporan/' . $no_registrasi);
        if ($response->successful()) {
            $laporanDetailDilihat = $response->json()['Data'];
            return view('admin.pages.laporan.dilihat.detail_laporan_dilihat', [
                'title' => 'Detail Laporan Diproses' . $no_registrasi,
                'laporanDetailDilihat' => $laporanDetailDilihat,
            ]);
        }
        return redirect()->back()->with('error', 'Failed to fetch report detail');
    }

    public function proses(Request $request, string $no_registrasi)
    {
        $headers = ApiHelper::getAuthorizationHeader($request);
        $response = Http::withHeaders($headers)->put(env('API_URL') . 'api/admin/proses-laporan/' . $no_registrasi);

        if ($response->successful()) {
            return redirect()->route('laporan.detail-diproses', ['no_registrasi' => $no_registrasi])->with('success', 'Sekarang Laporan telah diproses.');
        }

        return redirect()->back()->with('error', 'Gagal menyetujui janji temu. Silakan coba lagi.');
    }

    public function diproses(Request $request)
    {
        $headers = ApiHelper::getAuthorizationHeader($request);
        $response = Http::withHeaders($headers)->get(env('API_URL') . 'api/admin/laporans');
        if ($response->successful()) {
            $laporanDiproses = $response->json()['Data'];
            $laporanDiproses = array_filter($laporanDiproses, function ($item) {
                return $item['status'] == 'Diproses';
            });
        } else {
            $laporanDiproses = [];
        }
        return view('admin.pages.laporan.diproses.laporan_diproses', [
            'title' => 'Laporan Masyarakat',
            'laporanDiproses' => $laporanDiproses,
        ]);
    }

    public function detailDiProses(Request $request, string $no_registrasi)
    {
        $headers = ApiHelper::getAuthorizationHeader($request);
        $response = Http::withHeaders($headers)->get(env('API_URL') . 'api/admin/detail-laporan/' . $no_registrasi);
        if ($response->successful()) {
            $laporanDetailDiproses = $response->json()['Data'];
            return view('admin.pages.laporan.diproses.detail_laporan_diproses', [
                'title' => 'Detail Laporan Diproses',
                'laporanDetailDiproses' => $laporanDetailDiproses,
            ]);
        }
        return redirect()->back()->with('error', 'Failed to fetch report detail');
    }



    public function dibatalkan(Request $request)
    {
        $headers = ApiHelper::getAuthorizationHeader($request);
        $response = Http::withHeaders($headers)->get(env('API_URL') . 'api/admin/laporans');
        if ($response->successful()) {
            $laporanDibatalkan = $response->json()['Data'];
            $laporanDibatalkan = array_filter($laporanDibatalkan, function ($item) {
                return $item['status'] == 'Dibatalkan';
            });
        } else {
            $laporanDibatalkan = [];
        }
        return view('admin.pages.laporan.dibatalkan.laporan_dibatalkan', [
            'title' => 'Laporan Masyarakat Yang dibatalkan',
            'laporanDibatalkan' => $laporanDibatalkan,
        ]);
    }

    public function detailDibatalkan(Request $request, string $no_registrasi)
    {
        $headers = ApiHelper::getAuthorizationHeader($request);
        $response = Http::withHeaders($headers)->get(env('API_URL') . 'api/admin/detail-laporan/' . $no_registrasi);
        if ($response->successful()) {
            $laporanDetailDibatalkan = $response->json()['Data'];
            return view('admin.pages.laporan.dibatalkan.detail_laporan_dibatalkan', [
                'title' => 'Detail Laporan',
                'laporanDetailDibatalkan' => $laporanDetailDibatalkan,
            ]);
        }
        return redirect()->back()->with('error', 'Failed to fetch report detail');
    }

    public function selesai(Request $request)
    {
        $headers = ApiHelper::getAuthorizationHeader($request);
        $response = Http::withHeaders($headers)->get(env('API_URL') . 'api/admin/laporans');
        if ($response->successful()) {
            $laporanSelesai = $response->json()['Data'];
            $laporanSelesai = array_filter($laporanSelesai, function ($item) {
                return $item['status'] == 'Selesai';
            });
        } else {
            $laporanSelesai = [];
        }
        return view('admin.pages.laporan.selesai.laporan_selesai', [
            'title' => 'Laporan Masyarakat',
            'laporanSelesai' => $laporanSelesai,
        ]);
    }

    public function detailSelesai(Request $request, string $no_registrasi)
    {
        $headers = ApiHelper::getAuthorizationHeader($request);
        $response = Http::withHeaders($headers)->get(env('API_URL') . 'api/admin/detail-laporan/' . $no_registrasi);
        if ($response->successful()) {
            $laporanDetailSelesai = $response->json()['Data'];
            return view('admin.pages.laporan.dibatalkan.detail_laporan_dibatalkan', [
                'title' => 'Detail Laporan Yang sudah Selesai',
                'laporanDetailSelesai' => $laporanDetailSelesai,
            ]);
        }
        return redirect()->back()->with('error', 'Failed to fetch report detail');
    }
}
