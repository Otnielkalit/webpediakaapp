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
                    <form action="{{ route('event.store') }}"></form>
                    <div class="mb-3 col-md-6">
                        <label for="nama_event" class="form-label">Nama Kegiatan</label>
                        <input class="form-control" type="text" id="nama_event" name="nama_event" autofocus required>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="tanggal_pelaksanaan" class="form-label">Waktu Pelakasanaan Kegiatan (hari dan
                            jam)</label>
                        <input class="form-control" type="datetime-local" name="tanggal_pelaksanaan"
                            id="tanggal_pelaksanaan">
                    </div>
                    <div class="mb-3 col-md-12">
                        <div>
                            <label class="form-label">Deskripsi Kegiatan</label>
                            <div class="form-control">
                                <div class="comment-toolbar border-0 border-bottom">
                                    <div class="d-flex justify-content-start">
                                        <span class="ql-formats me-0">
                                            <button class="ql-bold"></button>
                                            <button class="ql-italic"></button>
                                            <button class="ql-underline"></button>
                                            <button class="ql-list" value="ordered"></button>
                                            <button class="ql-list" value="bullet"></button>
                                            <button class="ql-link"></button>
                                        </span>
                                    </div>
                                </div>
                                <div class="comment-editor border-0 pb-4" id="ecommerce-category-description">
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="mb-3 col-md-12">
                    <form action="{{ route('event.store') }}" class="dropzone needsclick" id="dropzone-basic">
                        <div class="dz-message needsclick my-5">
                            <p class="fs-4 note needsclick my-2">Drag and drop your image here</p>
                            <small class="text-muted d-block fs-6 my-2">or</small>
                            <span class="note needsclick btn bg-label-primary d-inline" id="btnBrowse">Browse
                                image</span>
                        </div>
                        <div class="fallback">
                            <input name="thumbnail_event" type="file" />
                        </div>

                </div>
                <div class="mt-2">
                    <button type="submit" class="btn btn-primary me-2">Buat Event</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
