@extends('public.layouts.public_master')

@section('content')
    <div class="services-area">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-8">
                    <div class="section-tittle text-center mb-80">
                        <h2>Event DPMDPPA</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="blog_area section-paddingr">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <div class="blog_left_sidebar">
                        @forelse ($events as $event)
                            <article class="blog_item">
                                <div class="blog_item_img">
                                    <img class="card-img rounded-0" src="{{ $event['thumbnail_event'] }}"
                                        alt="{{ $event['nama_event'] }}">
                                    <a href="#" class="blog_item_date">
                                        <h3>{{ \Carbon\Carbon::parse($event['created_at'])->format('d') }}</h3>
                                        <p>{{ \Carbon\Carbon::parse($event['created_at'])->format('M') }}</p>
                                    </a>
                                </div>

                                <div class="blog_details">
                                    <a href="{{ route('event.detail', ['id' => $event['id']]) }}" class="d-inline-block">

                                        <h2>{{ $event['nama_event'] }}</h2>
                                    </a>
                                    <p>{!! Str::limit(strip_tags($event['deskripsi_event']), 150, '...') !!}</p>
                                    <ul class="blog-info-link">
                                        <li>
                                            <i class="fa fa-calendar"></i>
                                            {{ \Carbon\Carbon::parse($event['tanggal_pelaksanaan'])->locale('id')->isoFormat('LL') }}
                                        </li>
                                        <li>
                                            <i class="fa fa-clock"></i>
                                            {{ \Carbon\Carbon::parse($event['created_at'])->locale('id')->diffForHumans() }}
                                        </li>
                                    </ul>
                                </div>
                            </article>
                        @empty
                            <h1 class="text-center">Belum Ada Kegiatan atau event dari DPMDPPA</h1>
                        @endforelse

                        <nav class="blog-pagination justify-content-center d-flex">
                            {{ $events->links() }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
