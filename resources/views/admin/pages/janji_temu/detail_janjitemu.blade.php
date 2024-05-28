@extends('admin.layouts.admin_master')

@section('content')
    <h1>Detail janji temu</h1>
    <div class="card">
        <h5 class="card-header">Janji Temu di request oleh {{ $detailJanjiTemu['user']['full_name'] }}</h5>
        <div class="card-body d-flex justify-content-start">
            <form action="{{ route('janji-temu.setujui', ['id' => $detailJanjiTemu['id']]) }}" method="POST">
                @csrf
                @method('PUT')
                <button type="submit" class="btn btn-primary me-2">
                    <i class="bx bx-check"></i> Setujui
                </button>
            </form>
            <button type="button" class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#modalCenter">
                Tolak
            </button>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table table-striped">
                <tbody class="table-border-bottom-0">
                    <tr>
                        <td>
                            <i class="fab fa-angular fa-lg text-danger"></i>
                            <strong>Nama Masyarakat</strong>
                        </td>
                        <td>{{ $detailJanjiTemu['user']['full_name'] }}</td>
                    </tr>
                </tbody>
                <tbody class="table-border-bottom-0">
                    <tr>
                        <td>
                            <i class="fab fa-angular fa-lg text-danger"></i>
                            <strong>Photo Profil</strong>
                        </td>
                        <td>
                            <img src="{{ !empty($detailJanjiTemu['user']['photo_profile']) ? $detailJanjiTemu['user']['photo_profile'] : asset('asset-admin/assets/img/avatars/no_photo.png') }}"
                                alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar">
                        </td>
                    </tr>
                </tbody>
                <tbody class="table-border-bottom-0">
                    <tr>
                        <td>
                            <i class="fab fa-angular fa-lg text-danger"></i>
                            <strong>Nomor Telepon</strong>
                        </td>
                        <td>{{ $detailJanjiTemu['user']['phone_number'] }}</td>
                    </tr>
                </tbody>
                <tbody class="table-border-bottom-0">
                    <tr>
                        <td>
                            <i class="fab fa-angular fa-lg text-danger"></i>
                            <strong>Jam Dimulai</strong>
                        </td>
                        <td>{{ \Carbon\Carbon::parse($detailJanjiTemu['waktu_dimulai'])->format('d M Y, H:i') }}</td>
                    </tr>
                </tbody>
                <tbody class="table-border-bottom-0">
                    <tr>
                        <td>
                            <i class="fab fa-angular fa-lg text-danger"></i>
                            <strong>Jam Selesai</strong>
                        </td>
                        <td>{{ \Carbon\Carbon::parse($detailJanjiTemu['waktu_selesai'])->format('d M Y, H:i') }}</td>
                    </tr>
                </tbody>
                <tbody class="table-border-bottom-0">
                    <tr>
                        <td>
                            <i class="fab fa-angular fa-lg text-danger"></i>
                            <strong>Keperluan Konsultasi</strong>
                        </td>
                        <td>{{ $detailJanjiTemu['keperluan_konsultasi'] }}</td>
                    </tr>
                </tbody>
                <tbody class="table-border-bottom-0">
                    <tr>
                        <td>
                            <i class="fab fa-angular fa-lg text-danger"></i>
                            <strong>Status Request</strong>
                        </td>
                        <td>
                            <span class="badge bg-label-primary me-1">{{ $detailJanjiTemu['status'] }}</span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Tolak Pertemuan -->
<div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCenterTitle">Tolak Pertemuan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('janji-temu.tolak', ['id' => $detailJanjiTemu['id']]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label" for="alasan_ditolak">Alasan Ditolak</label>
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-message2" class="input-group-text">
                                <i class="bx bx-comment"></i>
                            </span>
                            <textarea id="alasan_ditolak" name="alasan_ditolak" rows="3" class="form-control" placeholder="Kenapa anda menolak Pertemuan ini?"
                                aria-label="Kenapa anda menolak Pertemuan ini?" aria-describedby="basic-icon-default-message2" required></textarea>
                        </div>
                        @error('alasan_ditolak')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tolak Sekarang</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
