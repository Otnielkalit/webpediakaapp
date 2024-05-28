@extends('admin.layouts.admin_master')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <h5 class="card-header">{{ $title }}</h5>
            <div class="table-responsive text-nowrap">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th>Oleh</th>
                            <th>Status</th>
                            <th>Jam Dimulai</th>
                            <th>Jam Selesai</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0 text-center">
                        @forelse ($janjitemus as $janjitemu)
                            <tr>
                                <td>
                                    <i class="fab fa-angular fa-lg text-danger me-3"></i>
                                    <strong>
                                        <a
                                            href="{{ route('janji-temu.detail', ['id' => $janjitemu['id']]) }}">{{ $janjitemu['user']['full_name'] }}</a>
                                    </strong>
                                </td>
                                <td>
                                    <span class="badge bg-label-primary me-1">{{ $janjitemu['status'] }}</span>
                                </td>
                                <td>{{ \Carbon\Carbon::parse($janjitemu['waktu_dimulai'])->format('d M Y, H:i') }}</td>
                                <td>{{ \Carbon\Carbon::parse($janjitemu['waktu_selesai'])->format('d M Y, H:i') }}</td>
                            </tr>
                        @empty
                            <tr class="text-center">
                               <td class="text-center">
                                <h3>Tidak Ada Request {{ $title }}</h3>
                               </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
