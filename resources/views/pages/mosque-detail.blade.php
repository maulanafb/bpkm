@extends('layouts.app')

@section('title')
    Admin BPKM
@endsection
@push('addon-style')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Helvetica+Neue:wght@300&display=swap');

        /* Set font Helvetica Neue untuk class disc-mini */

        @font-face {
            font-family: 'Friz Quadrata';
            src: url('/fonts/friz.woff2') format('woff2'),
                /* format font WOFF2 */
                url('/fonts/f.otf') format('otf');
            /* format font WOFF */
            font-weight: normal;
            font-style: normal;
        }

        .friz {
            font-family: 'Friz Quadrata', sans-serif;
            text-transform: uppercase;
            color: white
                /* Menggunakan font Friz Quadrata */
        }

        .ull {
            list-style-type: disc;
            padding-left: 40px
                /* Jenis titik yang ingin Anda gunakan (disc, circle, square, dll.) */
        }

        .ul-title {
            list-style-type: none;
        }



        .ullr {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            /* Maksimal 2 item per baris */
            /* grid-gap: 10px; */
            /* Jarak antar item */
            /* list-style: none; */
            /* Menghapus bullet points */
            padding: 0;
            list-style-type: disc;
            padding-left: 20px;

            /* Jenis titik yang ingin Anda gunakan (disc, circle, square, dll.) */
        }

        .ull .lii {
            font-size: 30px;
            /* padding-left: -10px */
            /* Sesuaikan dengan ukuran yang Anda inginkan */
        }

        .ullr .lii {
            font-size: 30px;
            /* padding-left: -10px */
            /* Sesuaikan dengan ukuran yang Anda inginkan */
        }

        .friz-list {
            font-family: 'Friz Quadrata', sans-serif;
            text-transform: uppercase;
            color: #ab509f
                /* Menggunakan font Friz Quadrata */
        }

        .text-spacing {
            letter-spacing: 2px;
            margin: auto
        }

        .title-detail {
            background-color: #ab509f;
            padding-top: 10px;
            padding-bottom: 10px;
            align-items: center
        }

        .disc-mini {
            font-size: 13px !important;

        }

        .title-rek {
            font-size: 15px;
            letter-spacing: 0.8px
        }

        .helvetica {
            font-family: 'Helvetica Neue', sans-serif;
        }

        .spacer-item {
            display: flex;
            justify-content: space-between;
        }

        .primary {
            color: #ab509f
        }

        .bank {
            font-family: 'Roboto Thin', sans-serif;
            /* Ganti 'Roboto Thin' dengan jenis font tipis yang Anda inginkan */
            font-size: 10px;
            font-weight: 100;
            letter-spacing: 1.2px;
            margin-left: 5px
                /* Pengaturan berat font menjadi 100 (biasanya berarti tipis) */
        }

        .acc-number {
            font-size: 22px;
        }

        .acc-name {
            font-family: 'Roboto Thin', sans-serif;
            /* Ganti 'Roboto Thin' dengan jenis font tipis yang Anda inginkan */
            font-size: 8px;
            font-weight: 100;
            letter-spacing: 1.2px;
            margin-left: 5px
        }
    </style>
@endpush

@section('content')
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_settings-panel.html -->
        <div class="theme-setting-wrapper">
            <div id="settings-trigger"><i class="ti-settings"></i></div>
            <div id="theme-settings" class="settings-panel">
                <i class="settings-close ti-close"></i>
                <p class="settings-heading">SIDEBAR SKINS</p>
                <div class="sidebar-bg-options selected" id="sidebar-light-theme">
                    <div class="img-ss rounded-circle bg-light border mr-3"></div>Light
                </div>
                <div class="sidebar-bg-options" id="sidebar-dark-theme">
                    <div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark
                </div>
                <p class="settings-heading mt-2">HEADER SKINS</p>
                <div class="color-tiles mx-0 px-4">
                    <div class="tiles success"></div>
                    <div class="tiles warning"></div>
                    <div class="tiles danger"></div>
                    <div class="tiles info"></div>
                    <div class="tiles dark"></div>
                    <div class="tiles default"></div>
                </div>
            </div>
        </div>
        <div id="right-sidebar" class="settings-panel">
            <i class="settings-close ti-close"></i>
            <ul class="nav nav-tabs border-top" id="setting-panel" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="todo-tab" data-toggle="tab" href="#todo-section" role="tab"
                        aria-controls="todo-section" aria-expanded="true">TO DO LIST</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="chats-tab" data-toggle="tab" href="#chats-section" role="tab"
                        aria-controls="chats-section">CHATS</a>
                </li>
            </ul>
        </div>
        <!-- partial -->
        <!-- partial:partials/_sidebar.html -->
        @include('includes.sidebar-detail')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12 mb-4">
                            <div class="card p-3 w-100 " style="min-height: 350px">
                                <div class="row pt-3 pl-3 pr-3">
                                    <div class="col-md-7 col-12 order-2 order-md-1">
                                        <div
                                            class="title-detail mx-auto d-flex justify-items-center align-items-center rounded">
                                            <h3 class="font-weight-bold friz mx-auto">{{ $mosque->name }}</h3>
                                        </div>
                                        <ul class="ull">
                                            <li class="primary">
                                                <h3 class="font-weight-bold text-spacing mt-3 pt-2 pl-3 friz-list">ALAMAT
                                                </h3>
                                                <ul class="ull">
                                                    <li class="disc-mini">
                                                        <div class="helvetica d-flex justify-between w-100">
                                                            <div class="mr-2"><strong>Provinsi</strong></div>
                                                            <div>: {{ $mosque->mosque_profile->province->name }}</div>
                                                        </div>
                                                    </li>
                                                    <li class="disc-mini">
                                                        <div class="helvetica d-flex justify-between w-100">
                                                            <div class="mr-2"><strong>Kabupaten/Kota</strong></div>
                                                            <div>: {{ $mosque->mosque_profile->regency->name }}</div>
                                                        </div>
                                                    </li>
                                                    <li class="disc-mini">
                                                        <div class="helvetica d-flex justify-between w-100">
                                                            <div class="mr-2"><strong>Alamat Lengkap</strong></div>
                                                            <div>: {{ $mosque->mosque_profile->address }}</div>
                                                        </div>
                                                    </li>

                                                </ul>
                                            </li>
                                        </ul>
                                        <ul class="ull">
                                            <li class="primary">
                                                <h3 class="font-weight-bold text-spacing mt-3 pt-2 pl-3 friz-list">Sejarah
                                                </h3>
                                                <ul class="ull">
                                                    <li class="disc-mini" style=" list-style-type: none;">
                                                        <div class="helvetica d-flex justify-between w-100">

                                                            <div> {{ $mosque->mosque_profile->history }}</div>
                                                        </div>
                                                    </li>

                                                </ul>
                                            </li>
                                        </ul>
                                        <ul class="ull">
                                            <li class="primary">
                                                <h3 class="font-weight-bold text-spacing mt-3 pt-2 pl-3 friz-list">Pengurus
                                                </h3>
                                                <ul class="ull">
                                                    @forelse ($caretaker as $ct)
                                                        <li class="disc-mini">
                                                            <div class="helvetica d-flex justify-between w-100">
                                                                <div class="mr-2"><strong>{{ $ct->role }}</strong>
                                                                </div>
                                                                <div>: {{ $ct->name }}</div>
                                                            </div>
                                                        </li>
                                                    @empty
                                                        <li class="disc-mini">data pengurus belum ditambahkan</li>
                                                    @endforelse

                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-5 col-12 order-1 order-md-2">
                                        <img src="{{ Storage::url($mosque->mosque_profile->photo_path) }}"
                                            class="card-img-top rounded" style="height: 250px; object-fit: cover;"
                                            alt="Foto Masjid">


                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>


                </div>
            </div>
            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->
            @include('includes.footer')
            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>
@endsection
