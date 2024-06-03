@extends('admin.layouts.admin_master')

@section('content')
    <h1>Buat Event</h1>
    <div class="card mb-4">
        <div class="card-body">
            <form id="event-form" action="{{ route('event.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="nama_event" class="form-label">Nama Event</label>
                    <input class="form-control" type="text" name="nama_event" id="nama_event"
                        value="{{ old('nama_event') }}" required>
                </div>
                <div>
                    <label class="form-label">Deskripsi Kegiatan</label>
                    <textarea id="editor" class="form-control" placeholder="Enter the Description" name="deskripsi_event" rows="20">{{ old('deskripsi_event') }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="tanggal_pelaksanaan" class="form-label">Tanggal Pelaksanaan</label>
                    <input class="form-control" type="datetime-local" name="tanggal_pelaksanaan" id="tanggal_pelaksanaan"
                        value="{{ old('tanggal_pelaksanaan') }}" required>
                </div>
                <div class="d-flex align-items-start align-items-sm-center gap-4">
                    <img src="{{ asset('asset-admin/assets/img/avatars/upload.png') }}" alt="event-thumbnail"
                        class="d-block rounded" height="250" width="250" id="img-preview">
                    <div class="button-wrapper">
                        <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                            <span class="d-none d-sm-block">Masukkan Thumbnail</span>
                            <i class="bx bx-upload d-block d-sm-none"></i>
                            <input type="file" id="upload" name="thumbnail_event" class="account-file-input" hidden
                                accept="image/png, image/jpeg" required>
                        </label>
                        <button type="button" class="btn btn-outline-secondary account-image-reset mb-4" id="reset">
                            <i class="bx bx-reset d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Reset</span>
                        </button>
                    </div>
                </div>
                <div class="mt-2">
                    <button type="submit" class="btn btn-primary me-2">Tambah Sekarang</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize CKEditor
            ClassicEditor
                .create(document.querySelector('#editor'))
                .then(editor => {
                    window.editor = editor;
                })
                .catch(error => {
                    console.error(error);
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

            const form = document.getElementById('event-form');
            form.addEventListener('submit', function(event) {
                // Update textarea with content from CKEditor
                if (window.editor) {
                    window.editor.updateSourceElement();
                }

                // Perform additional validation if needed
                const editorContent = window.editor.getData().trim();
                if (editorContent === '') {
                    alert('Deskripsi Kegiatan tidak boleh kosong');
                    event.preventDefault(); // Prevent form submission if validation fails
                }
            });
        });
    </script>
@endsection
