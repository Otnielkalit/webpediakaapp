@extends('admin.layouts.admin_master')
@section('content')
    <h1>Buat Kategori kekerasan</h1>
    <div class="card mb-4">
        <h5 class="card-header">Tambah Kategory kekerasan</h5>
        <div class="card-body">
            <form action="{{ route('category-violence.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="image" class="form-label">Gambar Kategori</label>
                    <input class="form-control" type="file" name="image" id="image">
                </div>
                <div class="mb-3 col-md-6">
                    <label for="category_name" class="form-label">Nama Kategori</label>
                    <input class="form-control" type="text" id="category_name" name="category_name">
                </div>
                <div class="mt-2">
                    <button type="submit" class="btn btn-primary me-2">Tambah Sekarang</button>
                </div>
            </form>
        </div>
    </div>
@endsection
