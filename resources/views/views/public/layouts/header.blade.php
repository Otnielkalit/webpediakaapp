<div id="preloader-active">
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-inner position-relative">
            <div class="preloader-circle"></div>
            <div class="preloader-img pere-text">
                <img src="assets/img/logo/logo.png" alt="">
            </div>
        </div>
    </div>
</div>
<header>
    <div class="header-area header-transparrent ">
        <div class="main-header header-sticky">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-2 col-lg-2 col-md-2">
                        <div class="logo">
                            <a href="index.html">
                                <img src="assets/img/logo/logo.png" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-10 col-lg-10 col-md-10">
                        <div class="main-menu f-right d-none d-lg-block">
                            <nav>
                                <ul id="navigation">
                                    <li class="{{ \Route::is('welcome') ? 'active' : '' }}">
                                        <a href="{{ route('welcome') }}">Home</a>
                                    </li>
                                    <li>
                                    <li class="{{ \Route::is('feature') ? 'active' : '' }}">
                                        <a href="{{ route('feature') }}">Feature</a>
                                    </li>
                                    <li class="{{ \Route::is('blog') ? 'active' : '' }}">
                                        <a href="{{ route('blog') }}">Blog</a>
                                    </li>
                                    <li>
                                        <a href="#">Pages</a>
                                        <ul class="submenu">
                                            <li>
                                                <a href="blog.html">Blog</a>
                                            </li>
                                            <li>
                                                <a href="single-blog.html">Blog Details</a>
                                            </li>
                                            <li>
                                                <a href="elements.html">Element</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="{{ \Route::is('contact') ? 'active' : '' }}">
                                        <a href="{{ route('contact') }}">Contact</a>
                                    </li>
                                    <li>
                                        |
                                    </li>

                                    <li>
                                        <a href="{{ route('user.login') }}">
                                            <button type="submit" class="button boxed-btn genric-btn">Login</button>
                                        </a>
                                    </li>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
