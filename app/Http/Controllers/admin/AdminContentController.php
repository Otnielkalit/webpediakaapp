<?php

namespace App\Http\Controllers\admin;

use App\Helpers\ApiHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

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
        $headers = ApiHelper::getAuthorizationHeader($request);
        $judul = $request->input('judul');
        $isi_content = $request->input('isi_content');
        $image_content = $request->file('image_content');
        $validator = Validator::make($request->all(), [
            'judul' => 'required|string|max:255',
            'isi_content' => 'required|string',
            'image_content' => 'required|image|mimes:jpeg,png,jpg,gif|max:5000',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $response = Http::withHeaders($headers)
            ->attach('image_content', file_get_contents($image_content), $image_content->getClientOriginalName())
            ->post(env('API_URL') . 'api/admin/create-content', [
                'judul' => $judul,
                'isi_content' => $isi_content,
            ]);
        if ($response->successful()) {
            return redirect()->route('content.index')->with('success', 'Kategori kekerasan berhasil ditambahkan.');
        } else {
            return redirect()->back()->with('error', 'Gagal menambahkan kategori kekerasan. Silakan coba lagi.');
        }
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
    public function destroy(Request $request, string $id)
    {
        $headers = ApiHelper::getAuthorizationHeader($request);
        $response = Http::withHeaders($headers)->delete(env('API_URL') . "api/admin/delete-content/{$id}");
        if ($response->successful()) {
            return redirect()->route('content.index')->with('success', 'Kategori kekerasan berhasil dihapus.');
        } else {
            return redirect()->back()->with('error', 'Gagal menghapus kategori kekerasan. Silakan coba lagi.');
        }
    }
}
