@extends('admin.layouts.admin_master')

@section('content')
    <div class="row">
        <div class="col-lg-12 mb-4 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-7">
                        <div class="card-body">
                            <h2 class="card-title text-primary">Selamat Datang Admin DPMDPPA 🎉</h2>
                            <h4 class="mb-4">
                                Jangan lupa selalu semangat
                                <span class="fw-bold">100%</span>
                                tangani kekerasan terhadap anak dan perempuan
                            </h4>
                        </div>
                    </div>
                    <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                            <img src="asset-admin/assets/img/illustrations/man-with-laptop-light.png" height="140"
                                alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                data-app-light-img="illustrations/man-with-laptop-light.png">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-4">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <a href="https://wa.me/{{ preg_replace('/\D/', '', $emergencyContact['Phone']) }}"
                                        target="_blank">
                                        <img src="asset-admin/assets/img/icons/brands/emergency.png" alt="emergency logo"
                                            class="rounded">
                                    </a>
                                </div>
                                <div class="ms-auto">
                                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#basicModal">
                                        Edit contact
                                    </button>
                                </div>
                                <div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel1">Edit Kontak Darurat</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form id="editContactForm" action="{{ route('contact.update') }}"
                                                method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col mb-3">
                                                            <label for="phone" class="form-label">Nomor Telepon</label>
                                                            <input type="number" id="phone" name="phone"
                                                                class="form-control"
                                                                value="{{ $emergencyContact['Phone'] }}"
                                                                placeholder="Contoh(08126346777)">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-outline-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="button" id="saveChangesBtn"
                                                        class="btn btn-primary">Simpan Perubahan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <span class="fw-semibold d-block mb-1">Kontak Darurat</span>

                            @if ($emergencyContact)
                                <h3 class="card-title mb-2">{{ $emergencyContact['Phone'] }}</h3>
                            @else
                                <p>Belum Ada kontak darurat</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <!-- Basic -->
        <div class="col-12 mb-4">
            <div class="row">
                <div class="col-md-4 mb-3">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <img src="asset-admin/assets/img/icons/brands/laporan-masuk.png" alt="Credit Card"
                                        class="rounded">
                                </div>
                            </div>
                            <h3 class="d-block mb-1">Laporan Yang Baru Masuk</h3>
                            <h1 class="card-title text-nowrap mb-2">{{ $laporanMasuk->count() }}</h1>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <img height="100" src="asset-admin/assets/img/icons/brands/lihat.png"
                                        alt="Credit Card" class="rounded">
                                </div>
                            </div>
                            <h3 class="fw-semibold d-block mb-1">Laporan Sudah Dilihat</h3>
                            <h1 class="card-title mb-2">{{ $laporanDilihat->count() }}</h1>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <img src="asset-admin/assets/img/icons/brands/proses.png" alt="Credit Card"
                                        class="rounded">
                                </div>
                            </div>
                            <h3 class="fw-semibold d-block mb-1">Laporan Diproses</h3>
                            <h1 class="card-title mb-2">{{ $laporanDiproses->count() }}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 mb-4">
            <div class="card">
                <h3 class="card-header text-center">Event yang akan datang</h3>
                <div class="card-body">
                    @forelse ($events as $event)
                        <div class="col-md-6 col-xl-4 mb-4">
                            <div class="card h-100">
                                <div class="card-body">
                                    <div class="text-center">
                                        <h5>{{ $event['nama_event'] }}</h5>
                                    </div>
                                    <div class="bg-label-primary rounded-3 text-center mb-3 pt-4">
                                        <img class="img-fluid" src="{{ $event['thumbnail_event'] }}"
                                            alt="{{ $event['nama_event'] }}" />
                                    </div>
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
                                                        {{ \Carbon\Carbon::parse($event['tanggal_pelaksanaan'])->format('d M Y') }}
                                                    </h6>
                                                    <p>Jam
                                                        {{ \Carbon\Carbon::parse($event['tanggal_pelaksanaan'])->format('H:i') }}
                                                    </p>
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
                                                        {{ \Carbon\Carbon::parse($event['tanggal_pelaksanaan'])->diffForHumans() }}
                                                    </h6>
                                                    <small>Hari H</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-center">Tidak ada event yang akan datang dalam 3 hari ke depan.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection


<script>
    document.addEventListener('DOMContentLoaded', function() {
        let saveChangesBtn = document.getElementById('saveChangesBtn');
        let form = document.getElementById('editContactForm');

        saveChangesBtn.addEventListener('click', function(event) {
            event.preventDefault();

            Swal.fire({
                title: 'Yakin ingin menyimpan perubahan?',
                text: "Pastikan kontak darurat yang diubah sudah benar!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, save it!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
</script>
