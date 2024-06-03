@extends('admin.layouts.admin_master')

@section('content')
    <h1>Detail Content</h1>
    <div class="row mb-5">
        <div class="col-md">
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-md-12">
                        <img class="card-img card-img-left" src="{{ $eventDetail['thumbnail_event'] }}" alt="Card image">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h3 class="card-title">{{ $eventDetail['nama_event'] }}</h3>
                            <p class="card-text">
                                {!! $eventDetail['deskripsi_event'] !!}
                            </p>
                            <p class="card-text">
                                <small>Waktu Pelaksanaan{{ \Carbon\Carbon::parse($eventDetail['tanggal_pelaksanaan'])->format('d M Y') }}
                                </small>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
