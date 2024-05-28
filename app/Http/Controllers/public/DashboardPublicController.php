<?php

namespace App\Http\Controllers\public;

use App\Http\Controllers\Controller;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Http;

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
        try {
            $response = Http::get(env('API_URL') . 'api/publik-content');
            if ($response->successful()) {
                $contents = $response->json()['Data'];
            } else {
                $contents = [];
            }
        } catch (\Exception $e) {
            $contents = [];
        }

        return view('public.pages.blog', [
            'title' => 'Blog Pedika App',
            'contents' => $contents
        ]);
    }

    
    public function detailBlog($id)
    {
        try {
            $page = request()->input('page', 1);
            $response = Http::get(env('API_URL') . 'api/detail-content/' . $id . '?page=' . $page);
            if ($response->successful()) {
                $data = $response->json();
                if (isset($data['data']) && isset($data['total']) && isset($data['per_page']) && isset($data['current_page'])) {
                    $contents = $data['data'];
                    $total = $data['total'];
                    $perPage = $data['per_page'];
                    $currentPage = $data['current_page'];
                    $paginatedContent = new LengthAwarePaginator(
                        $contents,
                        $total,
                        $perPage,
                        $currentPage,
                        ['path' => Paginator::resolveCurrentPath()]
                    );
                } else {
                    $paginatedContent = null;
                }
            } else {
                $paginatedContent = null;
            }
        } catch (\Exception $e) {
            $paginatedContent = null;
        }

        return view('public.pages.blog_detail', [
            'title' => $paginatedContent ? 'Blog Detail' : 'Blog Detail',
            'contents' => $paginatedContent
        ]);
    }


    public function contact()
    {
        return view('public.pages.contact', [
            'title' => 'Contact Kami'
        ]);
    }
}
