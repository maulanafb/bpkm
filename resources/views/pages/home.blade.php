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
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
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
    </style>


</head>

<body>

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
                                <a href="index.html">
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
                                        <a class="onovo-lnk lnk--active" href="{{ route('register') }}">Register</a>
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
                                                        href="{{ route('login') }}">Login</a>
                                                </li>
                                                <li>
                                                    <a class="onovo-lnk lnk--active"
                                                        href="{{ route('register') }}">Register</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div
                            class=" col-4 col-xs-4 col-sm-4 col-md-3 col-lg-1 align-self-center align-center hide-on-mobile-extra">
                            <!-- Button -->
                            <a class="onovo-btn onovo-hover-btn btn--active" href="{{ route('login') }}">
                                <span>Login</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Wrapper -->
        <div class="wrapper" style="padding-bottom: 0px;">

            <!-- Onovo Hero -->
            <section class="onovo-section onovo-hero">
                <div class="image">
                    <video autoplay muted loop playsinline id="heroVideo">
                        <source src="assets/images/stvideo.mp4" type="video/mp4">
                    </video>
                    <div class="ovrl" style="opacity: 0.25;"></div>
                </div>
                <div class="container">
                    <h1 class="title onovo-text-white">
                        <span data-splitting data-onovo-scroll> We Nothing <br>Allah Is Everything
                        </span>
                    </h1>
                    {{-- <div class="text">
                        <div class="subtitle onovo-text-white">
                            <div data-splitting data-onovo-scroll> Creative studio at the <br> intersection of art,
                                design <br> and technology. </div>
                        </div>
                    </div> --}}

                </div>
            </section>







            <!-- Onovo Showcase -->


            <!-- Onovo Team -->
            <section class="onovo-section gap-top-140 gap-bottom-140">
                <div class="container">

                    <!-- Heading -->
                    <div class="onovo-heading align-center gap-bottom-40">

                        <h2 class="onovo-title-2">
                            <span> STRUKTUR (BOD) <br> BOARD OF DIRECTOR BPKM </span>
                        </h2>
                    </div>

                </div>
                {{-- end  --}}

                {{-- Start --}}
                <div class="row gap-row justify-content-around">
                    <!-- Team item 1 -->
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3-c">
                        <div class="onovo-team" data-onovo-overlay data-onovo-scroll>
                            <div class="onovo-team-item onovo-hover-3">
                                <div class="desc">
                                    <h5 class="title">
                                        <a href="team-detail.html" class="onovo-lnk">
                                            <span data-splitting data-onovo-scroll> Gun Mayudi </span>
                                        </a>
                                    </h5>
                                    <div class="onovo-subtitle-1">
                                        <span data-splitting data-onovo-scroll> Direktur BPKM </span>
                                    </div>
                                </div>
                                <div class="image">
                                    <a href="team-detail.html">
                                        <img decoding="async" src="assets/images/team-6-t-min.png" width="350"
                                            height="530" alt="Melanie Robinson" />
                                    </a>
                                </div>
                                <div class="num onovo-text-white">
                                    <span> M </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Team item 2 -->
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3-c">
                        <div class="onovo-team" data-onovo-overlay data-onovo-scroll>
                            <div class="onovo-team-item onovo-hover-3">
                                <div class="desc">
                                    <h5 class="title">
                                        <a href="team-detail.html" class="onovo-lnk">
                                            <span data-splitting data-onovo-scroll> Zulfiadi </span>
                                        </a>
                                    </h5>
                                    <div class="onovo-subtitle-1">
                                        <span data-splitting data-onovo-scroll> wAkil direktur bpkm </span>
                                    </div>
                                </div>
                                <div class="image">
                                    <a href="team-detail.html">
                                        <img decoding="async" src="assets/images/team-6-t-min.png" width="350"
                                            height="530" alt="Melanie Robinson" />
                                    </a>
                                </div>
                                <div class="num onovo-text-white">
                                    <span> M </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Team item 3 -->
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3-c">
                        <div class="onovo-team" data-onovo-overlay data-onovo-scroll>
                            <div class="onovo-team-item onovo-hover-3">
                                <div class="desc">
                                    <h5 class="title">
                                        <a href="team-detail.html" class="onovo-lnk">
                                            <span data-splitting data-onovo-scroll> Harry Dirgantara </span>
                                        </a>
                                    </h5>
                                    <div class="onovo-subtitle-1">
                                        <span data-splitting data-onovo-scroll> Wakil Direktur BPKM </span>
                                    </div>
                                </div>
                                <div class="image">
                                    <a href="team-detail.html">
                                        <img decoding="async" src="assets/images/team-6-t-min.png" width="350"
                                            height="530" alt="Melanie Robinson" />
                                    </a>
                                </div>
                                <div class="num onovo-text-white">
                                    <span> M </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row gap-row mt-5 mt-sm-2 justify-content-between">
                    <!-- Team item 4 -->

                    <div class="col-6 col-xs-6 col-sm-6 col-md-6 col-lg-2-c">
                        <div class="onovo-team" data-onovo-overlay data-onovo-scroll>
                            <div class="onovo-team-item onovo-hover-3">
                                <div class="desc">
                                    <h5 class="title">
                                        <a href="team-detail.html" class="onovo-lnk">
                                            <span data-splitting data-onovo-scroll> </span>
                                        </a>
                                    </h5>
                                    <div class="onovo-subtitle-1">
                                        <span data-splitting data-onovo-scroll> Kabag Umum Dan Administrasi </span>
                                    </div>
                                </div>
                                <div class="image">
                                    <a href="team-detail.html">
                                        <img decoding="async" src="assets/images/team-6-t-min.png" width="350"
                                            height="530" alt="Melanie Robinson" />
                                    </a>
                                </div>
                                <div class="num onovo-text-white">
                                    <span> M </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-6 col-xs-6 col-sm-6 col-md-6 col-lg-2-c">
                        <div class="onovo-team" data-onovo-overlay data-onovo-scroll>
                            <div class="onovo-team-item onovo-hover-3">
                                <div class="desc">
                                    <h5 class="title">
                                        <a href="team-detail.html" class="onovo-lnk">
                                            <span data-splitting data-onovo-scroll> M Awal </span>
                                        </a>
                                    </h5>
                                    <div class="onovo-subtitle-1">
                                        <span data-splitting data-onovo-scroll> Kabag Operasional </span>
                                    </div>
                                </div>
                                <div class="image">
                                    <a href="team-detail.html">
                                        <img decoding="async" src="assets/images/team-6-t-min.png" width="350"
                                            height="530" alt="Melanie Robinson" />
                                    </a>
                                </div>
                                <div class="num onovo-text-white">
                                    <span> M </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Team item 5 -->
                    <div class="col-6 col-xs-6 col-sm-6 col-md-6 col-lg-2-c">
                        <div class="onovo-team" data-onovo-overlay data-onovo-scroll>
                            <div class="onovo-team-item onovo-hover-3">
                                <div class="desc">
                                    <h5 class="title">
                                        <a href="team-detail.html" class="onovo-lnk">
                                            <span data-splitting data-onovo-scroll> Erlangga </span>
                                        </a>
                                    </h5>
                                    <div class="onovo-subtitle-1">
                                        <span data-splitting data-onovo-scroll> Kabag Multimedia </span>
                                    </div>
                                </div>
                                <div class="image">
                                    <a href="team-detail.html">
                                        <img decoding="async" src="assets/images/team-6-t-min.png" width="350"
                                            height="530" alt="Melanie Robinson" />
                                    </a>
                                </div>
                                <div class="num onovo-text-white">
                                    <span> M </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Team item 6 -->
                    <div class="col-6 col-xs-6 col-sm-6 col-md-6 col-lg-2-c">
                        <div class="onovo-team" data-onovo-overlay data-onovo-scroll>
                            <div class="onovo-team-item onovo-hover-3">
                                <div class="desc">
                                    <h5 class="title">
                                        <a href="team-detail.html" class="onovo-lnk">
                                            <span data-splitting data-onovo-scroll> Siswanto </span>
                                        </a>
                                    </h5>
                                    <div class="onovo-subtitle-1">
                                        <span data-splitting data-onovo-scroll> Kabag Program </span>
                                    </div>
                                </div>
                                <div class="image">
                                    <a href="team-detail.html">
                                        <img decoding="async" src="assets/images/team-6-t-min.png" width="350"
                                            height="530" alt="Melanie Robinson" />
                                    </a>
                                </div>
                                <div class="num onovo-text-white">
                                    <span> M </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Team item 7 -->
                    <div class="col-6 col-xs-6 col-sm-6 col-md-6 col-lg-2-c">
                        <div class="onovo-team" data-onovo-overlay data-onovo-scroll>
                            <div class="onovo-team-item onovo-hover-3">
                                <div class="desc">
                                    <h5 class="title">
                                        <a href="team-detail.html" class="onovo-lnk">
                                            <span data-splitting data-onovo-scroll> Hisbul Wathon </span>
                                        </a>
                                    </h5>
                                    <div class="onovo-subtitle-1">
                                        <span data-splitting data-onovo-scroll> Kabag Pembangunan </span>
                                    </div>
                                </div>
                                <div class="image">
                                    <a href="team-detail.html">
                                        <img decoding="async" src="assets/images/team-6-t-min.png" width="350"
                                            height="530" alt="Melanie Robinson" />
                                    </a>
                                </div>
                                <div class="num onovo-text-white">
                                    <span> M </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Team item 8 -->

                </div>
                {{-- END --}}
        </div>
        </section>
        <!-- Onovo Video -->
        <section class="onovo-section mb-5">
            <div class="container">

                <!--video-->
                <div class="onovo-video" data-onovo-overlay data-onovo-scroll>
                    <div class="image" style="background-image: url(assets/images/posts1.jpg);"></div>
                    <iframe class="js-video-iframe"
                        data-src="https://www.youtube.com/embed/Gu6z6kIukgg?showinfo=0&rel=0&autoplay=1"></iframe>
                    <div class="play onovo-circle-text">
                        <div class="arrow"></div>
                        <div class="label onovo-text-black onovo-circle-text-label"> Play Video - Play Video - Play
                            Video - </div>
                    </div>
                </div>

            </div>
        </section>



        <!-- Onovo CTA -->
        <section class="onovo-section gap-top-140 gap-bottom-140 mt-5"
            style="background-image: url(assets/images/cta-bg-1.jpg); background-position: center center; background-repeat: no-repeat; background-size: cover;">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">

                        <!-- Heading -->
                        <div class="onovo-heading gap-bottom-40 onovo-text-white">
                            <div class="onovo-subtitle-1">
                                <span> Get in Touch </span>
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
                            <p>36 East 8th Street, New York, <br />NY 10003, United States. </p>
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
                                            href="http://instagram.com" target="_blank">
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
        </section>
    </div>
    <!-- Footer -->
    <footer class="onovo-footer footer--dark">
        <div class="footer--default">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">
                        <!-- Description -->
                        <div class="onovo-text onovo-text-white">
                            <h5>Information</h5>
                            <p style="opacity: 0.6;">From the moment our company was founded, we have helped our
                                clients find exceptional solutions <strong>for their businesses</strong>. </p>
                        </div>

                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 offset-lg-1">

                        <!-- Description -->
                        <div class="onovo-text onovo-text-white">
                            <h5>Get in Touch</h5>
                            <p style="opacity: 0.6;">Baird House, 15-17 St Cross St <br />London EC1N 8UW </p>
                            <p style="opacity: 0.6;">
                                <a href="tel:+10204302973" class="onovo-lnk lnk--white" target="_blank">+ 1 (020)
                                    430 2973</a><br>
                                <a href="mailto:username@domain.com" class="onovo-lnk lnk--white"
                                    target="_blank">username@domain.com</a>
                            </p>
                        </div>

                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">

                        <!-- Gallery items -->
                        <div class="row">

                            <!--gallery item-->
                            <div class="col-4 col-xs-6 col-sm-6 col-md-4 col-lg-4">
                                <figure class="gallery-item">
                                    <a href='assets/images/post5.jpg'>
                                        <img src="assets/images/post5-1024x683.jpg" alt="" />
                                    </a>
                                </figure>
                            </div>

                            <!--gallery item-->
                            <div class="col-4 col-xs-6 col-sm-6 col-md-4 col-lg-4">
                                <figure class="gallery-item">
                                    <a href='assets/images/post4.jpg'>
                                        <img src="assets/images/post4-1024x683.jpg" alt="" />
                                    </a>
                                </figure>
                            </div>

                            <!--gallery item-->
                            <div class="col-4 col-xs-6 col-sm-6 col-md-4 col-lg-4">
                                <figure class="gallery-item">
                                    <a href='assets/images/post3.jpg'>
                                        <img src="assets/images/post3-1024x683.jpg" alt="" />
                                    </a>
                                </figure>
                            </div>

                            <!--gallery item-->
                            <div class="col-4 col-xs-6 col-sm-6 col-md-4 col-lg-4">
                                <figure class="gallery-item">
                                    <a href='assets/images/post4.jpg'>
                                        <img src="assets/images/post4-1024x683.jpg" alt="" />
                                    </a>
                                </figure>
                            </div>

                            <!--gallery item-->
                            <div class="col-4 col-xs-6 col-sm-6 col-md-4 col-lg-4">
                                <figure class="gallery-item">
                                    <a href='assets/images/post1.jpg'>
                                        <img src="assets/images/post1-1024x683.jpg" alt="" />
                                    </a>
                                </figure>
                            </div>

                            <!--gallery item-->
                            <div class="col-4 col-xs-6 col-sm-6 col-md-4 col-lg-4">
                                <figure class="gallery-item">
                                    <a href='assets/images/post6.jpg'>
                                        <img src="assets/images/post6-1024x683.jpg" alt="" />
                                    </a>
                                </figure>
                            </div>

                        </div>

                    </div>
                </div>

                <div class="separator"></div>

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 align-self-center">

                        <!-- Copyright -->
                        <div class="copyright onovo-text-white">
                            © 2023 ONOVO by <a href="https://bslthemes.com" target="blank"
                                class="onovo-lnk lnk--white">bslthemes Team</a>. All rights reserved.
                        </div>

                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 align-right">

                        <!-- Social-->
                        <div class="onovo-social-1 onovo-social-active">
                            <ul>
                                <li>
                                    <a class="onovo-social-link onovo-hover-2" href="http://twitter.com"
                                        title="Twitter" target="_blank">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a class="onovo-social-link onovo-hover-2" href="http://linkedin.com"
                                        title="LinkedIn" target="_blank">
                                        <i class="fab fa-linkedin-in"></i>
                                    </a>
                                </li>
                                <li>
                                    <a class="onovo-social-link onovo-hover-2" href="http://dribbble.com"
                                        title="Dribbble" target="_blank">
                                        <i class="fab fa-behance"></i>
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
