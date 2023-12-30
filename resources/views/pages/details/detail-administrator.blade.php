@extends('layouts.details')

@section('title')
    Admin BPKM
@endsection
@push('addon-style')
    <style>
        .notify {
            z-index: 99999;
        }
    </style>
@endpush
@section('content')
    <div class="container-fluid page-body-wrapper">
        <x-notify::notify style="z-index: 99999;" />
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

        <!-- partial -->
        <!-- partial:partials/_sidebar.html -->
        @include('includes.sidebar-detail')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-md-12 grid-margin">
                        <div class="row">
                            <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                                {{-- <span><img width="200px" height="200px" src="{{ Storage::url($user->photo_path ?? '') }}" alt="..." class="img-fluid rounded"></span> --}}
                                <h3 class="font-weight-bold">Assalamualaikum {{ $mosque->name }}</h3>
                                <h6 class="font-weight-normal mb-0">We Are Nothing Allah Is Everything</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <p class="card-title">Profile Manager/Koordinator</p>
                                <form class="forms-sample" method="POST"
                                    action="{{ route('dashboard-administrator-update', $auth) }}"
                                    enctype="multipart/form-data">
                                    @csrf <div class="form-group">
                                        <input required type="hidden" value="{{ $auth }}" name="user_id"
                                            id="user_id">
                                    </div>
                                    {{-- <label>Foto Manager/Koordinator/PJ Masjid</label> --}}
                                    <div class="row">
                                        <div class="col-md-5 col-12">
                                            <img class="img-thumbnail img-fluid rounded"
                                                src="{{ Storage::url($user->photo_path) }}" alt=""
                                                style=" max-height: 400px;">
                                        </div>
                                        <div class="col-md-7 p-2 col-12">
                                            <div class="form-group mt-3">
                                                <label for="manager_name">Nama Manager/Koordinator/PJ Masjid</label>
                                                <input disabled required type="text" name="manager_name"
                                                    class="form-control" id="manager_name"
                                                    placeholder="Nama Manager/Koordinator/PJ Masjid"
                                                    value="{{ $user->manager_name ?? '' }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="phone_number">No Hp Manager/Koordinator/PJ Masjid</label>
                                                <input disabled required type="text" name="phone_number"
                                                    class="form-control" id="phone_number"
                                                    placeholder="Nomor Hp Koordinator/Penanggung jawab Masjid"
                                                    value="{{ $user->phone_number ?? '' }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="manager_status">Apakah Santri Penerima Amanah (S.P.A) Masjid
                                                    Kapal
                                                    Munzalan?</label>
                                                <select disabled required data-show-subtext="true" data-live-search="true"
                                                    name="manager_status" id="manager_status select_box"
                                                    class="selectpicker form-control" v-model="manager_status"
                                                    v-if="manager_status">
                                                    <option data-tokens="{{ $user->manager_status }}"
                                                        value="{{ $user->manager_status ? 'Ya' : 'Bukan' }}">
                                                        {{ $user->manager_status ? 'Ya' : 'Bukan' }}</option>
                                                    <option data-tokens="ya" value="1">Ya</option>
                                                    <option data-tokens="tidak" value="0">Bukan</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="other_position">Jabatan/amanah lainnya? (selain koordinator/PJ
                                                    Masjid
                                                    Kapal
                                                    Munzalan Cabang)</label>
                                                <input disabled type="text" name="other_position" class="form-control"
                                                    id="other_position"
                                                    placeholder="Jabatan/amanah lainnya? (selain koordinator/PJ Masjid Kapal Munzalan Cabang)"
                                                    value="{{ $user->other_position ?? '' }}">
                                            </div>
                                        </div>
                                    </div>

                                    {{-- <button type="submit" class="btn btn-primary mr-2">Submit</button> --}}
                                </form>
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
