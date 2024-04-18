@extends('admin.layouts.admin_master')
@section('content')
    <div class="app-ecommerce">
        <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
            <div class="d-flex flex-column justify-content-center">
                <h4 class="mb-1 mt-3">{{ $title }}</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="card-tile mb-0">Buat content menarik untuk edukasi masyarakat</h5>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col"><label class="form-label" for="ecommerce-product-barcode">Judul</label>
                                <input type="text" class="form-control" id="ecommerce-product-barcode"
                                    placeholder="0123-4567" name="judul" aria-label="Product barcode">
                            </div>
                        </div>
                        <div>
                            <label class="form-label">Isi Content <span class="text-muted">(Optional)</span></label>
                            <div class="form-control p-0 pt-1">
                                <div class="comment-toolbar border-0 border-bottom">
                                    <div class="d-flex justify-content-start">
                                        <span class="ql-formats me-0">
                                            <button class="ql-bold"></button>
                                            <button class="ql-italic"></button>
                                            <button class="ql-underline"></button>
                                            <button class="ql-list" value="ordered"></button>
                                            <button class="ql-list" value="bullet"></button>
                                            <button class="ql-link"></button>
                                            <button class="ql-image"></button>
                                        </span>
                                    </div>
                                </div>
                                <div class="comment-editor border-0 pb-4" id="ecommerce-category-description">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0 card-title">Media</h5>
                    </div>
                    <div class="card-body">
                        <form action="/upload" class="dropzone needsclick" id="dropzone-basic">
                            <div class="dz-message needsclick my-5">
                                <p class="fs-4 note needsclick my-2">Drag and drop your image here</p>
                                <small class="text-muted d-block fs-6 my-2">or</small>
                                <span class="note needsclick btn bg-label-primary d-inline" id="btnBrowse">Browse
                                    image</span>
                            </div>
                            <div class="fallback">
                                <input name="image_content" type="file" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
