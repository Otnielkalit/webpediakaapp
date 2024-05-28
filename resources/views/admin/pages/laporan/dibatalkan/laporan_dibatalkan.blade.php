@extends('admin.layouts.admin_master')
@section('content')
    <div class="card">
        <h3 class="card-header text-center">{{ $title }}</h3>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead class="table-light">
                    <tr>
                        <th>No Registrasi</th>
                        <th>Waktu Pelaporan</th>
                        <th>Waktu Pembatalan</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @forelse ($laporanDibatalkan as $laporan)
                        <tr>
                            <td>
                                <i class="fab fa-angular fa-lg text-danger me-3"></i>
                                <strong><a
                                        href="{{ route('laporan.detail-dibatalkan', ['no_registrasi' => $laporan['no_registrasi']]) }}">{{ $laporan['no_registrasi'] }}</a></strong>
                            </td>
                            <td>
                                {{ \Carbon\Carbon::parse($laporan['tanggal_pelaporan'])->format('d M Y, H:i') }}

                            </td>
                            <td>
                                {{ \Carbon\Carbon::parse($laporan['waktu_dibatalkan'])->format('d M Y, H:i') }}

                            </td>
                            <td>
                                <span class="badge bg-label-primary me-1">{{ $laporan['status'] }}</span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">No report available.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
