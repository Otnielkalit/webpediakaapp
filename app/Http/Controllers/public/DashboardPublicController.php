<?php

namespace App\Http\Controllers\public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardPublicController extends Controller
{
    public function welcome()
    {

        return view('public.pages.welcome', [
            'title' => 'Selamat Datang di Apliaksi pedika pp'
        ]);
    }

    public function feature()
    {
        return view('public.pages.feature', [
            'title' => 'Fitur Aplikasi Pedika App'
        ]);
    }
    public function blog()
    {
        return view('public.pages.blog', [
            'title' => 'Blog Pedika App'
        ]);
    }

    public function detailBlog()
    {
        return view('public.pages.blog_detail', [
            'title' => 'Detail Blog Pedika App'
        ]);
    }
    public function contact()
    {
        return view('public.pages.contact', [
            'title' => 'Contact Kami'
        ]);
    }
}
