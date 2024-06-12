@extends('public.layouts.public_master')

@section('content')
    <main>
        <div class="slider-area ">
            <div class="slider-active">
                <div class="single-slider slider-height slider-padding sky-blue d-flex align-items-center">
                    <div class="container">
                        <div class="row d-flex align-items-center">
                            <div class="col-lg-6 col-md-9 ">
                                <div class="hero__caption">
                                    <h1 data-animation="fadeInUp" data-delay=".6s">
                                        Tangani Kekerasan
                                        <br>
                                        Dengan Pedika App
                                    </h1>
                                    <div class="slider-btns">
                                        <a data-animation="fadeInLeft" data-delay="1.0s" href="industries.html"
                                            class="btn radius-btn" data-toggle="modal"
                                            data-target="#downloadModal">Download</a>
                                        <a data-animation="fadeInRight" data-delay="1.0s"
                                            class="popup-video video-btn ani-btn"
                                            href="https://www.youtube.com/watch?v=2ESInzV7JQQ" target="_blank">
                                            <i class="fas fa-play"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="hero__img d-none d-lg-block f-right" data-animation="fadeInRight"
                                    data-delay="1s">
                                    <img src="assets/img/hero/home_page.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single-slider slider-height slider-padding sky-blue d-flex align-items-center">
                    <div class="container">
                        <div class="row d-flex align-items-center">
                            <div class="col-lg-6 col-md-9 ">
                                <div class="hero__caption">
                                    <span data-animation="fadeInUp" data-delay=".4s">App Landing Page</span>
                                    <h1 data-animation="fadeInUp" data-delay=".6s">
                                        Get things done
                                        <br>
                                        with Appco
                                    </h1>
                                    <p data-animation="fadeInUp" data-delay=".8s">Dorem ipsum dolor sitamet,
                                        consectetur adipiscing elit, sed do eiusm tempor incididunt ulabore et dolore
                                        magna aliqua.</p>
                                    <div class="slider-btns">
                                        <a data-animation="fadeInLeft" data-delay="1.0s" href="industries.html"
                                            class="btn radius-btn">Download</a>
                                        <a data-animation="fadeInRight" data-delay="1.0s"
                                            class="popup-video video-btn ani-btn"
                                            href="https://www.youtube.com/watch?v=1aP-TXUpNoU">
                                            <i class="fas fa-play"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="hero__img d-none d-lg-block f-right" data-animation="fadeInRight"
                                    data-delay="1s">
                                    <img src="assets/img/hero/hero_right.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="applic-apps section-padding2">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-8">
                        <div class="single-cases-info mb-30">
                            <h3>
                                Secreenshoot
                                <br>
                                Aplikasi
                            </h3>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-8 col-md-col-md-7">
                        <div class="app-active owl-carousel">
                            <div class="single-cases-img">
                                <img src="assets/img/gallery/App1.png" alt="">
                            </div>
                            <div class="single-cases-img">
                                <img src="assets/img/gallery/App2.png" alt="">
                            </div>
                            <div class="single-cases-img">
                                <img src="assets/img/gallery/App3.png" alt="">
                            </div>
                            <div class="single-cases-img">
                                <img src="assets/img/gallery/App2.png" alt="">
                            </div>
                            <div class="single-cases-img">
                                <img src="assets/img/gallery/App1.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="available-app-area">
            <div class="container">
                <div class="row d-flex justify-content-between">
                    <div class="col-xl-5 col-lg-6">
                        <div class="app-caption">
                            <div class="section-tittle section-tittle3">
                                <div class="phone">
                                    <img id="phoneImage" src="assets/img/gallery/App1.png" alt="Privy App">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="steps">
                            <ol id="stepsList">
                                <li data-image="assets/img/gallery/boarding.png" class="active">1. Install Aplikasi Pedika
                                    App dengan Scan barcode yang sudah kami sediakan di atas
                                    Store or Play Store.</li>
                                <li data-image="assets/img/gallery/log-reg.png">2. Login atau Daftarkan Akun anda melalui
                                    apliaksi PedikaApp
                                </li>
                                <li data-image="assets/img/gallery/registrasi.png">3. Daftarkan Akun anda dengan mengisi data yang benar</li>
                                <li data-image="assets/img/gallery/login.png">4. Setalah Berhasil registrasi akun silahkan login dengan akun baru anda</li>
                                <li data-image="assets/img/gallery/home.png">5. Silahkan gunakan Fitur yang kami sediakan pada aplikasi Pedikaap</li>
                                <li data-image=assets/img/gallery/emergency.png>6. Anda juga bisa menggunakan fitur emergency call</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="app-shape">
                <img src="assets/img/shape/app-shape-top.png" alt=""
                    class="app-shape-top heartbeat d-none d-lg-block">
                <img src="assets/img/shape/app-shape-left.png" alt="" class="app-shape-left d-none d-xl-block">
                <img src="assets/img/shape/app-shape-right.png" alt="" class="app-shape-right bounce-animate ">
            </div>
        </div>
        <div class="say-something-aera pt-90 pb-90 fix">
            <div class="container">
                <div class="row justify-content-between align-items-center">
                    <div class="offset-xl-1 offset-lg-1 col-xl-5 col-lg-5">
                        <div class="say-something-cap">
                            <h2>Katakan Sesuatu Kepada Kami</h2>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-3">
                        <div class="say-btn">
                            <a href="{{ route('contact') }}" class="btn radius-btn">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="say-shape">
                <img src="assets/img/shape/say-shape-left.png" alt=""
                    class="say-shape1 rotateme d-none d-xl-block">
                <img src="assets/img/shape/say-shape-right.png" alt="" class="say-shape2 d-none d-lg-block">
            </div>
        </div>
    </main>
@endsection
