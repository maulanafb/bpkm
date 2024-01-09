@extends('layouts.details')

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

        h1 {
            font-size: 30px;
            font-weight: 400
        }

        .social-icons a {
            text-decoration: none;
            color: white;
            /* Adjust the color as needed */
            font-size: 4vw;
            /* Set font size relative to viewport width (adjust as needed) */
            margin-right: 2vw;
            /* Adjust the spacing between icons relative to viewport width */
        }

        @media (min-width: 768px) {

            /* Adjust font size and spacing for larger screens (modify as needed) */
            .social-icons a {
                font-size: 32px;
                margin-right: 10px;
            }
        }

        .social-icons a:hover {
            color: grey;
        }

        form [disabled] {
            background-color: white;
            /* Light grey background color */
            color: black;

            /* Dark text color */

        }

        .bg-gray {
            background-color: grey;
            width: 100%;
            text-align: center;

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
                        {{-- item pertama  --}}
                        <div class="card p-3 w-100 " style="min-height: 350px">
                            <div class="bg-primary d-flex text-center rounded justify-center ">
                                <h1 class="text-white text-center poppins p-2">{{ $mosque->name }}</h1>
                            </div>
                            <div class="mt-3 ">
                                <img src="{{ Storage::url($mosque->mosque_profiles->photo_path ?? '') }}" alt=""
                                    class="w-full img-fluid rounded">
                            </div>
                            <div>

                            </div>

                            {{-- profile items  --}}
                            <div class="profile-items mt-5">
                                <div class="card-body">
                                    <p class="card-title">Profil Singkat</p>
                                    <form class="forms-sample poppins">
                                        <div class="row">
                                            <div class="col-12 col-md-6">
                                                <div class="form-group" disabled>
                                                    <label for="province_id">Provinsi</label>
                                                    <select data-show-subtext="true" data-live-search="true"
                                                        name="province_id" id="province_id"
                                                        class="selectpicker form-control" disabled>
                                                        <option
                                                            data-tokens="{{ $mosque->mosque_profiles->province->name ?? '' }}"
                                                            value="{{ $mosque->mosque_profiles->province_id ?? '' }}">
                                                            {{ $mosque->mosque_profiles->province->name ?? '' }}
                                                        </option>
                                                        @foreach ($provinces as $province)
                                                            <option data-tokens="{{ $province->name ?? '' }}"
                                                                value="{{ $province->id ?? '' }}">
                                                                {{ $province->name ?? '' }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="regencies_id">Kabupaten/Kota</label>
                                                    <select disabled data-live-search="true" name="regency_id"
                                                        id="regencies_id" class="selectpicker form-control">
                                                        <option
                                                            data-tokens="{{ $mosque->mosque_profiles->regency->name ?? '' }}"
                                                            value="{{ $mosque->mosque_profiles->regency_id ?? '' }}">
                                                            {{ $mosque->mosque_profiles->regency->name ?? '' }}
                                                        </option>
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

                                                    <textarea id="address" type="text" disabled class="form-control @error('address') is-invalid @enderror"
                                                        name="address" value="{{ $mosque->mosque_profiles->address ?? '' }}" required autocomplete="address" autofocus
                                                        placeholder="Alamat Lengkap Masjid">{{ $mosque->mosque_profiles->address ?? '' }}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <label for="history">Sejarah Singkat Masjid</label>
                                                    <textarea disabled name="history" class="form-control" id="history" placeholder="Sejarah Masjid">{{ $mosque->mosque_profiles->history ?? '' }}</textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="deputy_regional_supervisor">Nama Wakil Pengasuh
                                                        Wilayah</label>
                                                    <input disabled type="text"
                                                        value="{{ $mosque->mosque_profiles->deputy_regional_supervisor ?? '' }}"
                                                        name="deputy_regional_supervisor" class="form-control"
                                                        id="deputy_regional_supervisor" placeholder="Sejarah Masjid">
                                                </div>
                                                <div class="form-group">
                                                    <label for="deputy_branch_supervisor">Nama wakil Pengasuh
                                                        Cabang</label>
                                                    <input disabled type="text"
                                                        value="{{ $mosque->mosque_profiles->deputy_branch_supervisor ?? 'Belum Ada' }}"
                                                        name="deputy_branch_supervisor" class="form-control"
                                                        id="deputy_branch_supervisor" placeholder="Sejarah Masjid">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-center">
                                            <p class="card-title mt-5 mb-3 bg-gray py-2 text-white rounded">Link Sosial
                                                Media</p>
                                        </div>
                                        <div class="social-icons d-flex justify-content-around bg-primary rounded">

                                            {{-- Instagram --}}
                                            @if (isset($mosque->mosque_profiles->instagram))
                                                <a href="https://instagram.com/{{ $mosque->mosque_profiles->instagram }}"
                                                    target="_blank" class="social-icon"><i
                                                        class="fab fa-instagram"></i></a>
                                            @endif

                                            {{-- YouTube --}}
                                            @if (isset($mosque->mosque_profiles->youtube))
                                                <a href="https://youtube.com/{{ $mosque->mosque_profiles->youtube }}"
                                                    target="_blank" class="social-icon"><i
                                                        class="fab fa-youtube"></i></a>
                                            @endif

                                            {{-- Facebook --}}
                                            @if (isset($mosque->mosque_profiles->facebook))
                                                <a href="https://facebook.com/{{ $mosque->mosque_profiles->facebook }}"
                                                    target="_blank" class="social-icon"><i
                                                        class="fab fa-facebook"></i></a>
                                            @endif

                                            {{-- TikTok --}}
                                            @if (isset($mosque->mosque_profiles->tiktok))
                                                <?php $encodedUsername = '@' . $mosque->mosque_profiles->tiktok; ?>
                                                <a href='https://www.tiktok.com/{{ $encodedUsername }}' target="_blank"
                                                    class="social-icon">
                                                    <i class="fab fa-tiktok"></i>
                                                </a>
                                            @endif
                                            {{-- Twitter --}}
                                            @if (isset($mosque->mosque_profiles->twitter))
                                                <a href="https://twitter.com/{{ $mosque->mosque_profiles->twitter }}"
                                                    target="_blank" class="social-icon"><i
                                                        class="fab fa-twitter"></i></a>
                                            @endif
                                        </div>
                                        {{-- <div class="d-flex justify-center">
                                            <a href="{{ route('mosque.activate', $mosqueId) }}"
                                                class="card-title w-full mt-5 mb-3 bg-success py-2 text-white text-center rounded">Aktifkan</a>
                                        </div> --}}
                                    </form>
                                </div>
                            </div>
                            {{-- end profile items  --}}
                            @role('admin')
                                <div class="row mx-2">


                                    @if ($mosque->verif)
                                        <button class="btn btn-warning text-white col-12 poppins disable-btn"
                                            onclick="confirmDisable()">NonAktifkan</button>
                                    @else
                                        <button class="btn btn-success col-12 poppins accept-btn"
                                            onclick="confirmAccept()">Terima</button>
                                    @endif
                                </div>
                            @else
                                <br>
                            @endrole

                        </div>

                    </div>

                    {{-- end item pertama  --}}
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

@push('addon-script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function confirmDelete() {
            Swal.fire({
                title: 'Apakah Anda yakin ingin menghapus?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, Hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Kirim formulir dengan metode POST
                    sendForm("{{ route('mosque.destroy', ['id' => $mosque->id]) }}", 'DELETE');
                }
            });
        }

        function confirmDisable() {
            Swal.fire({
                title: 'Apakah Anda yakin ingin menonaktifkan?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, Nonaktifkan!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Kirim formulir dengan metode POST
                    sendForm("{{ route('mosque.accept', ['id' => $mosque->id]) }}", 'POST');
                }
            });
        }

        function confirmAccept() {
            Swal.fire({
                title: 'Apakah Anda yakin ingin menerima?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, Terima!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Kirim formulir dengan metode POST
                    sendForm("{{ route('mosque.accept', ['id' => $mosque->id]) }}", 'POST');
                }
            });
        }

        // Fungsi untuk membuat dan mengirim formulir dengan metode POST
        function sendForm(action, method) {
            var form = document.createElement('form');
            form.method = 'POST';
            form.action = action;

            var csrfField = document.createElement('input');
            csrfField.type = 'hidden';
            csrfField.name = '_token';
            csrfField.value = "{{ csrf_token() }}";

            var methodField = document.createElement('input');
            methodField.type = 'hidden';
            methodField.name = '_method';
            methodField.value = method;

            form.appendChild(csrfField);
            form.appendChild(methodField);

            document.body.appendChild(form);
            form.submit();
        }
    </script>
@endpush
