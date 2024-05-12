@extends('admin.layouts.admin_master')
@section('content')
    <div class="card">
        <h3 class="card-header text-center">{{ $title }}</h3>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead class="table-light">
                    <tr>
                        <th>No Registrasi</th>
                        <th>Tanggal Laporan</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @forelse ($laporan as $laporan)
                        <tr>
                            <td>
                                <i class="fab fa-angular fa-lg text-danger me-3"></i>
                                <strong><a
                                        href="{{ route('laporan.detail', ['no_registrasi' => $laporan['no_registrasi']]) }}">{{ $laporan['no_registrasi'] }}</a></strong>
                            </td>
                            <td>{{ $laporan['tanggal_pelaporan'] }}</td>
                            <td>
                                <span class="badge bg-label-primary me-1">Baru</span>
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

