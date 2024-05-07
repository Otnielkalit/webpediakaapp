<?php

namespace App\Http\Controllers\admin;

use App\Helpers\ApiHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AdminContentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $headers = ApiHelper::getAuthorizationHeader($request);
        $response = Http::withHeaders($headers)->get(env('API_URL') . 'api/admin/contents');
        if ($response->successful()) {
            $contents = $response->json()['Data'];
        } else {
            $contents = [];
        }
        return view('admin.pages.content.index', [
            'title' => 'Content',
            'contents' => $contents,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $headers = ApiHelper::getAuthorizationHeader($request);
        $response = Http::withHeaders($headers)->get(env('API_URL') . 'api/admin/violence-categories');
        if ($response->successful()) {
            $categoryViolence = $response->json()['Data'];
        } else {
            $categoryViolence = [];
        }
        return view('admin.pages.content.create', [
            'title' => 'Create a new resource',
            'categoryViolence' => $categoryViolence,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
