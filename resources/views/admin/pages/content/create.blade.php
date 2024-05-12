@extends('admin.layouts.admin_master')
@section('content')
    <h1>Buat Konten</h1>
    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ route('content.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="judul" class="form-label">Judul Content</label>
                    <input class="form-control" type="text" name="judul" id="judul">
                </div>
                <div class="mb-3">
                    <label>Isi Content</label>
                    <textarea id="isi_content" class="form-control" placeholder="Enter the Description" name="isi_content" rows="20"></textarea>
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

@section('script')
    <!-- include libraries(jQuery, bootstrap) -->

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>


    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#isi_content').summernote({
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']]
                ]
            });

        });
    </script>
@endsection
