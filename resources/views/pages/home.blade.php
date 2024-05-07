<!doctype html>
<html lang="en-US">

<head>

    <title>BPKM - Badan Pengelola Kemakmuran Masjid</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="HandheldFriendly" content="true">
    <meta name="author" content="bslthemes" />
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.googleapis.com" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Epilogue%3Aital%2Cwght%400%2C100%3B0%2C200%3B0%2C300%3B0%2C400%3B0%2C500%3B0%2C600%3B0%2C700%3B0%2C800%3B0%2C900%3B1%2C100%3B1%2C200%3B1%2C300%3B1%2C400%3B1%2C500%3B1%2C600%3B1%2C700%3B1%2C800%3B1%2C900&#038;display=swap"
        type="text/css" media="all" />
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <!-- CSS STYLES -->
    <link rel="stylesheet" href="assets/css/vendors/bootstrap.css" type="text/css" media="all" />
    <link rel="stylesheet" href="assets/fonts/font-awesome/css/font-awesome.css" type="text/css" media="all" />
    <link rel="stylesheet" href="assets/css/vendors/magnific-popup.css" type="text/css" media="all" />
    <link rel="stylesheet" href="assets/css/vendors/splitting.css" type="text/css" media="all" />
    <link rel="stylesheet" href="assets/css/vendors/swiper.css" type="text/css" media="all" />
    <link rel="stylesheet" href="assets/css/vendors/animate.css" type="text/css" media="all" />
    <link rel="stylesheet" href="assets/css/vendors/jquery.pagepiling.css" type="text/css" media="all" />
    <link rel="stylesheet" href="assets/css/style.css" type="text/css" media="all" />
    <!-- Favicon -->
    <link rel="shortcut icon" href={{ asset('/images/ico.png') }} />
    <style>
        /* Override col-lg-2 untuk membuatnya lebih besar */
        @media (min-width: 992px) {
            .col-lg-2-c {
                flex: 0 0 20%;
                /* Sesuaikan persentase lebar sesuai kebutuhan */
                max-width: 20%;
            }
        }

        @media (min-width: 992px) {
            .col-lg-3-c {
                flex: 0 0 28%;
                /* Sesuaikan persentase lebar sesuai kebutuhan */
                max-width: 28%;
            }
        }

        .onovo-video {
            border-radius: 20px;
            overflow: hidden;
            /* Untuk memastikan bahwa gambar dan iframe berada di dalam elemen yang dibulatkan. */
        }

        .onovo-video .image {
            border-radius: 20px;
        }

        .overlayy {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to top, rgba(171, 80, 159, 0.8) 0%, rgba(171, 80, 159, 0) 100%);
            pointer-events: none;
            /* Untuk memastikan overlay tidak menghalangi interaksi pengguna. */
        }

        .image {
            position: relative;
            overflow: hidden;
            animation: zoomOutAnimation 10s infinite alternate;
            /* Mengatur animasi selama 10 detik */
        }

        .image img {
            width: 100%;
            height: auto;
            transform: scale(1);
            transition: transform 0.5s ease-in-out;
        }

        @keyframes zoomOutAnimation {
            from {
                transform: scale(1);
                /* Skala awal */
            }

            to {
                transform: scale(1.2);
                /* Skala akhir */
            }
        }

        .overlayy {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            /* background: rgba(0, 0, 0, 0.5); */
            opacity: 0;
            transition: opacity 0.5s ease-in-out;
        }
    </style>


</head>

<body class="">

    <!-- Page -->
    <div class="onovo-page footer--fixed">

        <!-- Preloader -->
        {{-- <div class="preloader">
            <div class="preloader__spinner">
                <span class="preloader__double-bounce"></span>
                <span class="preloader__double-bounce preloader__double-bounce--delay"></span>
            </div>
        </div> --}}

        <header class="onovo-header header--white">
            <div class="header--builder">
                <div class="container">
                    <div class="row">
                        <div class="col-4 col-xs-4 col-sm-4 col-md-4 col-lg-2 align-self-center ">
                            <!-- Logo -->
                            <div class="onovo-logo-image" style="max-width: 200px">
                                <a href="">
                                    <img src="images/logo-bpkm.png" alt="Onovo" />
                                    <img class="logo--white" src="images/logo-bpkm.png" alt="Onovo" />
                                </a>
                            </div>

                        </div>
                        <div
                            class="col-8 col-xs-8 col-sm-8 col-md-5 col-lg-9 align-self-center align-right m-align-right">
                            <!-- Menu Horizontal -->
                            <div class="onovo-menu-horizontal">
                                <ul class="onovo-menu-nav">
                                    <li>
                                        <a class="onovo-lnk lnk--active" href="{{ route('about') }}">Tentang</a>
                                    </li>
                                    <li>
                                        <a class="onovo-lnk lnk--active" href="{{ route('register') }}">Daftar</a>
                                    </li>

                                </ul>
                            </div>

                            <!-- Menu Hamburger -->
                            <a href="#" class="onovo-menu-btn" style="display: none;"><span></span></a>
                            <div class="onovo-menu-popup align-left">
                                <div class="onovo-menu-overlay"></div>
                                <div class="onovo-menu-overlay-after"></div>
                                <div class="onovo-menu-container onovo--noscroll">
                                    <div class="container">
                                        <div class="onovo-menu">
                                            <ul class="onovo-menu-nav">
                                                <li>
                                                    <a class="onovo-lnk lnk--active"
                                                        href="{{ route('about') }}">Tentang</a>
                                                </li>
                                                <li>
                                                    <a class="onovo-lnk lnk--active"
                                                        href="{{ route('register') }}">Daftar</a>
                                                </li>
                                                <li>
                                                    <a class="onovo-lnk lnk--active"
                                                        href="{{ route('login') }}">Masuk</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class=" col-4 col-xs-4 col-sm-4 col-md-3 col-lg-1 align-self-center align-center hide-on-mobile-extra"
                            style="padding-left: 0px">
                            <!-- Button -->
                            <a class="onovo-btn onovo-hover-btn btn--active" href="{{ route('login') }}">
                                <span style="color:white">Masuk</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Wrapper -->
        <div class="wrapper" style="padding-bottom: 0px;">

            {{-- <!-- Onovo Hero -->
            <section class="onovo-section onovo-hero">
                <div class="image">

                    <img src="assets/images/ytthumbnail.jpg" alt="">
                    <div class="ovrl" style="opacity: 0.25;"></div>
                </div>
                <div class="container">
                    <h1 class="title onovo-text-white">

                    </h1>

                </div>
            </section> --}}




            <!-- Onovo Hero -->
            <section class="onovo-section onovo-hero hero--two">

                <!-- Hero swiper -->
                <div class="swiper-container js-hero-slider" data-loop="true" data-autoplay="6000">
                    <div class="swiper-wrapper">

                        <!--slide-->
                        <div class="swiper-slide" data-swiper-autoplay>
                            <div class="onovo-hero-slide-item">
                                <div class="image" data-dimg="assets/images/banner1.jpg"
                                    data-mimg="assets/images/banner1.jpg" style="opacity: 0.5">
                                    <div class="overlayy" style="opacity: 1;"></div>
                                </div>
                                <div class="container">
                                    <div class="titles">
                                        <h1 class="title onovo-text-white">
                                            <span data-splitting> Badan Pengelola <br />Kemakmuran Masjid </span>
                                        </h1>
                                        <div class="text">
                                            <div class="subtitle onovo-text-white subtitle--left">
                                                <div data-splitting> Badan Pengelola Kemakmuran Masjid (BPKM) adalah
                                                    lembaga khusus mewakili pengasuh dalam mengelola bangunan Masjid
                                                    Pusat dan Masjid Cabang</div>
                                            </div>
                                            {{-- <div class="onovo-bts">
                                                <a class="onovo-btn btn--border btn--white btn--color onovo-hover-btn"
                                                    href="about-us.html">
                                                    <i class="arrow">
                                                         <span></span>
                                                    </i>
                                                    <span> Learn More </span>
                                                </a>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!--slide-->
                        <div class="swiper-slide" data-swiper-autoplay>
                            <div class="onovo-hero-slide-item">
                                <div class="image" data-dimg="assets/images/banner2.jpg"
                                    data-mimg="assets/images/banner2.jpg" style="opacity: 0.5">
                                    <div class="overlayy" style="opacity: 1;"></div>
                                </div>
                                <div class="container">
                                    <div class="titles">
                                        <h1 class="title onovo-text-white">
                                            <span data-splitting> Badan Pengelola <br />Kemakmuran Masjid </span>
                                        </h1>
                                        <div class="text">
                                            <div class="subtitle onovo-text-white subtitle--left">
                                                <div data-splitting> Berdiri pada hari Jum'at 28 Oktober 2022 dalam
                                                    rangka memberi layanan khusus untuk mengelola Masjid Pusat dan
                                                    Masjid Cabang</div>
                                            </div>
                                            {{-- <div class="onovo-bts">
                                                <a class="onovo-btn btn--border btn--white btn--color onovo-hover-btn"
                                                    href="services.html">
                                                    <i class="arrow">
                                                        <span></span>
                                                    </i>
                                                    <span> Our Services </span>
                                                </a>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!--navs-->
                    <div class="onovo-navs js-hero-slider-navs">
                        <div class="onovo-prev js-hero-slider-prev nav--white onovo-hover-2">
                            <i></i>
                        </div>
                        <div class="onovo-paginations-container pag--white">
                            <div class="onovo-paginations js-hero-pagination"></div>
                        </div>
                        <div class="onovo-next js-hero-slider-next nav--white onovo-hover-2">
                            <i></i>
                        </div>
                    </div>

                </div>

            </section>


            {{-- sambutan bang gun  --}}

            <section class="onovo-section onovo-section-bg gap-top-40  ">
                <!-- Heading -->
                <div class="onovo-heading align-center gap-bottom-40">
                    <h2 class="onovo-title-2">
                        <span>The Management</span>
                    </h2>
                </div>
        </div>
        <div class="container">

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3 offset-lg-1 mb-3 d-flex align-items-center ">
                    <!-- Image -->
                    <div class="p-2 border" style="border-radius: 45px">
                        <img src="assets/images/bg-gun.png" alt="" class="img-rounded "
                            style="border-top-right-radius: 40px;border-top-left-radius: 40px;;border-radius: 40px" />
                        <h5 class=" text-center mt-3" style="font-size: 24px;margin-bottom: 5px;">
                            <a class="onovo-lnk">
                                <span data-splitting data-onovo-scroll> Gun Mayudi </span>
                            </a>
                        </h5>
                        <h5 class="title text-center " style="font-size: 16px;">
                            <a class="onovo-lnk">
                                <span style="color: #696969" data-splitting data-onovo-scroll> Direktur BPKM </span>
                            </a>
                        </h5>
                    </div>

                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7">
                    <!-- Heading -->
                    <div class="onovo-heading gap-bottom-60 text-lg-left ">
                        <div class="onovo-text">
                            <p>
                                <strong>
                                    Bismillahirrahmanirrahim Assalamualaikum Wr Wb. Selamat datang di website
                                    Badan Pengelola Kemakmuran Masjid (BPKM)
                                    Masjid Kapal Munzalan seluruh Indonesia
                                </strong>

                            </p>
                            <p>Sejatinya Masjid bukan beton dan besi, tapi fungsi dan kontribusi
                                Kalimat ini disampakan oleh Ayahman dalam setiap pertemuan kemasjidan. BPKM
                                adalah lembaga khusus yang didirikan untuk mengawal salah satu pilar
                                Masajidallah yaitu Baitullah.
                            </p>
                            <p>Spirit Baitullah adalah spirit Ketaatan.
                                "Sesungguhnya rumah (ibadah) pertama yang dibangun untuk manusia, ialaha
                                (Baitullah) yang di Bakkah (Mekah) yang diberkahi dan menjadi petunjuk bagi
                                seluruh alam" (QS 3:96)

                            </p>
                            <p>Alhamdulillah atas izin Allah saat ini BPKM mengawal 24 bangunan Baitullah
                                Masjid Pusat dan Cabang yang ada diseluruh Indonesia. Menjadikan Masjid Kapal
                                Munzalan seluruh Indonesia menjadi Masjid yang ROMMANTIS (Ramah Orang Muda,
                                Musafir, Anak, Tetangga, Hamba Istimewa) dan BESTARI (Bersih, Sejuk, Tertib,
                                Aman, Rapi dan Wangi)

                            </p>
                            <p>Semoga Allah meridhoi setiap langkah kita
                                Bersaudara Sampai Surga
                                Sampai Jumpa di Baitullah 🕋</p>
                        </div>
                    </div>
                </div>

            </div>
            <!-- Services Showcase -->
        </div>
        </section>

        {{-- end sambutan bang gun  --}}



        <!-- Onovo Video -->
        <section class="onovo-section mb-5">
            <div class="container">

                <!--video-->
                <div class="onovo-video" data-onovo-overlay data-onovo-scroll>
                    <div class="image" style="background-image: url(assets/images/ytthumbnail.jpg);"></div>
                    <iframe class="js-video-iframe"
                        data-src="https://www.youtube.com/embed/jzpg2W1ELhQ?si=hfLXZExNFhp9dpnK?showinfo=0&rel=0&autoplay=1"></iframe>
                    <div class="play onovo-circle-text">
                        <div class="arrow"></div>
                        <div class="label onovo-text-black onovo-circle-text-label"> Play Video - Play Video - Play
                            Video - </div>
                    </div>
                </div>

            </div>
        </section>



        <!-- Onovo CTA -->
        {{-- <section class="onovo-section gap-top-140 gap-bottom-140 mt-5 img-rounded overflow-hidden"
        style="background-image: url(assets/images/cta-bg-1.jpg); background-position: center center; background-repeat: no-repeat; background-size: cover;">
        <div class="container rounded">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">

                    <!-- Heading -->
                    <div class="onovo-heading gap-bottom-40 onovo-text-white">
                        <div class="onovo-subtitle-1">
                            <span> Hubungi Kami </span>
                        </div>
                        <h2 class="onovo-title-2">
                            <span> Send Us Your <br>
                                <strong>Bright Ideas</strong>
                            </span>
                        </h2>
                    </div>

                    <!-- Text -->
                    <div class="onovo-cta-text">
                        <a href="mailto:infoname@domain.com" target="_blank">infoname@domain.com</a>
                        <p>Jln Serdam <br />NY 10003, Pontianak </p>
                    </div>

                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">

                    <!-- Social -->
                    <div class="onovo-cta-social">
                        <div class="image">
                            <div class="cta-img-circle img-circle--1"></div>
                            <div class="cta-img-circle img-circle--2"></div>
                            <div class="cta-img-circle img-circle--3"></div>
                        </div>
                        <div class="desc">
                            <ul>
                                <li>
                                    <a class="onovo-btn btn--white btn--large btn--icon onovo-hover-btn"
                                        href="http://facebook.com" target="_blank">
                                        <i aria-hidden="true" class="fab fa-facebook-f"></i>
                                        <span> Facebook </span>
                                    </a>
                                </li>
                                <li>
                                    <a class="onovo-btn btn--white btn--large btn--icon onovo-hover-btn"
                                        href="https://www.instagram.com/munzalan.official" target="_blank">
                                        <i aria-hidden="true" class="fab fa-instagram"></i>
                                        <span> Instagram </span>
                                    </a>
                                </li>
                                <li>
                                    <a class="onovo-btn btn--white btn--large btn--icon onovo-hover-btn"
                                        href="http://twitter.com" target="_blank">
                                        <i aria-hidden="true" class="fab fa-twitter"></i>
                                        <span> Twitter </span>
                                    </a>
                                </li>
                                <li>
                                    <a class="onovo-btn btn--white btn--large btn--icon onovo-hover-btn"
                                        href="http://linkedin.com" target="_blank">
                                        <i aria-hidden="true" class="fab fa-linkedin-in"></i>
                                        <span> LinkedIn </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    </div>
    <!-- Footer -->
    <footer class="onovo-footer footer--dark">
        <div class="footer--default">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-5">
                        <!-- Description -->
                        <div class="onovo-text onovo-text-white">
                            <h5>Informasi</h5>
                            <p style="opacity: 0.6;"><strong>Badan Pengelola Kemakmuran Masjid
                                    (BPKM)</strong> adalah lembaga khusus
                                mewakili pengasuh dalammengelola
                                bangunan Masjid Pusat dan Masjid
                                Cabang, ibadahmahdhoh, layanan
                                muamalah berbasis Masjid dan
                                mendampingi proses desain Masjid,
                                fundraising,mengawal proses
                                pembangunan serta pemanfaatan
                                fasilitas Masjid-Masjid Cabang</p>
                        </div>

                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-5 offset-lg-2">

                        <!-- Description -->
                        <div class="onovo-text onovo-text-white">
                            <h5 class="">Hubungi Kami</h5>
                            <p style="opacity: 0.6;">
                                Jl. Sungai Raya Dalam, Gg. Imaduddin No. 4, Kec. Sungai Raya, Kab. Kubu Raya, Kalimantan
                                Barat 78117​</p>
                            <p style="opacity: 0.6;">
                                <a href="https://api.whatsapp.com/send/?phone=628115772329&text&type=phone_number&app_absent=0"
                                    class="onovo-lnk lnk--white" target="_blank">Call Center
                                    +62 811-5772-329</a><br>
                                <a href="mailto:bpkm.munzalan@gmail.com" class="onovo-lnk lnk--white"
                                    target="_blank">bpkm.munzalan@gmail.com
                                </a>
                            </p>
                        </div>

                    </div>
                </div>
                <div class="separator"></div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 align-self-center">
                        <!-- Copyright -->
                        <div class="copyright onovo-text-white">
                            © 2024 Badan Pengelola Kemakmuran Masjid. All rights reserved.
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 align-md-right align-center">

                        <!-- Social-->
                        <div class="onovo-social-1 onovo-social-active">
                            <ul>
                                <li>
                                    <a class="onovo-social-link onovo-hover-2"
                                        href="https://www.instagram.com/munzalan.official" title="Twitter"
                                        target="_blank">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                </li>
                                <li>
                                    <a class="onovo-social-link onovo-hover-2"
                                        href="https://www.youtube.com/@Munzalan.official/" title="LinkedIn"
                                        target="_blank">
                                        <i class="fab fa-youtube"></i>
                                    </a>
                                </li>
                                <li>
                                    <a class="onovo-social-link onovo-hover-2" href="" title="LinkedIn"
                                        target="_blank">
                                        <i class="fab fa-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a class="onovo-social-link onovo-hover-2" href="" title="Dribbble"
                                        target="_blank">
                                        <i class="fab fa-tiktok"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </footer>

    </div>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/swiper.js"></script>
    <script src="assets/js/splitting.js"></script>
    <script src="assets/js/scroll-out.js"></script>
    <script src="assets/js/jquery.pagepiling.js"></script>
    <script src="assets/js/jquery.easy_number_animate.js"></script>
    <script src="assets/js/magnific-popup.js"></script>
    <script src="assets/js/imagesloaded.pkgd.js"></script>
    <script src="assets/js/isotope.pkgd.js"></script>
    <script src="assets/js/common.js"></script>

</body>

</html>
