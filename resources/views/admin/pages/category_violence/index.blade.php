@extends('admin.layouts.admin_master')
@section('content')
    <!-- Add Product -->

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
                                <a href="javascript:void(0);" class="btn btn-info" data-bs-toggle="modal"
                                    data-bs-target="#modalCenter"><span class="tf-icons bx bx-edit"></span>&nbsp;Edit</a>
                            </div>
                            <div class="col-auto">
                                <form action="{{ route('category-violence.destroy', ['category_violence' => $category_violence['id']]) }}" method="POST">
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
    <div class="col-lg-4 col-md-6">
        <div class="mt-3">
            <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalCenterTitle">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="nameWithTitle" class="form-label">Name</label>
                                    <input type="text" id="nameWithTitle" class="form-control" placeholder="Enter Name">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                Close
                            </button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
