<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DashboardAdminController extends Controller
{
    public function dashboard(Request $request)
    {
        $userData = $request->cookie('user_data');
        return view('admin.pages.admin_dashboard', [
            'title' => 'Dashboard Admin',
            'user' => $userData
        ]);
    }
    public function laporan(Request $request)
    {
        $token = $request->cookie('user_token');
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->get('http://localhost:8080/api/admin/laporan');
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

    public function detailLaporan()
    {
        return view('admin.pages.laporan.detail_laporan', [
            'title' => 'Detail Laporan Masyarakat',
        ]);
    }
}
