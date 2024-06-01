<?php

namespace App\Http\Controllers\admin;

use App\Helpers\ApiHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

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
    public function create()
    {
        $headers = ApiHelper::getAuthorizationHeader(request());
        $responseCategories = Http::withHeaders($headers)->get(env('API_URL') . 'api/admin/violence-categories');

        $categoryViolences = [];
        if ($responseCategories->successful()) {
            $categoryViolences = $responseCategories->json()['Data'];
        }

        return view('admin.pages.content.create', [
            'title' => 'Buat Konten Baru',
            'category_violences' => $categoryViolences,
        ]);
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Prepare the headers
        $headers = ApiHelper::getAuthorizationHeader($request);

        // Validate the request
        $validator = Validator::make($request->all(), [
            'nama_event' => 'required|string|max:255',
            'tanggal_pelaksanaan' => 'required|date',
            'deskripsi_event' => 'required|string',
            'thumbnail_event' => 'required|image|mimes:jpeg,png,jpg,gif|max:5000',
        ]);

        // Handle validation failure
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Handle the image file
        $image = $request->file('thumbnail_event');
        $imageContent = file_get_contents($image);

        // Prepare the data for the API request
        $data = [
            'nama_event' => $request->input('nama_event'),
            'tanggal_pelaksanaan' => $request->input('tanggal_pelaksanaan'),
            'deskripsi_event' => $request->input('deskripsi_event'),
        ];

        // Make the API request
        $response = Http::withHeaders($headers)
            ->attach('thumbnail_event', $imageContent, $image->getClientOriginalName())
            ->post(env('API_URL') . 'api/admin/create-event', $data);

        // Handle the API response
        if ($response->successful()) {
            Alert::success('Success', $response->json('message'));
            return redirect()->route('event.index')->with('success', 'Event berhasil dibuat.');
        } else {
            Alert::error('Error', $response->json('message'));
            return redirect()->back()->with('error', 'Gagal membuat event. Silakan coba lagi.');
        }
    }





    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id)
    {
        $headers = ApiHelper::getAuthorizationHeader($request);
        $response = Http::withHeaders($headers)->get(env('API_URL') . 'api/admin/detail-content/' . $id);

        if ($response->successful()) {
            $contentDetail = $response->json()['Data'];
            return view('admin.pages.content.detail', [
                'title' => 'Detail Konten',
                'contentDetail' => $contentDetail,
            ]);
        } else {
            return redirect()->back()->with('error', 'Gagal mengambil data konten. Silakan coba lagi.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        $headers = ApiHelper::getAuthorizationHeader($request);
        $response = Http::withHeaders($headers)->get(env('API_URL') . 'api/admin/detail-content/' . $id);

        if ($response->successful()) {
            $content = $response->json()['Data'];
            return view('admin.pages.content.update', [
                'title' => 'Edit Konten',
                'content' => $content,
            ]);
        } else {
            return redirect()->back()->with('error', 'Gagal mengambil data konten. Silakan coba lagi.');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'judul' => 'required|string|max:255',
            'isi_content' => 'required|string',
            'image_content' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:7000',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $headers = ApiHelper::getAuthorizationHeader($request);
        $judul = $request->input('judul');
        $isi_content = $request->input('isi_content');
        $image_content = $request->file('image_content');

        $response = Http::withHeaders($headers)
            ->asMultipart();

        $response->attach('judul', $judul);
        $response->attach('isi_content', $isi_content);

        if ($image_content) {
            $response->attach('image_content', file_get_contents($image_content), $image_content->getClientOriginalName());
        }

        $response = $response->put(env('API_URL') . 'api/admin/edit-content/' . $id);

        if ($response->successful()) {
            Alert::success('Success', $response->json('message'));
            return redirect()->route('content.index')->with('success', 'Konten berhasil diperbarui');
        } else {
            Alert::error('Error', $response->json('message'));
            return redirect()->back()->with('error', 'Gagal memperbarui konten. Silakan coba lagi.');
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        $headers = ApiHelper::getAuthorizationHeader($request);
        $response = Http::withHeaders($headers)->delete(env('API_URL') . "api/admin/delete-content/{$id}");

        if ($response->successful()) {
            Alert::success('Success', $response->json('message'));
            return redirect()->route('content.index');
        } else {
            Alert::error('Error', $response->json('message'));
            return redirect()->back();
        }
    }
}
