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
                        {{-- <div class="bcca-breadcrumb">
                            <a class="bcca-breadcrumb-item" href="{{ route('mosque-document.index') }}">5<i
                                    class="fa fa-pencil"></i></a>
                            <div></div>
                            <a class="bcca-breadcrumb-item bcca-breadcrumb-item-active active"
                                href="{{ route('mosque-administrator') }}">4</a>
                            <a class="bcca-breadcrumb-item" href="{{ route('mosque-condition') }}">3</a>
                            <a class="bcca-breadcrumb-item" href="{{ route('mosque-land') }}">2</a>
                            <a class="bcca-breadcrumb-item" href="{{ route('mosque-profile.show') }}">1</a>


                        </div> --}}
                        <div class="bcca-breadcrumb">

                            <div></div>
                            <a class="bcca-breadcrumb-item" href="{{ route('mosque-administrator') }}">4</a>
                            <a class="bcca-breadcrumb-item" href="{{ route('mosque-land') }}">3</a>
                            <a class="bcca-breadcrumb-item bcca-breadcrumb-item-active active"
                                href="{{ route('mosque-administrator') }}">2</a>
                            <a class="bcca-breadcrumb-item" href="{{ route('mosque-profile.show') }}">1</a>

                            {{-- <div class="bcca-breadcrumb-item">Home</div> --}}
                        </div>
                        <div class="card-body">

                            <h4 class="card-title">Harap Melengkapi Profil Manager/Kanit/PJ Masjid</h4>

                            <form class="forms-sample" enctype="multipart/form-data" method="POST"
                                action="{{ route('mosque-administrator-store') }}">
                                @csrf
                                <div class="form-group">
                                    <input required type="hidden" value="{{ $auth }}" name="user_id"
                                        id="user_id">
                                </div>
                                <label>Foto Manager/Kanit/PJ Masjid</label>
                                @if ($user != null)
                                    <img width="100px" class="img-thumbnail" src="{{ Storage::url($user->photo_path) }}"
                                        alt="">
                                @else
                                    <input type="file" name="photo_path" class="form-control" />
                                @endif
                                <div class="form-group mt-3">
                                    <label for="manager_name">Nama Manager/Kanit/PJ Masjid</label>
                                    <input required type="text" name="manager_name" class="form-control"
                                        id="manager_name" placeholder="Nama Manager/Kanit/PJ Masjid">
                                </div>
                                <div class="form-group">
                                    <label for="phone_number">No Hp Manager/Kanit/PJ Masjid</label>
                                    <input required type="text" name="phone_number" class="form-control"
                                        id="phone_number" placeholder="Nomor Hp Kanit/Penanggung jawab Masjid">
                                </div>
                                <div class="form-group">
                                    <label for="manager_status">Apakah Santri Penerima Amanah (S.P.A) Masjid Kapal
                                        Munzalan?</label>
                                    <select required data-show-subtext="true" data-live-search="true" name="manager_status"
                                        id="manager_status select_box" class="selectpicker form-control"
                                        v-model="manager_status" v-if="manager_status">
                                        <option data-tokens="ya" value="1">Ya</option>
                                        <option data-tokens="tidak" value="0">Bukan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="other_position">Jabatan/amanah lainnya? (selain Manager/Kanit/PJ Masjid
                                        Masjid Kapal
                                        Munzalan Cabang)</label>
                                    <input required type="text" name="other_position" class="form-control"
                                        id="other_position"
                                        placeholder="Jabatan/amanah lainnya? (selain Manager/Kanit/PJ Masjid Masjid Kapal Munzalan Cabang)">
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
