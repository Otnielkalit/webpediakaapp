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
    
}
