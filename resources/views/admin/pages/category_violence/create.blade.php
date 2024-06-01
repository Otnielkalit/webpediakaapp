@extends('admin.layouts.admin_master')
@section('content')
    <div class="card mb-4">
        <h1>Buat Kategori kekerasan</h1>
        <form action="{{ route('category-violence.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="d-flex align-items-start align-items-sm-center gap-4">
                    <img src="asset-admin/assets/img/avatars/upload.png" alt="user-avatar" class="d-block rounded"
                        height="250" width="250" id="img">
                    <div class="button-wrapper">
                        <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                            <span class="d-none d-sm-block">Masukkan Gambar</span>
                            <i class="bx bx-upload d-block d-sm-none"></i>
                            <input type="file" id="upload" name="image" class="account-file-input" hidden
                                accept="image/png, image/jpeg">
                        </label>
                        <button type="button" class="btn btn-outline-secondary account-image-reset mb-4" id="reset">
                            <i class="bx bx-reset d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Reset</span>
                        </button>
                    </div>
                </div>
                <hr class="my-0">
                <div class="card-body">
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="category_name" class="form-label">Nama Kategori</label>
                            <input class="form-control" type="text" id="category_name" name="category_name">
                        </div>
                    </div>
                    <div class="mt-2">
                        <button type="submit" class="btn btn-primary me-2">Buat Kategori</button>
                    </div>
                </div>
            </div>
        </form>
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
            img.src = 'asset-admin/assets/img/avatars/upload.png';
            input.value = '';
        });
    });
</script>


