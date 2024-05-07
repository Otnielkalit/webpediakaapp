<?php

namespace App\Http\Controllers\admin;

use App\Helpers\ApiHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class AdminEventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $headers = ApiHelper::getAuthorizationHeader($request);
        $response = Http::withHeaders($headers)->get(env('API_URL') . 'api/admin/event');
        if ($response->successful()) {
            $events = $response->json()['Data'];
        } else {
            $events = [];
        }
        return view('admin.pages.event.index', [
            'title' => 'Event DPMDPPA',
            'events' => $events,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.event.create', [
            'title' => 'Create Event'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $headers = ApiHelper::getAuthorizationHeader($request);
        $category_name = $request->input('category_name');
        $image = $request->file('image');
        $validator = Validator::make($request->all(), [
            'category_name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $response = Http::withHeaders($headers)
            ->attach('image', file_get_contents($image), $image->getClientOriginalName())
            ->post(env('API_URL') . 'api/admin/create-violence-category', [
                'category_name' => $category_name,
            ]);
        if ($response->successful()) {
            return redirect()->route('category-violence.index')->with('success', 'Kategori kekerasan berhasil ditambahkan.');
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
    public function destroy(string $id)
    {
        //
    }
}
