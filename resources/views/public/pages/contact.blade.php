@extends('public.layouts.public_master')
@section('content')
    <div class="services-area">
        <div class="container">
            <!-- Section-tittle -->
            <div class="row d-flex justify-content-center">
                <div class="col-lg-8">
                    <div class="section-tittle text-center mb-80">
                        <h2>Kontak Kami​</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="contact-section">
        <div class="container">
            <div class="d-none d-sm-block mb-5 pb-4">
                <div class="map-container">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4905.267775428106!2d99.06063007934567!3d2.335780099999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x302e0596302b7b71%3A0xdd3c80b4b307aa0f!2sDinas%20PMDPPA!5e1!3m2!1sid!2sid!4v1717293741155!5m2!1sid!2sid"
                        allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <h2 class="contact-title">Hubungi Kami</h2>
                </div>
                <div class="col-lg-8">
                    <form class="form-contact contact_form" action="contact_process.php" method="post" id="contactForm"
                        novalidate="novalidate">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <textarea class="form-control w-100" name="message" id="message" cols="30" rows="9"
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Message'" placeholder=" Enter Message"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control valid" name="name" id="name" type="text"
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'"
                                        placeholder="Enter your name">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control valid" name="email" id="email" type="email"
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'"
                                        placeholder="Email">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <input class="form-control" name="subject" id="subject" type="text"
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Subject'"
                                        placeholder="Enter Subject">
                                </div>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" class="button button-contactForm boxed-btn">Send</button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-3 offset-lg-1">
                    <div class="media contact-info">
                        <span class="contact-info__icon">
                            <i class="ti-home"></i>
                        </span>
                        <div class="media-body">
                            <h3>Jl. Siliwangi No.1, Kec. Balige, Toba, Sumatera Utara 22312</h3>
                        </div>
                    </div>
                    <div class="media contact-info">
                        <span class="contact-info__icon">
                            <i class="ti-tablet"></i>
                        </span>
                        <div class="media-body">
                            <h3>Telp. (0632) 322709 Fax. (0632) 21810</h3>
                            <p>Senin sampi Jumat pukul 09.00 hingga 17.00</p>
                        </div>
                    </div>
                    <div class="media contact-info">
                        <span class="contact-info__icon">
                            <i class="ti-email"></i>
                        </span>
                        <div class="media-body">
                            <h3>dpmdppa@tobakab.go.id</h3>
                            <p>Kirimkan pertanyaan Anda kepada kami kapan saja!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
<style>
    .map-container {
        position: relative;
        padding-bottom: 56.25%;
        /* 16:9 ratio */
        height: 0;
        overflow: hidden;
        max-width: 100%;
        height: auto;
    }

    .map-container iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        border: 0;
    }
</style>
