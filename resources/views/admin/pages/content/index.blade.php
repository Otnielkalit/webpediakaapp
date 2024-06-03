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
                        <div class="image-container bg-label-primary rounded-3 text-center mb-3 pt-4"
                            style="background-image: url('{{ $content['image_content'] }}');">
                        </div>
                        <h4 class="mb-2 pb-1">{{ $content['judul'] }}</h4>
                        <div class="row mb-3 g-3">
                            <div class="col-6">
                                <div class="d-flex">
                                    <div class="avatar flex-shrink-0 me-2">
                                        <span class="avatar-initial rounded bg-label-primary">
                                            <i class="bx bx-calendar-exclamation bx-sm"></i>
                                        </span>
                                    </div>
                                    <div>
                                        <h6 class="mb-0 text-nowrap">
                                            {{ \Carbon\Carbon::parse($content['updated_at'])->format('d M Y, H:i') }}</h6>
                                        <small>Update terakhir</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-auto">
                                <a href="{{ route('content.show', ['content' => $content['id']]) }}" class="btn btn-info">
                                    <span class="tf-icons bx bx-show"></span>&nbsp;Detail
                                </a>
                            </div>
                            <div class="col-auto">
                                <a href="{{ route('content.edit', ['content' => $content['id']]) }}"
                                    class="btn btn-warning">
                                    <span class="tf-icons bx bx-edit"></span>&nbsp;Edit
                                </a>
                            </div>
                            <div class="col-auto">
                                <form id="delete-form-{{ $content['id'] }}"
                                    action="{{ route('content.destroy', ['content' => $content['id']]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger delete-btn" data-id="{{ $content['id'] }}">
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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Handle delete button click event
        document.querySelectorAll('.delete-btn').forEach(function(button) {
            button.addEventListener('click', function() {
                var contentId = this.getAttribute('data-id');
                Swal.fire({
                    title: 'Apakah Anda yakin ingin menghapus konten ini?',
                    text: "Jika anda menghapus maka data tidak akan bisa kembali!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('delete-form-' + contentId).submit();
                    }
                });
            });
        });
    });
</script>
<style>
    .image-container {
        padding: 0;
        background-size: cover;
        background-position: center;
        height: 200px;
        /* Adjust height as needed */
        border-radius: 12px;
        /* Adjust this value to match the rounded corners */
    }
</style>
