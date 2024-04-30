@extends('admin.layouts.admin_master')
@section('content')
    <h1>Buat Kategori kekerasan</h1>
    <div class="card mb-4">
        <h5 class="card-header">Tambah Kategory kekerasan</h5>
        <div class="card-body">
            <form {{ route('category-violence.store') }} id="formAccountSettings" method="POST" onsubmit="return false">
                <div class="d-flex align-items-start align-items-sm-center gap-4">
                    <img src="asset-admin/assets/img/avatars/upload.png" alt="user-avatar" class="d-block rounded"
                        height="100" width="100" id="uploadedAvatar">
                    <div class="button-wrapper">
                        <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                            <span class="d-none d-sm-block">Upload new photo</span>
                            <i class="bx bx-upload d-block d-sm-none"></i>
                            <input type="file" id="upload" class="account-file-input" hidden name="image"
                                accept="image/png, image/jpeg">
                        </label>
                        <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                            <i class="bx bx-reset d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Reset</span>
                        </button>
                        <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                    </div>
                </div>
        </div>
        <hr class="my-0">
        <div class="card-body">

            <div class="row">
                <div class="mb-3 col-md-6">
                    <label for="firstName" class="form-label">Nama Kateogori</label>
                    <input class="form-control" type="text" id="firstName" name="cateogry_name">
                </div>
            </div>
            <div class="mt-2">
                <button type="submit" class="btn btn-primary me-2">Tambah Sekarang</button>
            </div>
            </form>
        </div>
    </div>
@endsection
