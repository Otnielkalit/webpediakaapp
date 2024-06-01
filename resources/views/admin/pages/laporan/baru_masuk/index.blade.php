{{-- resources/views/admin/pages/laporan/baru_masuk/index.blade.php --}}
@extends('admin.layouts.admin_master')
@section('content')
    <div class="card">
        <h3 class="card-header text-center">{{ $title }}</h3>
        <div class="table-responsive text-nowrap">
            <table class="table text-center">
                <thead class="table-light">
                    <tr>
                        <th>No Registrasi</th>
                        <th>Tanggal Laporan</th>
                        <th>Jam Pelaporan</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @forelse ($laporans as $laporan)
                        <tr>
                            <td>
                                <i class="fab fa-angular fa-lg text-danger me-3"></i>
                                <strong>
                                    <form
                                        action="{{ route('laporan.lihat', ['no_registrasi' => $laporan['no_registrasi']]) }}"
                                        method="POST" id="lihat-laporan-{{ $laporan['no_registrasi'] }}">
                                        @csrf
                                        @method('PUT')
                                        <a href="#"
                                            onclick="event.preventDefault(); document.getElementById('lihat-laporan-{{ $laporan['no_registrasi'] }}').submit();">{{ $laporan['no_registrasi'] }}</a>
                                    </form>
                                </strong>
                            </td>
                            <td>
                                {{ \Carbon\Carbon::parse($laporan['tanggal_pelaporan'])->format('d M Y') }}
                            </td>
                            <td>
                                {{ \Carbon\Carbon::parse($laporan['tanggal_pelaporan'])->format('H:i') }}
                            </td>
                            <td>
                                <span class="badge bg-label-primary me-1">{{ $laporan['status'] }}</span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">
                                <h2>Belum Ada Laporan yang baru masuk</h2>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('form[id^="lihat-laporan-"]').forEach(form => {
                form.addEventListener('submit', function(event) {
                    event.preventDefault();
                    const noRegistrasi = this.id.split('-')[2];
                    fetch(this.action, {
                        method: 'POST',
                        body: new FormData(this)
                    }).then(response => {
                        if (response.ok) {
                            window.location.href =
                                "{{ route('laporan.masuk-detail', '') }}/" + noRegistrasi;
                        } else {
                            response.json().then(data => {
                                alert(data.message);
                            });
                        }
                    }).catch(error => {
                        console.error('Error:', error);
                    });
                });
            });
        });
    </script>
@endpush
