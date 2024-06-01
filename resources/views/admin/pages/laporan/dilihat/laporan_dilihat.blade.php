@extends('admin.layouts.admin_master')
@section('content')
    <div class="card">
        <h3 class="card-header text-center">{{ $title }}</h3>
        <div class="table-responsive text-nowrap">
            <table class="table text-center">
                <thead class="table-light">
                    <tr>
                        <th>No Registrasi</th>
                        <th>Waktu Pelaporan</th>
                        <th>Status</th>
                        <th>Waktu Dilihat</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @forelse ($laporanDilihat as $laporan)
                        <tr>
                            <td>
                                <i class="fab fa-angular fa-lg text-danger me-3"></i>
                                <strong><a
                                        href="{{ route('laporan.detail-dilihat', ['no_registrasi' => $laporan['no_registrasi']]) }}">{{ $laporan['no_registrasi'] }}</a></strong>
                            </td>
                            <td>
                                {{ \Carbon\Carbon::parse($laporan['tanggal_pelaporan'])->format('d M Y') }} jam
                                {{ \Carbon\Carbon::parse($laporan['tanggal_pelaporan'])->format('H:i') }}

                            </td>
                            <td>
                                <span class="badge bg-label-primary me-1">{{ $laporan['status'] }}</span>
                            </td>
                            <td>
                                {{ \Carbon\Carbon::parse($laporan['waktu_dilihat'])->format('d M Y') }} jam
                                {{ \Carbon\Carbon::parse($laporan['waktu_dilihat'])->format('H:i') }}

                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">
                                <h2>Belum ada Laporan yang sudah dilihat</h2>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
