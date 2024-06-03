@extends('admin.layouts.admin_master')
@section('content')
    <!-- Add Product -->
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
        <div class="d-flex flex-column justify-content-center">
            <h4 class="mb-1 mt-3">Daftar Event</h4>
        </div>
        <div class="d-flex align-content-center flex-wrap gap-3">
            <a href="{{ route('event.create') }}" class="btn btn-primary">Buat Event</a>
        </div>
    </div>

    <div class="row">
        @forelse ($events as $event)
            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="image-container rounded-3 text-center mb-3 pt-4"
                            style="background-image: url('{{ $event['thumbnail_event'] }}');">
                        </div>
                        <h4 class="mb-2 pb-1">{{ $event['nama_event'] }}</h4>
                        <p class="small">{!! $event['deskripsi_event'] !!}</p>
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
                                            {{ \Carbon\Carbon::parse($event['tanggal_pelaksanaan'])->format('d M Y') }}</h6>
                                        <small>Date</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex">
                                    <div class="avatar flex-shrink-0 me-2">
                                        <span class="avatar-initial rounded bg-label-primary">
                                            <i class="bx bx-time-five bx-sm"></i>
                                        </span>
                                    </div>
                                    <div>
                                        <h6 class="mb-0 text-nowrap">
                                            {{ \Carbon\Carbon::parse($event['tanggal_pelaksanaan'])->diffForHumans() }}</h6>
                                        <small>Duration</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-auto">
                                <a href="{{ route('event.show', ['event' => $event['id']]) }}" class="btn btn-info">
                                    <span class="tf-icons bx bx-show"></span>&nbsp;Detail
                                </a>
                            </div>
                            <div class="col-auto">
                                <a href="{{ route('event.edit', ['event' => $event['id']]) }}" class="btn btn-warning">
                                    <span class="tf-icons bx bx-edit"></span>&nbsp;Edit
                                </a>
                            </div>
                            <div class="col-auto">
                                <form id="delete-form-{{ $event['id'] }}"
                                    action="{{ route('event.destroy', ['event' => $event['id']]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger delete-btn" data-id="{{ $event['id'] }}">
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
                    <h2 class="mb-2 mx-2">Belum ada Event</h2>
                    <p class="mb-4 mx-2">Belum ada event yang dijadwalkan saat ini. Buat event baru untuk memulai.</p>
                    <a href="{{ route('event.create') }}" class="btn btn-primary">Buat Event</a>
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

<style>
    .image-container {
        background-size: cover;
        background-position: center;
        height: 200px;
        /* Adjust height as needed */
        border-radius: 12px;
        /* Adjust this value to match the rounded corners */
        padding: 0;
        /* Remove padding to ensure the image fills the container */
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Handle delete button click event
        document.querySelectorAll('.delete-btn').forEach(function(button) {
            button.addEventListener('click', function() {
                var eventId = this.getAttribute('data-id');
                Swal.fire({
                    title: 'Apakah Anda yakin ingin menghapus Event ini?',
                    text: "Jika anda menghapus maka data tidak akan bisa kembali!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('delete-form-' + eventId).submit();
                    }
                });
            });
        });
    });
</script>
