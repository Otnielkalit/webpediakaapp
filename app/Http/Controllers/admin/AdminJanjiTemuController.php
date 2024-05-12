<?php

namespace App\Http\Controllers\admin;

use App\Helpers\ApiHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AdminJanjiTemuController extends Controller
{
    public function index(Request $request)
    {
        $headers = ApiHelper::getAuthorizationHeader($request);
        $response = Http::withHeaders($headers)->get(env('API_URL') . 'api/admin/janjitemus');

        if ($response->successful()) {
            $janjitemus = $response->json()['Data'];
            $janjitemus = array_filter($janjitemus, function ($item) {
                return $item['status'] == 'Belum disetujui';
            });
        } else {
            $janjitemus = [];
        }

        return view('admin.pages.janji_temu.janji_temu_index', [
            'title' => 'Jani Temu',
            'janjitemus' => $janjitemus,
        ]);
    }


    public function disetujui(Request $request)
    {

        $headers = ApiHelper::getAuthorizationHeader($request);
        $response = Http::withHeaders($headers)->get(env('API_URL') . 'api/admin/janjitemus');

        if ($response->successful()) {
            $janjitemus = $response->json()['Data'];
            $janjitemus = array_filter($janjitemus, function ($item) {
                return $item['status'] == 'Disetujui';
            });
        } else {
            $janjitemus = [];
        }
        return view('admin.pages.janji_temu.janji_temu_disetujui', [
            'title' => "Janji Temu",
            'janjitemus' => $janjitemus
        ]);
    }

    public function ditolak(Request $request)
    {
        $headers = ApiHelper::getAuthorizationHeader($request);
        $response = Http::withHeaders($headers)->get(env('API_URL') . 'api/admin/janjitemus');

        if ($response->successful()) {
            $janjitemus = $response->json()['Data'];
            $janjitemus = array_filter($janjitemus, function ($item) {
                return $item['status'] == 'Ditolak';
            });
        } else {
            $janjitemus = [];
        }

        return view('admin.pages.janji_temu.janji_temu_ditolak', [
            'title' => "Janji Temu Ditolak",
            'janjitemus' => $janjitemus
        ]);
    }

    public function dibatalkan(Request $request)
    {
        $headers = ApiHelper::getAuthorizationHeader($request);
        $response = Http::withHeaders($headers)->get(env('API_URL') . 'api/admin/janjitemus');

        if ($response->successful()) {
            $janjitemus = $response->json()['Data'];
            $janjitemus = array_filter($janjitemus, function ($item) {
                return $item['status'] == 'Dibatalkan';
            });
        } else {
            $janjitemus = [];
        }

        return view('admin.pages.janji_temu.janji_temu_dibatalakan', [
            'title' => "Janji Temu Dibatalkan",
            'janjitemus' => $janjitemus
        ]);
    }
}
