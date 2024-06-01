@extends('admin.layouts.admin_master')
@section('content')
    <div class="app-ecommerce">
        <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
            <div class="d-flex align-content-center flex-wrap gap-3">
                <a href="{{ route('event.index') }}" class="btn btn-primary">Kembali</a>
            </div>
        </div>
        <div class="card mb-4">
            <h5 class="card-header">{{ $title }}</h5>
            <hr class="my-0">
            <div class="card-body">
                <div class="row">
                    <form action="{{ route('event.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3 col-md-6">
                            <label for="nama_event" class="form-label">Nama Kegiatan</label>
                            <input class="form-control" type="text" id="nama_event" name="nama_event" autofocus required>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="tanggal_pelaksanaan" class="form-label">Waktu Pelakasanaan Kegiatan (hari dan
                                jam)</label>
                            <input class="form-control" type="datetime-local" name="tanggal_pelaksanaan"
                                id="tanggal_pelaksanaan" required>
                        </div>
                        <div class="mb-3 col-md-12">
                            <div>
                                <label class="form-label">Deskripsi Kegiatan</label>
                                <textarea id="editor" class="form-control" placeholder="Enter the Description" name="deskripsi_event" rows="20"
                                    required></textarea>
                            </div>
                        </div>
                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                            <img src="{{ asset('asset-admin/assets/img/avatars/upload.png') }}" alt="user-avatar"
                                class="d-block rounded" height="250" width="250" id="img-preview">
                            <div class="button-wrapper">
                                <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                    <span class="d-none d-sm-block">Masukkan gambar</span>
                                    <i class="bx bx-upload d-block d-sm-none"></i>
                                    <input type="file" id="upload" name="thumbnail_event" class="account-file-input"
                                        hidden accept="image/png, image/jpeg" required>
                                </label>
                                <button type="button" class="btn btn-outline-secondary account-image-reset mb-4"
                                    id="reset">
                                    <i class="bx bx-reset d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Reset</span>
                                </button>
                            </div>
                        </div>
                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary me-2">Buat Event</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('scripts')
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize CKEditor
            CKEDITOR.replace('editor', {
                on: {
                    change: function() {
                        this.updateElement();
                    }
                }
            });

            let imgPreview = document.getElementById('img-preview');
            let inputFile = document.getElementById('upload');
            let resetBtn = document.getElementById('reset');

            inputFile.addEventListener('change', function(e) {
                if (inputFile.files && inputFile.files[0]) {
                    const reader = new FileReader();
                    reader.onload = function(event) {
                        imgPreview.src = event.target.result;
                    };
                    reader.readAsDataURL(inputFile.files[0]);
                }
            });

            resetBtn.addEventListener('click', function() {
                imgPreview.src = '{{ asset('asset-admin/assets/img/avatars/upload.png') }}';
                inputFile.value = '';
            });
        });
    </script>
@endsection
