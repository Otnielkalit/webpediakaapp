@extends('admin.layouts.admin_master')

@section('content')
    <h1>Detail Content</h1>
    <div class="row mb-5">
        <div class="col-md">
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img class="card-img card-img-left" src="{{ $contentDetail['image_content'] }}" alt="Card image">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h3 class="card-title">{{ $contentDetail['judul'] }}</h3>
                            <p class="card-text">
                                {!! $contentDetail['isi_content'] !!}
                            </p>
                            <p class="card-text">
                                <small>Updatedan terakhir {{ \Carbon\Carbon::parse($contentDetail['updated_at'])->format('d M Y') }}
                                </small>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
