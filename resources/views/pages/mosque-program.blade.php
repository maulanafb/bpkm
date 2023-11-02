@extends('layouts.register')

@section('title')
    Admin BPKM
@endsection

@section('content')
    @push('addon-style')
        <style>
            .bcca-breadcrumb {
                margin-left: 20px;
                margin-top: 40px;
            }

            /*** breadcrumb container ***/
            .bcca-breadcrumb {
                display: flex;
                flex-direction: row-reverse;
                flex-shrink: 0;
                width: fit-content;
                margin-bottom: 15px;
                position: relative;
                border-radius: 4px;
            }

            /*** breadcrumb items ***/
            .bcca-breadcrumb-item {
                transition: all 0.2s ease-in-out;
                height: 40px;
                background: white;
                box-shadow: 0px 0px 18px -2px #d9d9d9;
                line-height: 40px;
                padding-left: 30px;
                padding-right: 10px;
                font-size: 13px;
                font-weight: 600;
                color: rgba(74, 74, 74, 0.8);
                position: relative;
                cursor: pointer;
                float: left;
            }

            .bcca-breadcrumb-item:after {
                transition: all ease-in-out 0.2s;
                content: "";
                position: absolute;
                left: calc(100% - 10px);
                top: 6px;
                z-index: 1;
                width: 0;
                height: 0;
                border: 14px solid #ffffff;
                border-left-color: transparent;
                border-bottom-color: transparent;
                box-shadow: 0px 0px 0 0px #d9d9d9, 5px -5px 10px -4px #d9d9d9;
                transform: rotate(45deg);
                margin-left: -4px;
            }

            .bcca-breadcrumb-item-active:after {
                transition: all ease-in-out 0.2s;
                content: "";
                position: absolute;
                left: calc(100% - 10px);
                top: 6px;
                z-index: 1;
                width: 0;
                height: 0;
                border: 14px solid #d1b2cd;
                border-left-color: transparent;
                border-bottom-color: transparent;
                box-shadow: 0px 0px 0 0px #d9d9d9, 5px -5px 10px -4px #d9d9d9;
                transform: rotate(45deg);
                margin-left: -4px;
            }

            .bcca-breadcrumb-item:last-child {
                border-top-left-radius: 4px;
                border-bottom-left-radius: 4px;
                padding-left: 10px;
            }

            .active {
                border-top-right-radius: 4px;
                border-bottom-right-radius: 4px;
                background-color: #d1b2cd;
            }

            .bcca-breadcrumb-item:first-child:after {
                content: "";
                display: none;
            }

            .bcca-breadcrumb-item i {
                margin-left: 5px;
                color: rgba(0, 0, 0, 0.2);
            }

            /*** hover breadcrumbs ***/
            .bcca-breadcrumb-item:hover {
                background-color: #ab509f;
            }

            .bcca-breadcrumb-item:hover:after {
                border: 14px solid #ab509f;
                border-left-color: transparent;
                border-bottom-color: transparent;
            }

            .active:hover {
                background-color: #ab509f;
            }
        </style>
    @endpush
    <div class="main-panel mt-5">
        <div class="content-wrapper">
            <div class="row">

                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="bcca-breadcrumb">

                            <div></div>
                            <a class="bcca-breadcrumb-item  bcca-breadcrumb-item-active active"
                                href="{{ route('mosque-program') }}">4</a>
                            <a class="bcca-breadcrumb-item" href="{{ route('mosque-land') }}">3</a>
                            <a class="bcca-breadcrumb-item" href="{{ route('mosque-land') }}">2</a>
                            <a class="bcca-breadcrumb-item" href="{{ route('mosque-profile.show') }}">1</a>

                            {{-- <div class="bcca-breadcrumb-item">Home</div> --}}
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">Harap Melengkapi Profil terlebih dahulu</h4>
                            <p class="card-description">
                                Harap Perhatikan data sebaik mungkin
                            </p>
                            <form class="forms-sample" method="POST" action="{{ route('mosque-program-store') }}">
                                @csrf
                                <div class="form-group">
                                    <input type="hidden" value="{{ $auth }}" name="user_id" id="user_id">
                                </div>


                                <div class="form-group">
                                    <label for="five_daily_prayer">Apakah Sudah Melaksanakan Sholat 5 Waktu?</label>
                                    <select data-show-subtext="true" data-live-search="true" name="five_daily_prayer"
                                        id="five_daily_prayer select_box" class="selectpicker form-control"
                                        v-model="five_daily_prayer" v-if="province">
                                        <option data-tokens="belum" value="0">Belum</option>
                                        <option data-tokens="sudah" value="1">Sudah</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="jumah_prayer">Apakah Sudah Melaksanakan Sholat Jum'at?</label>
                                    <select data-show-subtext="true" data-live-search="true" name="jumah_prayer"
                                        id="jumah_prayer select_box" class="selectpicker form-control"
                                        v-model="jumah_prayer" v-if="province">
                                        <option data-tokens="tidak" value="0">Belum</option>
                                        <option data-tokens="ya" value="1">Sudah</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="odoj">Apakah di Masjid sudah ada program rutin One Day One Juz
                                        (ODOJ)</label>
                                    <select data-show-subtext="true" data-live-search="true" name="odoj"
                                        id="odoj select_box" class="selectpicker form-control" v-model="odoj"
                                        v-if="province">
                                        <option data-tokens="tidak" value="0">Belum</option>
                                        <option data-tokens="ya" value="1">Sudah</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="smk">Apakah Sudah Melaksanakan SMK
                                        (Offline/Online)</label>
                                    <select data-show-subtext="true" data-live-search="true" name="smk"
                                        id="smk select_box" class="selectpicker form-control" v-model="smk"
                                        v-if="province">
                                        <option data-tokens="tidak" value="0">Belum</option>
                                        <option data-tokens="ya" value="1">Sudah</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="praza">Apakah di Masjid Melaksanakan Prasmanan Munzalan Setiap
                                        Jumat</label>
                                    <select data-show-subtext="true" data-live-search="true" name="praza"
                                        id="praza select_box" class="selectpicker form-control" v-model="praza"
                                        v-if="province">
                                        <option data-tokens="tidak" value="0">Belum</option>
                                        <option data-tokens="ya" value="1">Sudah</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="khatam-quran">Apakah di Masjid Tersedia Program Khataman Qur'an Setiap
                                        Bulan</label>
                                    <select data-show-subtext="true" data-live-search="true" name="khatam-quran"
                                        id="khatam-quran select_box" class="selectpicker form-control"
                                        v-model="khatam-quran" v-if="province">
                                        <option data-tokens="tidak" value="0">Belum</option>
                                        <option data-tokens="ya" value="1">Sudah</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="bp_sk">Apakah di Masjid Tersedia Program Buka Puasa Sunnah
                                        Senin-kamis</label>
                                    <select data-show-subtext="true" data-live-search="true" name="bp_sk"
                                        id="bp_sk select_box" class="selectpicker form-control" v-model="bp_sk"
                                        v-if="province">
                                        <option data-tokens="tidak" value="0">Belum</option>
                                        <option data-tokens="ya" value="1">Sudah</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="almulk_am">Apakah di Masjid Tersedia Program Al Mulk Selesai Sholat
                                        Maghrib</label>
                                    <select data-show-subtext="true" data-live-search="true" name="almulk_am"
                                        id="almulk_am select_box" class="selectpicker form-control" v-model="almulk_am"
                                        v-if="province">
                                        <option data-tokens="tidak" value="0">Belum</option>
                                        <option data-tokens="ya" value="1">Sudah</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="happy_neightbor">Apakah di Masjid Tersedia Program Tetangga Bahagia</label>
                                    <select data-show-subtext="true" data-live-search="true" name="happy_neightbor"
                                        id="happy_neightbor select_box" class="selectpicker form-control"
                                        v-model="happy_neightbor" v-if="province">
                                        <option data-tokens="tidak" value="0">Belum</option>
                                        <option data-tokens="ya" value="1">Sudah</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="happy_family">Apakah di Masjid Tersedia Program Keluarga Bahagia</label>
                                    <select data-show-subtext="true" data-live-search="true" name="happy_family"
                                        id="happy_family select_box" class="selectpicker form-control"
                                        v-model="happy_family" v-if="province">
                                        <option data-tokens="tidak" value="0">Belum</option>
                                        <option data-tokens="ya" value="1">Sudah</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary mr-2">Submit</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        @include('includes.footer')
        <!-- partial -->
    </div>
    <!-- main-panel ends -->
@endsection


@push('addon-script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
@endpush
