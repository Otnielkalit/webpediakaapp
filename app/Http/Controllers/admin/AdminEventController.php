<?php

namespace App\Http\Controllers\admin;

use App\Helpers\ApiHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

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
        // Validate the request
        $validator = Validator::make($request->all(), [
            'nama_event' => 'required|string|max:255',
            'tanggal_pelaksanaan' => 'required|date',
            'isi_content' => 'required|string',
            'thumbnail_event' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle validation failure
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Handle the image file
        $image = $request->file('image');
        $thumbnailEvent = $image ? file_get_contents($image) : null;

        // Prepare the headers
        $headers = ApiHelper::getAuthorizationHeader($request);

        // Prepare the data for the API request
        $data = [
            'nama_event' => $request->input('nama_event'),
            'tanggal_pelaksanaan' => $request->input('tanggal_pelaksanaan'),
            'isi_content' => $request->input('isi_content'),
        ];

        // Make the API request
        $response = Http::withHeaders($headers)
            ->attach('image', $thumbnailEvent, $image ? $image->getClientOriginalName() : '')
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
