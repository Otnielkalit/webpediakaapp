@extends('public.layouts.public_master')
@section('content')
    <!-- Slider Area Start-->
    <div class="services-area">
        <div class="container">
            <!-- Section-tittle -->
            <div class="row d-flex justify-content-center">
                <div class="col-lg-8">
                    <div class="section-tittle text-center mb-80">
                        <h2>PedikaApp</h2>
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
                    @if ($content)
                        <div class="single-post">
                            <div class="feature-img">
                                <img class="img-fluid" src="{{ $content['image_content'] }}" alt="gambar">
                            </div>
                            <div class="blog_details">
                                <h2>
                                    {{ $content['judul'] }}
                                </h2>
                                <ul class="blog-info-link mt-3 mb-4">
                                    <h5>Diposting pada {{ \Carbon\Carbon::parse($content['created_at'])->format('d M Y') }}</h5>
                                </ul>
                                <p class="excert">
                                    {!! $content['isi_content'] !!}
                                </p>
                                @if (isset($content['quote']))
                                    <div class="quote-wrapper">
                                        <div class="quotes">
                                            {{ $content['quote'] }}
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @else
                        <p>Bekum Ada Konten yang di Posting</p>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
