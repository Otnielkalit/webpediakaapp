@extends('admin.layouts.admin_master')
@section('content')
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
        <div class="d-flex flex-column justify-content-center">
            <h4 class="mb-1 mt-3">Daftar Category Kekerasn</h4>
        </div>
        <div class="d-flex align-content-center flex-wrap gap-3">
            <a href="{{ route('category-violence.create') }}" class="btn btn-primary">Buat Kategori</a>
        </div>
    </div>
    <div class="row">
        @forelse ($category_violences as $category_violence)
            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="rounded-3 text-center mb-3 pt-4">
                            <img class="img-fluid w-60" src="{{ $category_violence['image'] }}" alt="Card girl image" />
                        </div>
                        <h4 class="mb-2 pb-1">{{ $category_violence['category_name'] }}</h4>
                        <div class="row justify-content-center">
                            <div class="col-auto">
                                <button type="button" class="btn btn-primary btn-detail" data-bs-toggle="modal"
                                    data-bs-target="#modalCenter" data-category-id="{{ $category_violence['id'] }}"
                                    data-category-image="{{ $category_violence['image'] }}"
                                    data-category-name="{{ $category_violence['category_name'] }}">
                                    <span class="tf-icons bx bx-show"></span>&nbsp;Detail
                                </button>
                            </div>
                            <div class="col-auto">
                                <form
                                    action="{{ route('category-violence.destroy', ['category_violence' => $category_violence['id']]) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?');">
                                        <span class="tf-icons bx bx-trash"></span>&nbsp;Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="container-xxl container-p-y d-flex justify-content-center align-items-center">
                <div class="misc-wrapper">
                    <h2 class="mb-2 mx-2 ">Belum ada Kategori Kekerasan</h2>
                    <p class="mb-4 mx-2">Sorry for the inconvenience but we're performing some maintenance at the moment</p>
                    <a href="{{ route('category-violence.create') }}" class="btn btn-primary">Buat Kategori</a>
                    <div class="mt-4">
                        <img src="asset-admin/assets/img/illustrations/girl-doing-yoga-light.png"
                            alt="girl-doing-yoga-light" width="500" class="img-fluid"
                            data-app-dark-img="illustrations/girl-doing-yoga-dark.png"
                            data-app-light-img="illustrations/girl-doing-yoga-light.png" />
                    </div>
                </div>
            </div>
        @endforelse
    </div>
    <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">Detail Kategory</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="{{ route('category-violence.update', ['category_violence' => $category_violence['id']]) }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="d-flex align-items-start align-items-sm-center gap-4">

                            <img src="" id="categoryImage" height="100" width="100"
                                class="d-block rounded img-fluid" alt="Category Image">
                            <div class="button-wrapper">
                                <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                    <span class="d-none d-sm-block">Upload new photo</span>
                                    <i class="bx bx-upload d-block d-sm-none"></i>
                                    <input type="file" id="upload" class="ac Gcount-file-input" hidden
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
                    <div class="modal-body">
                        <div class="row">
                            <div class="col mb-3">
                                <label for="categoryName" class="form-label">Nama Kategori</label>
                                <input type="text" name="category_name" value="category_name" id="categoryName"
                                    class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const detailButtons = document.querySelectorAll('.btn-detail');
        detailButtons.forEach(button => {
            button.addEventListener('click', function() {
                const categoryId = button.getAttribute('data-category-id');
                const categoryImage = button.getAttribute('data-category-image');
                const categoryName = button.getAttribute('data-category-name');
                document.getElementById('categoryImage').src = categoryImage;
                document.getElementById('categoryName').value = categoryName;
            });
        });
    });
</script>
