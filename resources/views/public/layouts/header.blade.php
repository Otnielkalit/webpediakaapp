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
                                <img src="assets/img/logo/logo.png" alt="" width="250">
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-10 col-lg-10 col-md-10">
                        <div class="main-menu f-right d-none d-lg-block">
                            <nav>
                                <ul id="navigation">
                                    <li class="{{ \Route::is('welcome') ? 'active' : '' }}">
                                        <a href="{{ route('welcome') }}">Beranda</a>
                                    </li>
                                    {{-- <li class="{{ \Route::is('feature') ? 'active' : '' }}">
                                        <a href="{{ route('feature') }}">Fitur</a>
                                    </li> --}}
                                    <li class="{{ \Route::is('content') || \Route::is('content.detail') ? 'active' : '' }}">
                                        <a href="{{ route('content') }}">Konten</a>
                                    </li>
                                    <li class="{{ \Route::is('event') || \Route::is('event.detail') ? 'active' : '' }}">
                                        <a href="{{ route('event') }}">Event</a>
                                    </li>
                                    <li class="{{ \Route::is('contact') ? 'active' : '' }}">
                                        <a href="{{ route('contact') }}">Kontak</a>
                                    </li>
                                    <li>
                                        |
                                    </li>
                                    <li>
                                        <a href="{{ route('user.login') }}">
                                            <button type="submit" class="button boxed-btn genric-btn">Login</button>
                                        </a>
                                    </li>
                                    <li>
                                        <a>
                                            <button type="button" class="button boxed-btn genric-btn" data-toggle="modal" data-target="#downloadModal">Download</button>
                                        </a>
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

<!-- Modal -->
<div class="modal fade" id="downloadModal" tabindex="-1" role="dialog" aria-labelledby="downloadModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="downloadModalLabel">PedikaApp</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="download-container">
            <div class="download-text">
              <h1>Pindai kode QR dan dapatkan aplikasinya sekarang!</h1>
              <div class="download-buttons">
                {{-- <a href="https://apps.apple.com" target="_blank"><img src="https://developer.apple.com/assets/elements/badges/download-on-the-app-store.svg" alt="Download on the App Store"></a>
                <a href="https://play.google.com/store" target="_blank"><img src="https://upload.wikimedia.org/wikipedia/commons/7/78/Google_Play_Store_badge_EN.svg" alt="Get it on Google Play"></a> --}}
              </div>
            </div>
            <div class="download-qr-code">
              {{-- <img src="assets/img/logo/qr.png" alt="QR Code"> --}}
              <img src="assets/img/logo/qrcode.png" alt="QR Code">
            </div>
          </div>
        </div>
      </div>
    </div>
</div>

  <style>
    .download-container {
    display: flex;
    align-items: center;
    justify-content: space-between;
    border: 1px solid #ccc;
    border-radius: 10px;
    padding: 20px;
    max-width: 600px;
    margin: auto;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}
.download-text {
    flex: 1;
    margin-right: 20px;
}
.download-text h1 {
    font-size: 1.5em;
    margin-bottom: 10px;
}
.download-buttons {
    display: flex;
    gap: 10px;
    margin-top: 10px;
}
.download-buttons img {
    height: 40px;
}
.download-qr-code {
    flex: none;
}
.download-qr-code img {
    height: 300px;
    width: 300px;
}

  </style>
