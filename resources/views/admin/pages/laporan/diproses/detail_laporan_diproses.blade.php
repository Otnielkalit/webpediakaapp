@extends('admin.layouts.admin_master')
@section('content')
    <link rel="stylesheet" href="asset-admin/assets/vendor/css/rtl/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="asset-admin/assets/vendor/libs/dropzone/dropzone.css" />

    <div class="col-xl-12">
        <div class="nav-align-top mb-4">
            <ul class="nav nav-pills mb-3 nav-fill" role="tablist">
                <li class="nav-item">
                    <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                        data-bs-target="#navs-pills-justified-laporan" aria-controls="navs-pills-justified-home"
                        aria-selected="true">
                        <i class="tf-icons bx bx-home"></i>
                        Laporan
                    </button>
                </li>
                <li class="nav-item">
                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                        data-bs-target="#navs-pills-justified-pelapor" aria-controls="navs-pills-justified-profile"
                        aria-selected="false">
                        <i class="tf-icons bx bx-user"></i>
                        Pelapor
                    </button>
                </li>
                <li class="nav-item">
                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                        data-bs-target="#navs-pills-justified-korban" aria-controls="navs-pills-justified-profile"
                        aria-selected="false">
                        <i class="tf-icons bx bx-user"></i>
                        Korban
                    </button>
                </li>
                <li class="nav-item">
                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                        data-bs-target="#navs-pills-justified-pelaku" aria-controls="navs-pills-justified-pelaku"
                        aria-selected="false">
                        <i class="tf-icons bx bx-user"></i>
                        Pelaku
                        <span
                            class="badge rounded-pill badge-center h-px-20 w-px-20 bg-danger">{{ count($laporanDetailDiproses['pelaku']) }}</span>
                    </button>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="navs-pills-justified-laporan" role="tabpanel">


                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="card-header">Tracking dan Isi Laporan {{ $laporanDetailDiproses['no_registrasi'] }}
                            &nbsp;<span class="badge bg-label-primary me-1">{{ $laporanDetailDiproses['status'] }}</span>
                        </h3>
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addTracking">
                            Kasus Selesai
                        </button>

                    </div>
                    <br>
                    <hr class="my-0">
                    <br>
                    <div class="row">
                        <div class="col-xl">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <h5 class="card-header">Dokumentasi</h5>
                                    <div class="card-body">
                                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                                            @foreach ($laporanDetailDiproses['dokumentasi']['urls'] as $key => $url)
                                                @php
                                                    $pathInfo = pathinfo($url);
                                                    $extension = strtolower($pathInfo['extension']);
                                                @endphp
                                                @if (in_array($extension, ['png', 'jpg', 'jpeg', 'gif']))
                                                    <img src="{{ $url }}" alt="dokumentasi"
                                                        class="d-block rounded document-img" height="100" width="100"
                                                        data-bs-toggle="modal" data-bs-target="#modalCenter"
                                                        data-type="image" data-image-url="{{ $url }}">
                                                @elseif (in_array($extension, ['mp4', 'mov', 'avi', 'mkv', 'webm']))
                                                    <video controls class="d-block rounded document-video" height="100"
                                                        width="100" data-bs-toggle="modal" data-bs-target="#modalCenter"
                                                        data-type="video" data-video-url="{{ $url }}">
                                                        <source src="{{ $url }}" type="video/{{ $extension }}">
                                                        Your browser does not support the video tag.
                                                    </video>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalCenterTitle">Dokumentasi</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body text-center" id="modalContent">

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-outline-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="mb-3">
                                            <label for="firstName" class="form-label">Nomor Registrasi</label>
                                            <input class="form-control" type="text" id="firstName" name="firstName"
                                                value="{{ $laporanDetailDiproses['no_registrasi'] }}" disabled>
                                        </div>
                                        <div class="mb-3">
                                            <label for="lastName" class="form-label">Kategori Kekerasan</label>
                                            <input class="form-control" type="text" name="lastName" id="lastName"
                                                value="{{ $laporanDetailDiproses['ViolenceCategory']['category_name'] }}"
                                                disabled>
                                        </div>
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Tanggal Pelaporan</label>
                                            <input class="form-control"
                                                value="{{ \Carbon\Carbon::parse($laporanDetailDiproses['tanggal_pelaporan'])->format('d M Y, H:i') }}"
                                                placeholder="{{ \Carbon\Carbon::parse($laporanDetailDiproses['tanggal_pelaporan'])->format('d M Y, H:i') }}"
                                                disabled>
                                        </div>
                                        <div class="mb-3">
                                            <label for="organization" class="form-label">Tanggal Kejadian</label>
                                            <input class="form-control"
                                                value="{{ \Carbon\Carbon::parse($laporanDetailDiproses['tanggal_kejadian'])->format('d M Y') }}"
                                                placeholder="{{ \Carbon\Carbon::parse($laporanDetailDiproses['tanggal_kejadian'])->format('d M Y') }}"
                                                disabled>
                                        </div>
                                        <div class="mb-3">
                                            <label for="lastName" class="form-label">Kategori Lokasi Kekerasan</label>
                                            <input class="form-control" type="text" name="lastName" id="lastName"
                                                value="{{ $laporanDetailDiproses['kategori_lokasi_kasus'] }}" disabled>
                                        </div>
                                        <div class="mb-3">
                                            <label for="lastName" class="form-label">Daerah Alamat TKP</label>
                                            <input class="form-control" type="text" name="lastName" id="lastName"
                                                value="{{ $laporanDetailDiproses['alamat_tkp'] }}" disabled>
                                        </div>
                                        <div class="mb-3">
                                            <label for="lastName" class="form-label">Alamat Detail</label>
                                            <textarea class="form-control" type="text" disabled>{{ $laporanDetailDiproses['alamat_detail_tkp'] }}</textarea>
                                        </div>
                                        <div class="mb-6">
                                            <label class="form-label" for="basic-default-message">Kronologi Kasus yang
                                                terjadi</label>
                                            <textarea id="basic-default-message" class="form-control" disabled>{{ $laporanDetailDiproses['kronologis_kasus'] }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="card">

                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h5 class="mb-0">Tracking Laporan</h5>
                                    <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                        data-bs-target="#addTracking">
                                        Tambah Tracking
                                    </button>
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="addTracking" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="addTrackingTitle">Buat Tracking laporan</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col mb-12">
                                                        <input type="text" name="no_registrasi"
                                                            value="{{ $laporanDetailDiproses['no_registrasi'] }}" hidden>
                                                        <label for="nameWithTitle" class="form-label">Keterangan</label>
                                                        <input type="text" id="nameWithTitle" class="form-control"
                                                            placeholder="Keterangan">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="card">
                                                            <h5 class="card-header">Multiple</h5>
                                                            <div class="card-body">
                                                                <form action="/upload" class="dropzone needsclick"
                                                                    id="dropzone-multi">
                                                                    <div class="dz-message needsclick">
                                                                        Drag and Drop files here or click to upload
                                                                    </div>
                                                                    <div class="fallback">
                                                                        <input name="file" type="file" />
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-success">Save changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <ul class="timeline pt-3">
                                        @foreach ($laporanDetailDiproses['tracking_laporan'] as $tracking)
                                            <li class="timeline-item pb-4 timeline-item-danger border-left-dashed">
                                                <span class="timeline-indicator-advanced timeline-indicator-danger">
                                                    <i class="bx bx-shopping-bag"></i>
                                                </span>
                                                <div class="timeline-event">
                                                    <div class="d-flex flex-sm-row flex-column">
                                                        <div>
                                                            <div class="timeline-header flex-wrap mb-2 mt-3 mt-sm-0">
                                                                <h6 class="mb-0">{{ $tracking['keterangan'] }}</h6>
                                                                <span>{{ \Carbon\Carbon::parse($tracking['created_at'])->format('d M Y, H:i') }}</span>

                                                            </div>
                                                            <p>
                                                                @foreach ($tracking['document']['urls'] as $url)
                                                                    <a href="{{ $url }}"
                                                                        target="_blank">Document</a><br>
                                                                @endforeach
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach

                                        <li class="timeline-item pb-4 timeline-item-info border-left-dashed">
                                            <span class="timeline-indicator-advanced timeline-indicator-info">
                                                <i class="bx bx-user-circle"></i>
                                            </span>
                                            <div class="timeline-event">
                                                <div class="timeline-header">
                                                    <h6 class="mb-0">Laporan Di lihat Oleh Admin</h6>
                                                    <span>{{ \Carbon\Carbon::parse($laporanDetailDiproses['waktu_dilihat'])->format('d M Y') }}
                                                        jam
                                                        {{ \Carbon\Carbon::parse($laporanDetailDiproses['waktu_dilihat'])->format('H:i') }}
                                                    </span>
                                                </div>
                                                <hr />
                                                <div class="d-flex justify-content-between flex-wrap gap-2">
                                                    <div class="d-flex flex-wrap">
                                                        <div class="avatar me-3">
                                                            <img src="{{ !empty($laporanDetailDiproses['User']['photo_profile']) ? $laporanDetailDiproses['User']['photo_profile'] : asset('asset-admin/assets/img/avatars/no_photo.png') }}"
                                                                alt="Avatar" class="rounded-circle" />
                                                        </div>
                                                        <div>
                                                            <p class="mb-0">
                                                                {{ $laporanDetailDiproses['user_melihat']['full_name'] }}
                                                            </p>
                                                            <span>{{ $laporanDetailDiproses['user_melihat']['role'] }}</span>
                                                        </div>
                                                    </div>
                                                    {{-- <div class="d-flex flex-wrap align-items-center cursor-pointer">
                                                        <i class="bx bx-message-rounded-dots me-2"></i>
                                                        <i class="bx bx-phone-call"></i>
                                                    </div> --}}
                                                </div>
                                            </div>
                                        </li>
                                        <li class="timeline-item pb-4 timeline-item-dark border-left-dashed">
                                            <span class="timeline-indicator-advanced timeline-indicator-dark">
                                                <i class="bx bx-bell"></i>
                                            </span>
                                            <div class="timeline-event">
                                                <div class="timeline-header">
                                                    <h6 class="mb-0">Laporan Masuk</h6>
                                                    <span>{{ \Carbon\Carbon::parse($laporanDetailDiproses['created_at'])->format('d M Y') }}
                                                        jam
                                                        {{ \Carbon\Carbon::parse($laporanDetailDiproses['created_at'])->format('H:i') }}
                                                    </span>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="timeline-end-indicator">
                                            <i class="bx bx-check-circle"></i>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- /Timeline Advanced-->
                    </div>
                </div>
                <div class="tab-pane fade" id="navs-pills-justified-pelapor" role="tabpanel">
                    <h3 class="card-header">Data Pelapor</h3>
                    <div class="card-body">
                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                            <img src="{{ !empty($laporanDetailDiproses['Data']['User']['photo_profile']) ? $laporanDetailDiproses['Data']['User']['photo_profile'] : asset('asset-admin/assets/img/avatars/no_photo.png') }}"
                                alt="user-avatar" class="d-block rounded" height="200" width="200"
                                id="uploadedAvatar">
                        </div>
                    </div>
                    <hr class="my-0">
                    <div class="card-body">
                        <form>
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label for="firstName" class="form-label">Nama Lengkap</label>
                                    <div class="input-group input-group-merge">
                                        <span id="basic-icon-default-fullname2" class="input-group-text">
                                            <i class="bx bx-user">
                                            </i>
                                        </span>
                                        <input type="text" class="form-control" id="basic-icon-default-fullname"
                                            value="{{ $laporanDetailDiproses['User']['full_name'] }}"
                                            aria-label="{{ $laporanDetailDiproses['User']['full_name'] }}"
                                            aria-describedby="basic-icon-default-fullname2">
                                    </div>

                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="lastName" class="form-label">Username</label>
                                    <input class="form-control" type="text" name="lastName" id="lastName"
                                        value="{{ $laporanDetailDiproses['User']['username'] }}">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="lastName" class="form-label">NIK</label>
                                    <input class="form-control" type="text" name="lastName" id="lastName"
                                        value="{{ $laporanDetailDiproses['User']['nik'] }}">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="email" class="form-label">E-mail</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text">
                                            <i class="bx bx-envelope"></i>
                                        </span>
                                        <input type="text" id="basic-icon-default-email" class="form-control"
                                            value="{{ $laporanDetailDiproses['User']['email'] }}"
                                            aria-label="{{ $laporanDetailDiproses['User']['email'] }}"
                                            aria-describedby="basic-icon-default-email2">
                                    </div>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="organization" class="form-label">Tempat, tanggal Lahir</label>
                                    <input type="text" class="form-control" id="organization" name="organization"
                                        value="{{ $laporanDetailDiproses['User']['tempat_lahir'] }}, {{ $laporanDetailDiproses['User']['tanggal_lahir'] }}">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label" for="phoneNumber">Nomor Handphone</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text">ID (+62)</span>
                                        <input type="text" id="phoneNumber" name="phoneNumber" class="form-control"
                                            value="{{ $laporanDetailDiproses['User']['phone_number'] }}">
                                    </div>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                    <input type="text" class="form-control"
                                        value="{{ $laporanDetailDiproses['User']['jenis_kelamin'] }}" id="jenis_kelamin"
                                        name="jenis_kelamin">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="state" class="form-label">Alamat</label>
                                    <input class="form-control" type="text" id="state" name="state"
                                        value="Alamat">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="zipCode" class="form-label">Zip Code</label>
                                    <input type="text" class="form-control" id="zipCode" name="zipCode"
                                        placeholder="231465" maxlength="6">
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
                <div class="tab-pane fade" id="navs-pills-justified-korban" role="tabpanel">

                    @forelse ($laporanDetailDiproses['korban'] as $korban)
                        <div class="card-body">
                            <div class="d-flex align-items-start align-items-sm-center gap-4">
                                <img src="{{ $korban['dokumentasi_korban'] }}" alt="user-avatar" class="d-block rounded"
                                    height="150" width="150" id="uploadedAvatar">
                            </div>
                        </div>
                        <br>
                        <hr class="my-0">
                        <br>
                        <div class="card-body">
                            <form>
                                <input type="text" name="{{ $korban['no_registrasi'] }}" hidden>
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label for="nik" class="form-label">NIK (Nomor Induk kependudukan)</label>
                                        <input class="form-control" type="number" value="{{ $korban['nik_korban'] }}"
                                            name="nik" disabled>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="nama_korban" class="form-label">Nama Korban</label>
                                        <input class="form-control" type="text" value="{{ $korban['nama_korban'] }}"
                                            name="nama_korban" id="nama_korban">
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="usia_korban" class="form-label">Usia Korban</label>
                                        <input class="form-control" type="text" value="{{ $korban['usia_korban'] }}"
                                            id="usia_korban" name="usia_korban" placeholder="contoh 21">
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                        <input type="text" class="form-control"
                                            value="{{ $korban['jenis_kelamin'] }}" id="jenis_kelamin"
                                            name="jenis_kelamin">
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="agama" class="form-label">Agama</label>
                                        <input type="text" class="form-control" value="{{ $korban['agama'] }}"
                                            id="agama" name="agama" placeholder="Contoh Kristen">
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label" for="no_telepon">Nomor Telepon</label>
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text">ID (+62)</span>
                                            <input type="text" id="no_telepon" name="no_telepon" class="form-control"
                                                value="{{ $korban['no_telepon'] }}" placeholder="0812 ">
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="pendidikan" class="form-label">Pendidikan</label>
                                        <input class="form-control" type="text" value="{{ $korban['pendidikan'] }}"
                                            id="pendidikan" name="pendidikan" placeholder="California">
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label" for="status_perkawinan">Status Perkawinan</label>
                                        <select id="status_perkawinan" class="select2 form-select"
                                            name="status_perkawinan">
                                            <option value="">Select</option>
                                            <option value="Belum Kawin"
                                                {{ $korban['status_perkawinan'] == 'Belum Kawin' ? 'selected' : '' }}>Belum
                                                Kawin</option>
                                            <option value="Sudah Kawin"
                                                {{ $korban['status_perkawinan'] == 'Sudah Kawin' ? 'selected' : '' }}>Sudah
                                                Kawin</option>
                                            <option value="Cerai"
                                                {{ $korban['status_perkawinan'] == 'Cerai' ? 'selected' : '' }}>Cerai
                                            </option>
                                        </select>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="kebangsaan" class="form-label">Kebangsaan</label>
                                        <input type="text" class="form-control" value="{{ $korban['kebangsaan'] }}"
                                            id="kebangsaan" name="kebangsaan" placeholder="Contoh Indonesia">
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="hubungan_dengan_pelaku" class="form-label">Hubungan dengan
                                            Pelaku</label>
                                        <input type="text" class="form-control"
                                            value="{{ $korban['hubungan_dengan_pelaku'] }}" id="hubungan_dengan_pelaku"
                                            name="hubungan_dengan_pelaku" placeholder="Contoh Paman">
                                    </div>
                                    <div class="mb-6">
                                        <label class="form-label" for="keterangan_lainnya">Keterangan lainnya</label>
                                        <textarea id="keterangan_lainnya" name="keterangan_lainnya" class="form-control"
                                            placeholder="adakah keterangan lain mengenai korban ini?">{{ $korban['keterangan_lainnya'] }}</textarea>
                                    </div>
                                    <h5 class="card-header text-center">Alamat Korban</h5>
                                    <div class="mb-3 col-md-6">
                                        <label for="provinsi" class="form-label">Provinsi</label>
                                        <input class="form-control" type="text"
                                            value="{{ $korban['alamat_korban'] }}" name="provinsi" id="provinsi">
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="kabupaten" class="form-label">Kabupaten</label>
                                        <input class="form-control" type="text"
                                            value="{{ $korban['alamat_detail'] }}" name="kabupaten" id="kabupaten">
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="kecamatan" class="form-label">Kecamatan</label>
                                        <input class="form-control" type="text"
                                            value="{{ $korban['alamat_korban'] }}" name="kecamatan" id="kecamatan">
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="desa" class="form-label">Desa/Kelurahan</label>
                                        <input class="form-control" type="text"
                                            value="{{ $korban['alamat_detail'] }}" name="desa" id="desa">
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label" for="alamat_detail">Alamat Detail</label>
                                        <textarea id="alamat_detail" name="alamat_detail" class="form-control" placeholder="">{{ $korban['alamat_detail'] }}</textarea>
                                    </div>
                                </div>
                            </form>
                        </div>
                    @empty
                        <div class="container-xxl container-p-y d-flex justify-content-center align-items-center">
                            <div class="misc-wrapper">
                                <h2 class="mb-2 mx-2 ">Data Korban Belum Ditambahkan</h2>
                                <p class="mb-4 mx-2">Pelapor Belum menambahkan data korban pada kasus ini</p>
                                <div class="mt-4">
                                    <img src="asset-admin\assets\img\backgrounds/nodata.png" alt="girl-doing-yoga-light"
                                        width="500" class="img-fluid" data-app-dark-img="illustrations/nodata.png"
                                        data-app-light-img="illustrations/nodata.png" />
                                </div>
                            </div>
                        </div>
                    @endforelse
                </div>
                <div class="tab-pane fade" id="navs-pills-justified-pelaku" role="tabpanel">
                    <div class="col-md mb-4 mb-md-0">
                        <div class="accordion mt-3" id="accordionExample">
                            @forelse ($laporanDetailDiproses['pelaku'] as $index => $pelaku)
                                <div class="card accordion-item">
                                    <h2 class="accordion-header" id="heading{{ $index }}">
                                        <button type="button" class="accordion-button collapsed"
                                            data-bs-toggle="collapse" data-bs-target="#accordion{{ $index }}"
                                            aria-expanded="false" aria-controls="accordion{{ $index }}">
                                            Data Pelaku {{ $index + 1 }}
                                        </button>
                                    </h2>
                                    <div id="accordion{{ $index }}" class="accordion-collapse collapse"
                                        aria-labelledby="heading{{ $index }}" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <h5 class="card-header">Data Pelaku</h5>
                                            <div class="card-body">
                                                <div class="d-flex align-items-start align-items-sm-center gap-4">
                                                    <img src="{{ $pelaku['dokumentasi_pelaku'] }}" alt="user-avatar"
                                                        class="d-block rounded" height="150" width="150"
                                                        id="uploadedAvatar">
                                                </div>
                                            </div>
                                            <hr class="my-0">
                                            <div class="card-body">
                                                <form id="formAccountSettings" method="POST" onsubmit="return false">
                                                    <input type="text"
                                                        name="{{ $laporanDetailDiproses['no_registrasi'] }}" hidden>
                                                    <div class="row">
                                                        <div class="mb-3 col-md-6">
                                                            <label for="nik" class="form-label">NIK (Nomor Induk
                                                                kependudukan)</label>
                                                            <input class="form-control" type="number" id="nik"
                                                                name="nik" value="{{ $pelaku['nik_pelaku'] }}"
                                                                disabled>
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label for="nama_pelaku" class="form-label">Nama
                                                                Pelaku</label>
                                                            <input class="form-control" type="text"
                                                                value="{{ $pelaku['nama_pelaku'] }}" disabled>
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label for="usia_pelaku" class="form-label">Usia
                                                                Pelaku</label>
                                                            <input class="form-control" type="text"
                                                                value="{{ $pelaku['usia_pelaku'] }}" disabled>
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label for="jenis_kelamin" class="form-label">Jenis
                                                                Kelamin</label>
                                                            <input type="text" class="form-control"
                                                                value="{{ $pelaku['jenis_kelamin'] }}" disabled>
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label for="agama" class="form-label">Agama</label>
                                                            <input type="text" class="form-control"
                                                                value="{{ $pelaku['agama'] }}" disabled>
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label" for="agama">Nomor Telepon</label>
                                                            <div class="input-group input-group-merge">
                                                                <span class="input-group-text">ID (+62)</span>
                                                                <input type="text" class="form-control"
                                                                    value="{{ $pelaku['no_telepon'] }}" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label for="pendidikan" class="form-label">Pendidikan</label>
                                                            <input class="form-control" type="text" name="pendidikan"
                                                                value="{{ $pelaku['pendidikan'] }}" disabled>
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label" for="status_perkawinan">Status
                                                                Perkawinan</label>
                                                            <select id="status_perkawinan" class="select2 form-select">
                                                                <option value="">Select</option>
                                                                <option value="Belum Kawin"
                                                                    {{ $pelaku['status_perkawinan'] == 'Belum Kawin' ? 'selected' : '' }}>
                                                                    Belum Kawin</option>
                                                                <option value="Sudah Kawin"
                                                                    {{ $pelaku['status_perkawinan'] == 'Sudah Kawin' ? 'selected' : '' }}>
                                                                    Sudah Kawin</option>
                                                                <option value="Cerai"
                                                                    {{ $pelaku['status_perkawinan'] == 'Cerai' ? 'selected' : '' }}>
                                                                    Cerai</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label for="kebangsaan" class="form-label">Kebangsaan</label>
                                                            <input type="text" class="form-control"
                                                                value="{{ $pelaku['kebangsaan'] }}" disabled>
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label for="hubungan_dengan_korban"
                                                                class="form-label">Hubungan dengan Korban</label>
                                                            <input type="text" class="form-control"
                                                                value="{{ $pelaku['hubungan_dengan_korban'] }}" disabled>
                                                        </div>
                                                        <div class="mb-6">
                                                            <label class="form-label"
                                                                for="basic-default-message">Keterangan lainnya</label>
                                                            <textarea id="basic-default-message" name="keterangan_lainnya" class="form-control" disabled>{{ $pelaku['keterangan_lainnya'] }}</textarea>
                                                        </div>
                                                        <h5 class="card-header text-center">Alamat Pelaku</h5>
                                                        @php
                                                            $alamatPelaku = explode(',', $pelaku['alamat_pelaku']);
                                                        @endphp
                                                        <div class="mb-3 col-md-6">
                                                            <label for="provinsi" class="form-label">Provinsi</label>
                                                            <input class="form-control" type="text" name="provinsi"
                                                                id="provinsi" value="{{ $alamatPelaku[0] }}">
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label for="kabupaten" class="form-label">Kabupaten</label>
                                                            <input class="form-control" type="text" name="kabupaten"
                                                                id="kabupaten" value="{{ $alamatPelaku[1] }}">
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label for="kecamatan" class="form-label">Kecamatan</label>
                                                            <input class="form-control" type="text" name="kecamatan"
                                                                id="kecamatan" value="{{ $alamatPelaku[2] }}">
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label for="desa"
                                                                class="form-label">Desa/Kelurahan</label>
                                                            <input class="form-control" type="text" name="desa"
                                                                id="desa" value="{{ $alamatPelaku[3] }}">
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label" for="basic-default-message">Alamat
                                                                Detail</label>
                                                            <textarea id="basic-default-message" name="alamat_detail" class="form-control" placeholder="">{{ $pelaku['alamat_detail'] }}</textarea>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="container-xxl container-p-y d-flex justify-content-center align-items-center">
                                    <div class="misc-wrapper">
                                        <h2 class="mb-2 mx-2 ">Data Pelaku Belum Ditambahkan</h2>
                                        <h3 class="mb-4 mx-2">Apakah Dinas mendapatkan pelakunya?</h3>
                                        <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                            data-bs-target="#exLargeModal">
                                            Tambah Data Pelaku
                                        </button>
                                        <div class="mt-4">
                                            <img src="asset-admin\assets\img\backgrounds/nodata.png"
                                                alt="girl-doing-yoga-light" width="500" class="img-fluid"
                                                data-app-dark-img="illustrations/nodata.png"
                                                data-app-light-img="illustrations/nodata.png" />
                                        </div>
                                    </div>
                                </div>
                                <!-- Tambah Data Pelaku -->
                                <div class="modal fade" id="exLargeModal" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-xl" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Tambah Data Pelaku</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('pelaku.store') }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="d-flex align-items-start align-items-sm-center gap-4 mb-3">
                                                        <img src="{{ asset('asset-admin/assets/img/avatars/upload.png') }}"
                                                            alt="user-avatar" class="d-block rounded" height="250"
                                                            width="250" id="img">
                                                        <div class="button-wrapper">
                                                            <label for="upload" class="btn btn-primary me-2 mb-4"
                                                                tabindex="0">
                                                                <span class="d-none d-sm-block">Upload foto pelaku</span>
                                                                <i class="bx bx-upload d-block d-sm-none"></i>
                                                                <input type="file" id="upload" name="image"
                                                                    class="account-file-input" hidden
                                                                    accept="image/png, image/jpeg" required>
                                                            </label>
                                                            <button type="button"
                                                                class="btn btn-outline-secondary account-image-reset mb-4"
                                                                id="reset">
                                                                <i class="bx bx-reset d-block d-sm-none"></i>
                                                                <span class="d-none d-sm-block">Reset</span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <hr class="my-3">

                                                    <input type="hidden" name="no_registrasi"
                                                        value="{{ $laporanDetailDiproses['no_registrasi'] }}">
                                                    <div class="row">
                                                        <div class="mb-3 col-md-6">
                                                            <label for="nik_pelaku" class="form-label">NIK (Nomor Induk
                                                                Kependudukan)</label>
                                                            <input class="form-control" type="number" id="nik_pelaku"
                                                                name="nik_pelaku" autofocus required>
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label for="nama_pelaku" class="form-label">Nama
                                                                Pelaku</label>
                                                            <input class="form-control" type="text" name="nama_pelaku"
                                                                id="nama_pelaku" required>
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label for="usia_pelaku" class="form-label">Usia
                                                                Pelaku</label>
                                                            <input class="form-control" type="number" id="usia_pelaku"
                                                                name="usia_pelaku" placeholder="Contoh: 21" required>
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label for="jenis_kelamin" class="form-label">Jenis
                                                                Kelamin</label>
                                                            <select class="form-control" id="jenis_kelamin"
                                                                name="jenis_kelamin" required>
                                                                <option value="">Pilih</option>
                                                                <option value="Laki-laki">Laki-laki</option>
                                                                <option value="Perempuan">Perempuan</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label for="agama" class="form-label">Agama</label>
                                                            <input type="text" class="form-control" id="agama"
                                                                name="agama" placeholder="Contoh: Kristen" required>
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label" for="no_telepon">Nomor
                                                                Telepon</label>
                                                            <div class="input-group">
                                                                <span class="input-group-text">ID (+62)</span>
                                                                <input type="text" id="no_telepon" name="no_telepon"
                                                                    class="form-control" placeholder="0812..." required>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label for="pendidikan" class="form-label">Pendidikan</label>
                                                            <input class="form-control" type="text" id="pendidikan"
                                                                name="pendidikan" placeholder="Contoh: S1" required>
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label" for="pekerjaan">Pekerjaan</label>
                                                            <input class="form-control" type="text" id="pekerjaan"
                                                                name="pekerjaan" placeholder="Contoh: Guru" required>
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label" for="status_perkawinan">Status
                                                                Perkawinan</label>
                                                            <select id="status_perkawinan" class="form-control"
                                                                name="status_perkawinan" required>
                                                                <option value="">Pilih</option>
                                                                <option value="Belum Kawin">Belum Kawin</option>
                                                                <option value="Sudah Kawin">Sudah Kawin</option>
                                                                <option value="Cerai">Cerai</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label for="kebangsaan" class="form-label">Kebangsaan</label>
                                                            <input type="text" class="form-control" id="kebangsaan"
                                                                name="kebangsaan" placeholder="Contoh: Indonesia"
                                                                required>
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label for="hubungan_dengan_korban"
                                                                class="form-label">Hubungan dengan Korban</label>
                                                            <input type="text" class="form-control"
                                                                id="hubungan_dengan_korban" name="hubungan_dengan_korban"
                                                                placeholder="Contoh: Paman" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label" for="keterangan_lainnya">Keterangan
                                                                Lainnya</label>
                                                            <textarea id="keterangan_lainnya" name="keterangan_lainnya" class="form-control"
                                                                placeholder="Adakah keterangan lain mengenai pelaku ini?"></textarea>
                                                        </div>
                                                        <h5 class="card-header text-center mb-3">Alamat Pelaku</h5>
<div class="mb-3 col-md-6">
    <label for="select2-provinsi" class="form-label">Provinsi</label>
    <select class="form-control select2-data-array" id="select2-provinsi" required></select>
</div>
<div class="mb-3 col-md-6">
    <label for="select2-kabupaten" class="form-label">Kabupaten</label>
    <select class="form-control select2-data-array" id="select2-kabupaten" required></select>
</div>
<div class="mb-3 col-md-6">
    <label for="select2-kecamatan" class="form-label">Kecamatan</label>
    <select class="form-control select2-data-array" id="select2-kecamatan" required></select>
</div>
<div class="mb-3 col-md-6">
    <label for="select2-kelurahan" class="form-label">Desa/Kelurahan</label>
    <select class="form-control select2-data-array" id="select2-kelurahan" required></select>
</div>
<input type="hidden" name="alamat" id="alamat">
<div class="mb-3 col-md-6">
    <label class="form-label" for="alamat_detail">Alamat Detail</label>
    <textarea id="alamat_detail" name="alamat_detail" class="form-control" placeholder="Alamat lengkap" required></textarea>
</div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Tutup</button>
                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
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

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const documentImgs = document.querySelectorAll(".document-img");
        const documentVideos = document.querySelectorAll(".document-video");
        const modalContent = document.getElementById("modalContent");

        documentImgs.forEach(img => {
            img.addEventListener("click", function() {
                const imageUrl = this.getAttribute("data-image-url");
                modalContent.innerHTML =
                    `<img src="${imageUrl}" alt="dokumentasi" class="img-fluid">`;
            });
        });

        documentVideos.forEach(video => {
            video.addEventListener("click", function() {
                const videoUrl = this.getAttribute("data-video-url");
                modalContent.innerHTML = `
                    <video controls class="img-fluid">
                        <source src="${videoUrl}" type="video/{{ $extension }}">
                        Your browser does not support the video tag.
                    </video>`;
            });
        });
    });
</script>

<script>
    $(document).ready(function() {
        var urlProvinsi = "https://ibnux.github.io/data-indonesia/provinsi.json";
        var urlKabupaten = "https://ibnux.github.io/data-indonesia/kabupaten/";
        var urlKecamatan = "https://ibnux.github.io/data-indonesia/kecamatan/";
        var urlKelurahan = "https://ibnux.github.io/data-indonesia/kelurahan/";

        function clearOptions(id) {
            $('#' + id).empty().trigger('change');
        }

        console.log('Load Provinsi...');
        $.getJSON(urlProvinsi, function(res) {
            console.log('Provinsi data:', res);
            res = $.map(res, function(obj) {
                obj.text = obj.nama;
                return obj;
            });
            var data = [{
                id: "",
                text: "- Pilih Provinsi -"
            }].concat(res);
            $("#select2-provinsi").select2({
                dropdownAutoWidth: true,
                width: '100%',
                data: data
            });
        });

        var selectProv = $('#select2-provinsi');
        $(selectProv).change(function() {
            var value = $(selectProv).val();
            clearOptions('select2-kabupaten');
            clearOptions('select2-kecamatan');
            clearOptions('select2-kelurahan');

            if (value) {
                console.log('Load Kabupaten for provinsi ID:', value);
                $.getJSON(urlKabupaten + value + ".json", function(res) {
                    console.log('Kabupaten data:', res);
                    res = $.map(res, function(obj) {
                        obj.text = obj.nama;
                        return obj;
                    });
                    var data = [{
                        id: "",
                        text: "- Pilih Kabupaten -"
                    }].concat(res);
                    $("#select2-kabupaten").select2({
                        dropdownAutoWidth: true,
                        width: '100%',
                        data: data
                    });
                });
            }
        });

        var selectKab = $('#select2-kabupaten');
        $(selectKab).change(function() {
            var value = $(selectKab).val();
            clearOptions('select2-kecamatan');
            clearOptions('select2-kelurahan');

            if (value) {
                console.log('Load Kecamatan for kabupaten ID:', value);
                $.getJSON(urlKecamatan + value + ".json", function(res) {
                    console.log('Kecamatan data:', res);
                    res = $.map(res, function(obj) {
                        obj.text = obj.nama;
                        return obj;
                    });
                    var data = [{
                        id: "",
                        text: "- Pilih Kecamatan -"
                    }].concat(res);
                    $("#select2-kecamatan").select2({
                        dropdownAutoWidth: true,
                        width: '100%',
                        data: data
                    });
                });
            }
        });

        var selectKec = $('#select2-kecamatan');
        $(selectKec).change(function() {
            var value = $(selectKec).val();
            clearOptions('select2-kelurahan');

            if (value) {
                console.log('Load Kelurahan for kecamatan ID:', value);
                $.getJSON(urlKelurahan + value + ".json", function(res) {
                    console.log('Kelurahan data:', res);
                    res = $.map(res, function(obj) {
                        obj.text = obj.nama;
                        return obj;
                    });
                    var data = [{
                        id: "",
                        text: "- Pilih Kelurahan -"
                    }].concat(res);
                    $("#select2-kelurahan").select2({
                        dropdownAutoWidth: true,
                        width: '100%',
                        data: data
                    });
                });
            }
        });

        $('form').submit(function() {
            var alamat = $('#select2-provinsi :selected').text() + ', ' +
                $('#select2-kabupaten :selected').text() + ', ' +
                $('#select2-kecamatan :selected').text() + ', ' +
                $('#select2-kelurahan :selected').text();
            $('#alamat').val(alamat);
        });
    });
</script>
