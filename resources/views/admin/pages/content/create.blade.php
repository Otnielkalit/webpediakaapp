@extends('admin.layouts.admin_master')
@section('content')
    <h1>Buat Kategori kekerasan</h1>
    <div class="card mb-4">
        <h5 class="card-header">Tambah Kategory kekerasan</h5>
        <div class="card-body">
            <form action="{{ route('content.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="judul" class="form-label">Judul Content</label>
                    <input class="form-control" type="text" name="judul" id="judul">
                </div>
                <div class="mb-3">
                    <label for="isi_content" class="form-label">Isi Kontent</label>
                    <textarea id="basic-default-message" class="form-control" name="isi_content"></textarea>
                </div>
                <div class="mb-3 col-md-6">
                    <label for="image_content" class="form-label">Gambar Konten</label>
                    <input class="form-control" type="file" id="image_content" name="image_content">
                </div>
                <div class="mt-2">
                    <button type="submit" class="btn btn-primary me-2">Tambah Sekarang</button>
                </div>
            </form>
        </div>
    </div>
@endsection
