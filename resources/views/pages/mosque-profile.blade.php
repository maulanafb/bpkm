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
                            <a class="bcca-breadcrumb-item" href="{{ route('mosque-administrator') }}">4</a>
                            <a class="bcca-breadcrumb-item" href="{{ route('mosque-land') }}">3</a>
                            <a class="bcca-breadcrumb-item" href="{{ route('mosque-administrator') }}">2</a>
                            <a class="bcca-breadcrumb-item bcca-breadcrumb-item-active active"
                                href="{{ route('mosque-profile.show') }}">1</a>

                            {{-- <div class="bcca-breadcrumb-item">Home</div> --}}
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">Harap Melengkapi Data profil Masjid</h4>
                            <p class="card-description">
                                Harap Perhatikan data sebaik mungkin
                            </p>
                            <form class="forms-sample" method="POST" action="{{ route('mosque-profile.store') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <input type="hidden" value="{{ $auth }}" name="user_id" id="user_id">
                                </div>
                                <label>Upload Foto Masjid</label>
                                @if ($user != null)
                                    <img width="100px" class="img-thumbnail" src="{{ Storage::url($user->photo_path) }}"
                                        alt="">
                                @else
                                    <input type="file" name="photo_path" class="form-control" />
                                @endif
                                <label for="manager" class="mt-3">Nama Manager/Kanit/PJ Masjid</label>
                                <div class="form-group">
                                    <input id="manager" type="text"
                                        class="form-control @error('manager') is-invalid @enderror" name="manager"
                                        value="{{ old('manager') }}" required autocomplete="manager" autofocus
                                        placeholder="Nama Manager/Kanit/PJ Masjid">
                                </div>
                                <label for="name">Nomor Hp Masjid, Harap dengan format (08xxxxxxxx) contoh :
                                    0812345667</label>
                                <div class="form-group">
                                    <input id="phone_number" type="number" required
                                        class="form-control @error('phone_number') is-invalid @enderror" name="phone_number"
                                        value="{{ old('phone_number') }}" required autocomplete="phone_number"
                                        placeholder="Nomor Hp">
                                </div>


                                <div class="form-group">
                                    <label for="province_id">Provinsi</label>
                                    <select data-show-subtext="true" data-live-search="true" name="province_id" required
                                        id="province_id" class="selectpicker form-control">
                                        @foreach ($provinces as $province)
                                            <option data-tokens="{{ $province->name }}" value="{{ $province->id }}">
                                                {{ $province->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="regencies_id">Kabupaten/Kota</label>
                                    <select data-live-search="true" name="regency_id" id="regencies_id" required
                                        class="selectpicker form-control">
                                        <option value="" disabled selected>pilih kabupaten/Kota</option>
                                        @foreach ($regencies as $regency)
                                            @if ($regency->province_id == $provinces[0]->id)
                                                {{-- Menggunakan provinsi pertama sebagai default --}}
                                                @if ($regency->province_id == $provinces[0]->id)
                                                    <option value="{{ $regency->id }}">
                                                        {{ $regency->name }}
                                                    </option>
                                                @endif
                                            @endif
                                        @endforeach
                                    </select>
                                </div>


                                <label for="address">Alamat Lengkap Masjid</label>
                                <div class="form-group">

                                    <textarea cols="5" rows="5" id="address" type="text" required
                                        class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required
                                        autocomplete="address" autofocus placeholder="Alamat Lengkap Masjid"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="history">Sejarah Singkat Masjid</label>
                                    <textarea name="history" class="form-control" id="history" required placeholder="Sejarah Masjid"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="deputy_regional_supervisor">Nama Wakil Pengasuh Wilayah</label>
                                    <input type="text" name="deputy_regional_supervisor" class="form-control"
                                        id="deputy_regional_supervisor" placeholder="Sejarah Masjid" required>
                                </div>
                                <div class="form-group">
                                    <label for="deputy_branch_supervisor">Nama wakil Pengasuh Cabang</label>
                                    <input type="text" name="deputy_branch_supervisor" class="form-control"
                                        id="deputy_branch_supervisor" placeholder="Sejarah Masjid">
                                </div>
                                <div class="form-group">
                                    <label for="instagram">Instagram </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fab fa-instagram"></i></span>
                                        </div>
                                        <input type="text" name="instagram" class="form-control" id="instagram"
                                            placeholder="Nama Pengguna Instagram">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="youtube">YouTube </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fab fa-youtube"></i></span>
                                        </div>
                                        <input type="text" name="youtube" class="form-control" id="youtube"
                                            placeholder="Nama Kanal YouTube">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="facebook">Facebook </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fab fa-facebook"></i></span>
                                        </div>
                                        <input type="text" name="facebook" class="form-control" id="facebook"
                                            placeholder="Nama Halaman Facebook">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="tiktok">TikTok </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fab fa-tiktok"></i></span>
                                        </div>
                                        <input type="text" name="tiktok" class="form-control" id="tiktok"
                                            placeholder="Nama Pengguna TikTok">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="tweeter">Twitter </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fab fa-twitter"></i></span>
                                        </div>
                                        <input type="text" name="tweeter" class="form-control" id="tweeter"
                                            placeholder="Nama Pengguna Twitter">
                                    </div>
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
    <script>
        document.getElementById('province_id').addEventListener('change', function() {
            var selectedProvince = this.value;
            var regenciesDropdown = document.getElementById('regencies_id');

            regenciesDropdown.innerHTML = ''; // Hapus opsi sebelumnya

            @foreach ($regencies as $regency)
                if ({{ $regency->province_id }} == selectedProvince) {
                    var option = document.createElement('option');
                    option.value = {{ $regency->id }};
                    option.text = "{{ $regency->name }}";
                    regenciesDropdown.appendChild(option);
                }
            @endforeach

            $('.selectpicker').selectpicker('refresh');
        });
    </script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>

    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <script src="https://unpkg.com/vue-toasted"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
@endpush
