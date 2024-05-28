@extends('admin.layouts.admin_master')

@section('content')
    <h1>Buat Konten</h1>
    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ route('content.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="judul" class="form-label">Judul Content</label>
                    <input class="form-control" type="text" name="judul" id="judul" required>
                </div>
                <div class="mb-3">
                    <label>Isi Content</label>
                    <textarea id="editor" placeholder="Enter the Description" name="isi_content" rows="20" required></textarea>
                </div>
                <div class="d-flex align-items-start align-items-sm-center gap-4">
                    <img src="{{ asset('asset-admin/assets/img/avatars/upload.png') }}" alt="user-avatar"
                        class="d-block rounded" height="250" width="250" id="img">
                    <div class="button-wrapper">
                        <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                            <span class="d-none d-sm-block">Upload new photo</span>
                            <i class="bx bx-upload d-block d-sm-none"></i>
                            <input type="file" id="upload" name="image_content" class="account-file-input" hidden
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
<script>
    document.addEventListener('DOMContentLoaded', function() {
        let img = document.getElementById('img');
        let input = document.getElementById('upload');
        let resetBtn = document.getElementById('reset');
        input.addEventListener('change', function(e) {
            if (input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(event) {       
                    img.src = event.target.result;
                };
                reader.readAsDataURL(input.files[0]);
            }
        });
        resetBtn.addEventListener('click', function(e) {
            img.src =
                '{{ asset('asset-admin/assets/img/avatars/upload.png') }}';
            input.value = '';
        });
    });
</script>
