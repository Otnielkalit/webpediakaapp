@extends('admin.layouts.admin_master')
@section('content')
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">

        <div class="d-flex flex-column justify-content-center">
            <h4 class="mb-1 mt-3">Daftar Konten</h4>
        </div>
        <div class="d-flex align-content-center flex-wrap gap-3">
            <a href="{{ route('content.create') }}" class="btn btn-primary">Buat Content</a>
        </div>

    </div>
    <div class="row">
        @forelse ($contents as $content)
            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="bg-label-primary rounded-3 text-center mb-3 pt-4">
                            <img class="img-fluid w-60" src="{{ $content['image_content'] }}" alt="Card girl image" />
                        </div>
                        <h4 class="mb-2 pb-1">{{ $content['judul'] }}</h4>
                        <p class="small">{!! $content['isi_content'] !!}</p>
                        <div class="row mb-3 g-3">
                            <div class="col-6">
                                <div class="d-flex">
                                    <div class="avatar flex-shrink-0 me-2">
                                        <span class="avatar-initial rounded bg-label-primary"><i
                                                class="bx bx-calendar-exclamation bx-sm"></i></span>
                                    </div>
                                    <div>
                                        <h6 class="mb-0 text-nowrap">17 Nov 23</h6>
                                        <small>Date</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-auto">
                                <a href="javascript:void(0);" class="btn btn-info"><span
                                        class="tf-icons bx bx-show"></span>&nbsp;Detail</a>
                            </div>
                            <div class="col-auto">
                                <a href="javascript:void(0);" class="btn btn-warning"><span
                                        class="tf-icons bx bx-edit"></span>&nbsp;Edit</a>
                            </div>
                            <div class="col-auto">


                                <form action="{{ route('content.destroy', ['content' => $content['id']]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus konten ini?');">
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
                    <h2 class="mb-2 mx-2 ">Belum ada Content</h2>
                    <p class="mb-4 mx-2">Sorry for the inconvenience but we're performing some maintenance at the moment</p>
                    <a href="{{ route('content.create') }}" class="btn btn-primary">Buat Content</a>
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
@endsection
