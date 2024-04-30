@extends('admin.layouts.admin_master')
@section('content')
    <div class="col-xl-12">
        <h4 class="fw-bold py-3 mb-4">
            Laporan, Data Pelaku, Data Pelapor
        </h4>
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
                        data-bs-target="#navs-pills-justified-pelaku" aria-controls="navs-pills-justified-profile"
                        aria-selected="false">
                        <i class="tf-icons bx bx-user"></i>
                        Pelaku
                        <span class="badge rounded-pill badge-center h-px-20 w-px-20 bg-danger">3</span>
                    </button>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="navs-pills-justified-laporan" role="tabpanel">
                    <h3 class="card-header">Isi Laporan {{ $laporanDetail['no_registrasi'] }}</h3>
                    <form id="formAccountSettings" method="POST" onsubmit="return false">
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="firstName" class="form-label">Nomor Registrasi</label>
                                <input class="form-control" type="text" id="firstName" name="firstName"
                                    value="{{ $laporanDetail['no_registrasi'] }}">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="lastName" class="form-label">Kategori Kekerasan</label>
                                <input class="form-control" type="text" name="lastName" id="lastName"
                                    value="{{ $laporanDetail['kategori_kekerasan'] }}">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="email" class="form-label">Tanggal Pelaporan</label>
                                <input class="form-control"
                                    value="{{ \Carbon\Carbon::parse($laporanDetail['tanggal_pelaporan'])->format('d M Y, H:i') }}"
                                    placeholder="{{ \Carbon\Carbon::parse($laporanDetail['tanggal_pelaporan'])->format('d M Y, H:i') }}">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="organization" class="form-label">Tanggal Kejadian</label>
                                <input class="form-control"
                                    value="{{ \Carbon\Carbon::parse($laporanDetail['tanggal_kejadian'])->format('d M Y') }}"
                                    placeholder="{{ \Carbon\Carbon::parse($laporanDetail['tanggal_kejadian'])->format('d M Y') }}">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="lastName" class="form-label">Kategori Lokasi Kekerasan</label>
                                <input class="form-control" type="text" name="lastName" id="lastName"
                                    value="{{ $laporanDetail['kategori_lokasi_kasus'] }}">
                            </div>

                            <div class="mb-6">
                                <div class="accordion" id="accordionExample">
                                    <div class="card accordion-item">
                                        <h2 class="accordion-header" id="headingTwo">
                                            <button type="button" class="accordion-button collapsed"
                                                data-bs-toggle="collapse" data-bs-target="#accordionTwo"
                                                aria-expanded="false" aria-controls="accordionTwo">
                                                Alamat Tempat Kejadian Perkara
                                            </button>
                                        </h2>
                                        <div id="accordionTwo" class="accordion-collapse collapse"
                                            aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <div class="row">
                                                    <div class="mb-3 col-md-6 mt-6">
                                                        <label for="firstName" class="form-label">Provinsi</label>
                                                        <input class="form-control" type="text" id="firstName"
                                                            name="firstName"
                                                            value="{{ $laporanDetail['AlamatTKP']['provinsi'] }}">
                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label for="lastName" class="form-label">Kabupaten</label>
                                                        <input class="form-control" type="text" id="firstName"
                                                            name="firstName"
                                                            value="{{ $laporanDetail['AlamatTKP']['kabupaten'] }}">
                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label for="email" class="form-label">Kecamatan</label>
                                                        <input class="form-control" type="text" id="firstName"
                                                            name="firstName"
                                                            value="{{ $laporanDetail['AlamatTKP']['kecamatan'] }}">
                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label for="organization"
                                                            class="form-label">Desa/Kelurahan</label>
                                                        <input class="form-control" type="text" id="firstName"
                                                            name="firstName"
                                                            value="{{ $laporanDetail['AlamatTKP']['desa'] }}">
                                                    </div>
                                                    <div class="mb-6">
                                                        <label for="lastName" class="form-label">Detail Alamat</label>
                                                        <input class="form-control" type="text" name="lastName"
                                                            id="lastName"
                                                            value="{{ $laporanDetail['AlamatTKP']['alamat_detail'] }}">
                                                    </div>
                                                </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="mb-6">
        <label class="form-label" for="basic-default-message">Kronologi Kasus yang terjadi</label>
        <textarea id="basic-default-message" class="form-control">{{ $laporanDetail['kronologis_kasus'] }}</textarea>
    </div>
    </form>

    </div>
    <hr class="my-3">
    <h4 class="card-header text-center">Status Laporan</h4>
    
    </div>
    <div class="tab-pane fade" id="navs-pills-justified-pelapor" role="tabpanel">
        <h3 class="card-header">Data Pelapor</h3>
        <div class="card-body">
            <div class="d-flex align-items-start align-items-sm-center gap-4">
                <img src="{{ !empty($laporanDetail['Data']['User']['photo_profile']) ? $laporanDetail['Data']['User']['photo_profile'] : asset('asset-admin/assets/img/avatars/no_photo.png') }}"
                    alt="user-avatar" class="d-block rounded" height="200" width="200" id="uploadedAvatar">
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
                                placeholder="{{ $laporanDetail['User']['full_name'] }}"
                                aria-label="{{ $laporanDetail['User']['full_name'] }}"
                                aria-describedby="basic-icon-default-fullname2">
                        </div>

                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="lastName" class="form-label">Username</label>
                        <input class="form-control" type="text" name="lastName" id="lastName"
                            value="{{ $laporanDetail['User']['username'] }}">
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="lastName" class="form-label">NIK</label>
                        <input class="form-control" type="text" name="lastName" id="lastName"
                            value="{{ $laporanDetail['User']['nik'] }}">
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="email" class="form-label">E-mail</label>
                        <div class="input-group input-group-merge">
                            <span class="input-group-text">
                                <i class="bx bx-envelope"></i>
                            </span>
                            <input type="text" id="basic-icon-default-email" class="form-control"
                                placeholder="{{ $laporanDetail['User']['email'] }}"
                                aria-label="{{ $laporanDetail['User']['email'] }}"
                                aria-describedby="basic-icon-default-email2">
                        </div>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="organization" class="form-label">Tempat, tanggal Lahir</label>
                        <input type="text" class="form-control" id="organization" name="organization"
                            value="{{ $laporanDetail['User']['tempat_lahir'] }}, {{ $laporanDetail['User']['tanggal_lahir'] }}">
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="phoneNumber">Nomor Handphone</label>
                        <div class="input-group input-group-merge">
                            <span class="input-group-text">ID (+62)</span>
                            <input type="text" id="phoneNumber" name="phoneNumber" class="form-control"
                                placeholder="{{ $laporanDetail['User']['phone_number'] }}">
                        </div>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                        <input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin"
                            placeholder="Address">
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="state" class="form-label">State</label>
                        <input class="form-control" type="text" id="state" name="state"
                            placeholder="California">
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="zipCode" class="form-label">Zip Code</label>
                        <input type="text" class="form-control" id="zipCode" name="zipCode" placeholder="231465"
                            maxlength="6">
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="country">Country</label>
                        <select id="country" class="select2 form-select">
                            <option value="">Select</option>
                            <option value="Australia">Australia</option>
                            <option value="Bangladesh">Bangladesh</option>
                        </select>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="language" class="form-label">Language</label>
                        <select id="language" class="select2 form-select">
                            <option value="">Select Language</option>
                            <option value="en">English</option>
                            <option value="fr">French</option>
                            <option value="de">German</option>
                            <option value="pt">Portuguese</option>
                        </select>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="timeZones" class="form-label">Timezone</label>
                        <select id="timeZones" class="select2 form-select">
                            <option value="">Select Timezone</option>
                            <option value="-12">(GMT-12:00) International Date Line West</option>
                            <option value="-11">(GMT-11:00) Midway Island, Samoa</option>
                        </select>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="currency" class="form-label">Currency</label>
                        <select id="currency" class="select2 form-select">
                            <option value="">Select Currency</option>
                            <option value="usd">USD</option>
                            <option value="euro">Euro</option>
                            <option value="pound">Pound</option>
                            <option value="bitcoin">Bitcoin</option>
                        </select>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="tab-pane fade" id="navs-pills-justified-korban" role="tabpanel">
        <h5 class="card-header">Data Korban</h5>
        <div class="card-body">
            <div class="d-flex align-items-start align-items-sm-center gap-4">
                <img src="asset-admin/assets/img/avatars/1.png" alt="user-avatar" class="d-block rounded" height="150"
                    width="150" id="uploadedAvatar">
            </div>
        </div>
        <hr class="my-0">
        <div class="card-body">
            <form id="formAccountSettings" method="POST" onsubmit="return false">
                <input type="text" name="{{ $laporanDetail['no_registrasi'] }}" hidden>
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label for="nik" class="form-label">NIK (Nomor Induk kependudukan)</label>
                        <input class="form-control" type="number" id="nik" name="nik" autofocus>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="nama_pelaku" class="form-label">Nama Pelaku</label>
                        <input class="form-control" type="text" name="nama_pelaku" id="nama_pelaku">
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="usia_pelaku" class="form-label">Usia Pelaku</label>
                        <input class="form-control" type="text" id="usia_pelaku" name="usia_pelaku"
                            placeholder=" contoh 21">
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                        <input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                    </div>

                    <div class="mb-3 col-md-6">
                        <label for="agama" class="form-label">Agama</label>
                        <input type="text" class="form-control" id="agama" name="agama"
                            placeholder="Contoh Krister">
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="agama">Nomor Telepon</label>
                        <div class="input-group input-group-merge">
                            <span class="input-group-text">ID (+62)</span>
                            <input type="text" id="no_telepon" name="no_telepon" class="form-control"
                                placeholder="0812 ">
                        </div>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="pendidikan" class="form-label">Pendidikan</label>
                        <input class="form-control" type="text" id="pendidikan" name="pendidikan"
                            placeholder="California">
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="status_perkawinan">Status Perkawinan</label>
                        <select id="status_perkawinan" class="select2 form-select" name="status_perkawinan">
                            <option value="">Select</option>
                            <option value="Belum Kawin">Belum Kawin</option>
                            <option value="Sudah Kawin">Sudah Kawin</option>
                            <option value="Cerai">Cerai</option>
                        </select>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="kebangsaan" class="form-label">Kebangsaan</label>
                        <input type="text" class="form-control" id="kebangsaan" name="kebangsaan"
                            placeholder="Contoh Indonesia">
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="hubungan_dengan_korban" class="form-label">Hubungan dengan Korban</label>
                        <input type="text" class="form-control" id="hubungan_dengan_korban"
                            name="hubungan_dengan_korban" placeholder="Contoh Paman">
                    </div>
                    <div class="mb-6">
                        <label class="form-label" for="basic-default-message">Keterangan lainnya</label>
                        <textarea id="basic-default-message" name="keterangan_lainnya" class="form-control"
                            placeholder="adakah keterangan lain mengenai pelaku ini?"></textarea>
                    </div>
                    <h5 class="card-header text-center">Alamat Pelaku</h5>
                    <div class="mb-3 col-md-6">
                        <label for="provinsi" class="form-label">Provinsi</label>
                        <input class="form-control" type="text" name="provinsi" id="provinsi">
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="kabupaten" class="form-label">Kabupaten</label>
                        <input class="form-control" type="text" name="kabupaten" id="kabupaten">
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="kecamatan" class="form-label">Kecamatan</label>
                        <input class="form-control" type="text" name="kecamatan" id="kecamatan">
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="desa" class="form-label">Desa/Kelurahan</label>
                        <input class="form-control" type="text" name="desa" id="desa">
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="basic-default-message">Alamat Detail</label>
                        <textarea id="basic-default-message" name="keterangan_lainnya" class="form-control" placeholder=""></textarea>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="tab-pane fade" id="navs-pills-justified-pelaku" role="tabpanel">
        <div class="col-md mb-4 mb-md-0">
            <div class="accordion mt-3" id="accordionExample">
                <div class="card accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse"
                            data-bs-target="#accordionTwo" aria-expanded="false" aria-controls="accordionTwo">
                            Data Pelaku 1
                        </button>
                    </h2>
                    <div id="accordionTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <h5 class="card-header">Data Pelaku</h5>
                            <div class="card-body">
                                <div class="d-flex align-items-start align-items-sm-center gap-4">
                                    <img src="asset-admin/assets/img/avatars/1.png" alt="user-avatar"
                                        class="d-block rounded" height="150" width="150" id="uploadedAvatar">
                                </div>
                            </div>
                            <hr class="my-0">
                            <div class="card-body">
                                <form id="formAccountSettings" method="POST" onsubmit="return false">
                                    <input type="text" name="{{ $laporanDetail['no_registrasi'] }}" hidden>
                                    <div class="row">
                                        <div class="mb-3 col-md-6">
                                            <label for="nik" class="form-label">NIK (Nomor Induk
                                                kependudukan)</label>
                                            <input class="form-control" type="number" id="nik" name="nik"
                                                autofocus>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label for="nama_pelaku" class="form-label">Nama Pelaku</label>
                                            <input class="form-control" type="text" name="nama_pelaku"
                                                id="nama_pelaku">
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label for="usia_pelaku" class="form-label">Usia Pelaku</label>
                                            <input class="form-control" type="text" id="usia_pelaku"
                                                name="usia_pelaku" placeholder=" contoh 21">
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                            <input type="text" class="form-control" id="jenis_kelamin"
                                                name="jenis_kelamin">
                                        </div>

                                        <div class="mb-3 col-md-6">
                                            <label for="agama" class="form-label">Agama</label>
                                            <input type="text" class="form-control" id="agama" name="agama"
                                                placeholder="Contoh Krister">
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label" for="agama">Nomor Telepon</label>
                                            <div class="input-group input-group-merge">
                                                <span class="input-group-text">ID (+62)</span>
                                                <input type="text" id="no_telepon" name="no_telepon"
                                                    class="form-control" placeholder="0812 ">
                                            </div>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label for="pendidikan" class="form-label">Pendidikan</label>
                                            <input class="form-control" type="text" id="pendidikan" name="pendidikan"
                                                placeholder="California">
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label" for="status_perkawinan">Status Perkawinan</label>
                                            <select id="status_perkawinan" class="select2 form-select"
                                                name="status_perkawinan">
                                                <option value="">Select</option>
                                                <option value="Belum Kawin">Belum Kawin</option>
                                                <option value="Sudah Kawin">Sudah Kawin</option>
                                                <option value="Cerai">Cerai</option>
                                            </select>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label for="kebangsaan" class="form-label">Kebangsaan</label>
                                            <input type="text" class="form-control" id="kebangsaan" name="kebangsaan"
                                                placeholder="Contoh Indonesia">
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label for="hubungan_dengan_korban" class="form-label">Hubungan dengan
                                                Korban</label>
                                            <input type="text" class="form-control" id="hubungan_dengan_korban"
                                                name="hubungan_dengan_korban" placeholder="Contoh Paman">
                                        </div>
                                        <div class="mb-6">
                                            <label class="form-label" for="basic-default-message">Keterangan
                                                lainnya</label>
                                            <textarea id="basic-default-message" name="keterangan_lainnya" class="form-control"
                                                placeholder="adakah keterangan lain mengenai pelaku ini?"></textarea>
                                        </div>
                                        <h5 class="card-header text-center">Alamat Pelaku</h5>
                                        <div class="mb-3 col-md-6">
                                            <label for="provinsi" class="form-label">Provinsi</label>
                                            <input class="form-control" type="text" name="provinsi" id="provinsi">
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label for="kabupaten" class="form-label">Kabupaten</label>
                                            <input class="form-control" type="text" name="kabupaten" id="kabupaten">
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label for="kecamatan" class="form-label">Kecamatan</label>
                                            <input class="form-control" type="text" name="kecamatan" id="kecamatan">
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label for="desa" class="form-label">Desa/Kelurahan</label>
                                            <input class="form-control" type="text" name="desa" id="desa">
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label" for="basic-default-message">Alamat Detail</label>
                                            <textarea id="basic-default-message" name="keterangan_lainnya" class="form-control" placeholder=""></textarea>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>
    </div>
    </div>
    </div>
@endsection