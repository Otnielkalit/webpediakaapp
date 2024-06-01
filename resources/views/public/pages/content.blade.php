@extends('public.layouts.public_master')

@section('content')
    <div class="services-area">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-8">
                    <div class="section-tittle text-center mb-80">
                        <h2>Konten</h2>
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
                        @forelse ($contents as $content)
                            <article class="blog_item">
                                <div class="blog_item_img">
                                    <img class="card-img rounded-0" src="{{ $content['image_content'] }}"
                                        alt="{{ $content['judul'] }}">
                                    <a href="#" class="blog_item_date">
                                        <h3>{{ \Carbon\Carbon::parse($content['created_at'])->format('d') }}</h3>
                                        <p>{{ \Carbon\Carbon::parse($content['created_at'])->format('M') }}</p>
                                    </a>
                                </div>

                                <div class="blog_details">
                                    <a href="{{ route('content.detail', ['id' => $content['id']]) }}"
                                        class="d-inline-block">
                                        <h2>{{ $content['judul'] }}</h2>
                                    </a>
                                    <p>{{ Str::limit(strip_tags($content['isi_content']), 150, '...') }}</p>
                                    <ul class="blog-info-link">
                                        <li>
                                            <i class="fa fa-user"></i> Kategori
                                        </li>
                                        <li>
                                            <i class="fa fa-comments"></i>
                                            {{ $content['violence_category']['category_name'] }}
                                        </li>
                                    </ul>
                                </div>
                            </article>
                        @empty
                            <p>No content available at the moment. Please check back later.</p>
                        @endforelse

                        <nav class="blog-pagination justify-content-center d-flex">
                            {{ $contents->links() }}
                        </nav>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog_right_sidebar">
                        {{-- <aside class="single_sidebar_widget search_widget">
                            <form action="{{ route('content.search') }}" method="GET">
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="keyword"
                                            placeholder='Cari dengan kata kunci' onfocus="this.placeholder = ''"
                                            onblur="this.placeholder = 'Cari dengan kata kunci'">
                                        <div class="input-group-append">
                                            <button class="btns" type="submit"><i class="ti-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </aside> --}}
                        <aside class="single_sidebar_widget post_category_widget">
                            <h4 class="widget_title">Cari Berdasarkan Kategori</h4>
                            <ul class="list cat-list">
                                @isset($violence_categories)
                                    @foreach ($violence_categories as $category)
                                        <li>
                                            <a href="{{ route('content.searchByCategory', ['category_name' => $category['category_name']]) }}"
                                                class="d-flex">

                                                <p>{{ $category['category_name'] }}</p>
                                                <p>({{ $category['post_count'] ?? 0 }})</p>
                                            </a>
                                        </li>
                                    @endforeach
                                @endisset
                            </ul>
                        </aside>


                        <aside class="single_sidebar_widget popular_post_widget">
                            <h3 class="widget_title">Recent Post</h3>
                            @foreach ($recent_posts as $post)
                                <div class="media post_item">
                                    <img src="{{ $post['image_content'] }}" alt="post" class="img-fluid" height="30"
                                        width="30">
                                    <div class="media-body">
                                        <a href="{{ route('content.detail', ['id' => $post['id']]) }}">
                                            <h3>{{ $post['judul'] }}</h3>
                                        </a>
                                        <p>{{ \Carbon\Carbon::parse($post['created_at'])->diffForHumans() }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
