<?php

namespace App\Http\Controllers\admin;

use App\Helpers\ApiHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

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
            'title' => 'Janji Temu Belum Disetujui',
            'janjitemus' => $janjitemus,
        ]);
    }

    public function detailJanjiTemu(Request $request, $id)
    {
        $headers = ApiHelper::getAuthorizationHeader($request);
        $response = Http::withHeaders($headers)->get(env('API_URL') . 'api/admin/detail-janjitemu/' . $id);

        if ($response->successful()) {
            $detailJanjiTemu = $response->json()['Data'];
            return view('admin.pages.janji_temu.detail_janjitemu', [
                'title' => 'Detail Janji Temu',
                'detailJanjiTemu' => $detailJanjiTemu,
            ]);
        }

        return redirect()->route('janji-temu.index')->with('error', 'Failed to fetch report detail');
    }

    public function setujui(Request $request, $id)
    {
        $headers = ApiHelper::getAuthorizationHeader($request);
        $response = Http::withHeaders($headers)->put(env('API_URL') . 'api/admin/approve-janjitemu/' . $id);

        if ($response->successful()) {
            return redirect()->route('janji-temu.detail-disetujui', ['id' => $id])->with('success', 'Janji temu berhasil disetujui.');
        }

        return redirect()->back()->with('error', 'Gagal menyetujui janji temu. Silakan coba lagi.');
    }

    public function tolak(Request $request, $id)
    {
        $headers = ApiHelper::getAuthorizationHeader($request);
        $validator = Validator::make($request->all(), [
            'alasan_ditolak' => 'required|string|max:255',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $alasan_ditolak = $request->input('alasan_ditolak');
        $response = Http::withHeaders($headers)
            ->asMultipart()
            ->attach('alasan_ditolak', $alasan_ditolak)
            ->put(env('API_URL') . 'api/admin/cancel-janjitemu/' . $id);
        if ($response->successful()) {
            return redirect()->route('janji-temu.detail-ditolak', ['id' => $id])->with('success', 'Janji temu berhasil ditolak.');
        } else {
            $errorMessage = $response->json()['message'] ?? 'Gagal memperbarui janji temu. Silakan coba lagi.';
            return redirect()->back()->with('error', $errorMessage);
        }
    }





    public function disetujui(Request $request)
    {

        $headers = ApiHelper::getAuthorizationHeader($request);
        $response = Http::withHeaders($headers)->get(env('API_URL') . 'api/admin/janjitemus');

        if ($response->successful()) {
            $janjitemusDisetujui = $response->json()['Data'];
            $janjitemusDisetujui = array_filter($janjitemusDisetujui, function ($item) {
                return $item['status'] == 'Disetujui';
            });
        } else {
            $janjitemusDisetujui = [];
        }
        return view('admin.pages.janji_temu.janji_temu_disetujui', [
            'title' => "Janji Temu Disetujui",
            'janjitemusDisetujui' => $janjitemusDisetujui
        ]);
    }

    public function detailDisetujui(Request $request, $id)
    {
        $headers = ApiHelper::getAuthorizationHeader($request);
        $response = Http::withHeaders($headers)->get(env('API_URL') . 'api/admin/detail-janjitemu/' . $id);

        if ($response->successful()) {
            $detailDisetujui = $response->json()['Data'];
            return view('admin.pages.janji_temu.janji_temu_detail_disetujui', [
                'title' => 'Detail Janji Temu',
                'detailDisetujui' => $detailDisetujui,
            ]);
        }
        return redirect()->route('janji-temu.disetujui')->with('error', 'Failed to fetch report detail');
    }

    public function ditolak(Request $request)
    {
        $headers = ApiHelper::getAuthorizationHeader($request);
        $response = Http::withHeaders($headers)->get(env('API_URL') . 'api/admin/janjitemus');

        if ($response->successful()) {
            $janjitemusDitolak = $response->json()['Data'];
            $janjitemusDitolak = array_filter($janjitemusDitolak, function ($item) {
                return $item['status'] == 'Ditolak';
            });
        } else {
            $janjitemusDitolak = [];
        }

        return view('admin.pages.janji_temu.janji_temu_ditolak', [
            'title' => "Janji Temu Ditolak",
            'janjitemusDitolak' => $janjitemusDitolak
        ]);
    }

    public function detailDitolak(Request $request, $id)
    {
        $headers = ApiHelper::getAuthorizationHeader($request);
        $response = Http::withHeaders($headers)->get(env('API_URL') . 'api/admin/detail-janjitemu/' . $id);

        if ($response->successful()) {
            $detailDitolak = $response->json()['Data'];
            return view('admin.pages.janji_temu.janji_temu_detail_ditolak', [
                'title' => 'Detail Janji Temu ditolak',
                'detailDitolak' => $detailDitolak,
            ]);
        }
        return redirect()->route('janji-temu.ditolak')->with('error', 'Failed to fetch report detail');
    }

    public function dibatalkan(Request $request)
    {
        $headers = ApiHelper::getAuthorizationHeader($request);
        $response = Http::withHeaders($headers)->get(env('API_URL') . 'api/admin/janjitemus');

        if ($response->successful()) {
            $janjitemusDibatalkan = $response->json()['Data'];
            $janjitemusDibatalkan = array_filter($janjitemusDibatalkan, function ($item) {
                return $item['status'] == 'Dibatalkan';
            });
        } else {
            $janjitemusDibatalkan = [];
        }

        return view('admin.pages.janji_temu.janji_temu_dibatalakan', [
            'title' => "Janji Temu Dibatalkan",
            'janjitemusDibatalkan' => $janjitemusDibatalkan
        ]);
    }

    public function detailDibatalkan(Request $request, $id)
    {
        $headers = ApiHelper::getAuthorizationHeader($request);
        $response = Http::withHeaders($headers)->get(env('API_URL') . 'api/admin/detail-janjitemu/' . $id);

        if ($response->successful()) {
            $detailDibatalkan = $response->json()['Data'];
            return view('admin.pages.janji_temu.janji_temu_detail_dibatalkan', [
                'title' => 'Detail Janji Temu dibatalkan',
                'detailDibatalkan' => $detailDibatalkan,
            ]);
        }
        return redirect()->route('janji-temu.disetujui')->with('error', 'Failed to fetch report detail');
    }
}
