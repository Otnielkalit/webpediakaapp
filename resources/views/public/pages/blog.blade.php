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
                                    <a href="{{ route('blog.detail', ['id' => $content['id']]) }}" class="d-inline-block">
                                        <h2>{{ $content['judul'] }}</h2>
                                    </a>
                                    <p>{{ Str::limit(strip_tags($content['isi_content']), 150, '...') }}</p>
                                </div>
                            </article>
                        @empty
                            <p>No content available at the moment. Please check back later.</p>
                        @endforelse

                        <nav class="blog-pagination justify-content-center d-flex">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a href="#" class="page-link" aria-label="Previous">
                                        <i class="ti-angle-left"></i>
                                    </a>
                                </li>
                                <li class="page-item">
                                    <a href="#" class="page-link">1</a>
                                </li>
                                <li class="page-item active">
                                    <a href="#" class="page-link">2</a>
                                </li>
                                <li class="page-item">
                                    <a href="#" class="page-link" aria-label="Next">
                                        <i class="ti-angle-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="blog_right_sidebar">
                        <aside class="single_sidebar_widget search_widget">
                            <form action="#">
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder='Search Keyword'
                                            onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Keyword'">
                                        <div class="input-group-append">
                                            <button class="btns" type="button"><i class="ti-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                                    type="submit">Search</button>
                            </form>
                        </aside>

                        <aside class="single_sidebar_widget post_category_widget">
                            <h4 class="widget_title">Category</h4>
                            <ul class="list cat-list">
                                <li>
                                    <a href="#" class="d-flex">
                                        <p>Kekerasan Anak</p>
                                        <p>(37)</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="d-flex">
                                        <p>Pelecehan</p>
                                        <p>(10)</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="d-flex">
                                        <p>Kekerasan Perempuan</p>
                                        <p>(03)</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="d-flex">
                                        <p>Product</p>
                                        <p>(11)</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="d-flex">
                                        <p>Inspiration</p>
                                        <p>(21)</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="d-flex">
                                        <p>Health Care (21)</p>
                                        <p>(09)</p>
                                    </a>
                                </li>
                            </ul>
                        </aside>

                        {{-- <aside class="single_sidebar_widget popular_post_widget">
                            <h3 class="widget_title">Recent Post</h3>
                            @foreach ($recent_posts as $post)
                                <div class="media post_item">
                                    <img src="{{ $post['image'] }}" alt="post">
                                    <div class="media-body">
                                        <a href="{{ route('blog.detail', ['id' => $post['id']]) }}">
                                            <h3>{{ $post['title'] }}</h3>
                                        </a>
                                        <p>{{ \Carbon\Carbon::parse($post['created_at'])->format('M d, Y') }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </aside> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
