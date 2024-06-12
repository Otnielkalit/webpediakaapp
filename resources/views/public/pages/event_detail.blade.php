@extends('public.layouts.public_master')

@section('content')
    <!-- Slider Area Start-->
    <div class="services-area">
        <div class="container">
            <!-- Section-tittle -->
            <div class="row d-flex justify-content-center">
                <div class="col-lg-8">
                    <div class="section-tittle text-center mb-80">
                        <h2>Event Details</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Slider Area End-->

    <!--================Blog Area =================-->
    <section class="blog_area single-post-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 posts-list">
                    @if ($event)
                        <div class="single-post">
                            <div class="feature-img" style="position: relative;">
                                <img class="img-fluid" src="{{ $event['thumbnail_event'] }}" alt="{{ $event['nama_event'] }}" style="width: 100%; height: auto; border-radius: 15px;">
                            </div>
                            <div class="blog_details mt-4">
                                <h2>{{ $event['nama_event'] }}</h2>
                                <ul class="blog-info-link mt-3 mb-4">
                                    <li><i class="fa fa-calendar"></i>
                                        {{ \Carbon\Carbon::parse($event['tanggal_pelaksanaan'])->locale('id')->isoFormat('LL') }}
                                    </li>
                                    <li><i class="fa fa-clock"></i>
                                        {{ \Carbon\Carbon::parse($event['created_at'])->locale('id')->diffForHumans() }}
                                    </li>
                                </ul>
                                <p class="excert">{!! $event['deskripsi_event'] !!}</p>
                            </div>
                        </div>
                    @else
                        <p>Event not found.</p>
                    @endif
                </div>
            </div>
        </div>
    </section>

@endsection
