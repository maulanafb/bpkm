@extends('layouts.app')

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
    <x-notify::notify style="z-index: 99999;" />

    <div class="container-fluid page-body-wrapper">
        @if (session('notification'))
            <script>
                var notification = @json(session('notification'));
                window.onload = function() {
                    $.notify({
                        title: notification.title,
                        message: notification.message,
                        icon: notification.icon
                    }, {
                        type: notification.type,
                        delay: 2000 // Atur sesuai kebutuhan Anda
                    });
                }
            </script>
        @endif
        <!-- partial:partials/_settings-panel.html -->
        <div class="theme-setting-wrapper">
            <div id="settings-trigger"><i class="ti-settings"></i></div>

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
            <div class="tab-content" id="setting-content">
                <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel"
                    aria-labelledby="todo-section">
                    <div class="add-items d-flex px-3 mb-0">
                        <form class="form w-100">
                            <div class="form-group d-flex">
                                <input type="text" class="form-control todo-list-input" placeholder="Add To-do">
                                <button type="submit" class="add btn btn-primary todo-list-add-btn"
                                    id="add-task">Add</button>
                            </div>
                        </form>
                    </div>
                    <div class="list-wrapper px-3">
                        <ul class="d-flex flex-column-reverse todo-list">
                            <li>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="checkbox" type="checkbox">
                                        Team review meeting at 3.00 PM
                                    </label>
                                </div>
                                <i class="remove ti-close"></i>
                            </li>
                            <li>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="checkbox" type="checkbox">
                                        Prepare for presentation
                                    </label>
                                </div>
                                <i class="remove ti-close"></i>
                            </li>
                            <li>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="checkbox" type="checkbox">
                                        Resolve all the low priority tickets due today
                                    </label>
                                </div>
                                <i class="remove ti-close"></i>
                            </li>
                            <li class="completed">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="checkbox" type="checkbox" checked>
                                        Schedule meeting for next week
                                    </label>
                                </div>
                                <i class="remove ti-close"></i>
                            </li>
                            <li class="completed">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="checkbox" type="checkbox" checked>
                                        Project review
                                    </label>
                                </div>
                                <i class="remove ti-close"></i>
                            </li>
                        </ul>
                    </div>
                    <h4 class="px-3 text-muted mt-5 font-weight-light mb-0">Events</h4>
                    <div class="events pt-4 px-3">
                        <div class="wrapper d-flex mb-2">
                            <i class="ti-control-record text-primary mr-2"></i>
                            <span>Feb 11 2018</span>
                        </div>
                        <p class="mb-0 font-weight-thin text-gray">Creating component page build a js</p>
                        <p class="text-gray mb-0">The total number of sessions</p>
                    </div>
                    <div class="events pt-4 px-3">
                        <div class="wrapper d-flex mb-2">
                            <i class="ti-control-record text-primary mr-2"></i>
                            <span>Feb 7 2018</span>
                        </div>
                        <p class="mb-0 font-weight-thin text-gray">Meeting with Alisa</p>
                        <p class="text-gray mb-0 ">Call Sarah Graves</p>
                    </div>
                </div>
                <!-- To do section tab ends -->
                <div class="tab-pane fade" id="chats-section" role="tabpanel" aria-labelledby="chats-section">
                    <div class="d-flex align-items-center justify-content-between border-bottom">
                        <p class="settings-heading border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0">Friends</p>
                        <small
                            class="settings-heading border-top-0 mb-3 pt-0 border-bottom-0 pb-0 pr-3 font-weight-normal">See
                            All</small>
                    </div>
                    <ul class="chat-list">
                        <li class="list active">
                            <div class="profile"><img src="images/faces/face1.jpg" alt="image"><span
                                    class="online"></span></div>
                            <div class="info">
                                <p>Thomas Douglas</p>
                                <p>Available</p>
                            </div>
                            <small class="text-muted my-auto">19 min</small>
                        </li>
                        <li class="list">
                            <div class="profile"><img src="images/faces/face2.jpg" alt="image"><span
                                    class="offline"></span></div>
                            <div class="info">
                                <div class="wrapper d-flex">
                                    <p>Catherine</p>
                                </div>
                                <p>Away</p>
                            </div>
                            <div class="badge badge-success badge-pill my-auto mx-2">4</div>
                            <small class="text-muted my-auto">23 min</small>
                        </li>
                        <li class="list">
                            <div class="profile"><img src="images/faces/face3.jpg" alt="image"><span
                                    class="online"></span></div>
                            <div class="info">
                                <p>Daniel Russell</p>
                                <p>Available</p>
                            </div>
                            <small class="text-muted my-auto">14 min</small>
                        </li>
                        <li class="list">
                            <div class="profile"><img src="images/faces/face4.jpg" alt="image"><span
                                    class="offline"></span></div>
                            <div class="info">
                                <p>James Richardson</p>
                                <p>Away</p>
                            </div>
                            <small class="text-muted my-auto">2 min</small>
                        </li>
                        <li class="list">
                            <div class="profile"><img src="images/faces/face5.jpg" alt="image"><span
                                    class="online"></span></div>
                            <div class="info">
                                <p>Madeline Kennedy</p>
                                <p>Available</p>
                            </div>
                            <small class="text-muted my-auto">5 min</small>
                        </li>
                        <li class="list">
                            <div class="profile"><img src="images/faces/face6.jpg" alt="image"><span
                                    class="online"></span></div>
                            <div class="info">
                                <p>Sarah Graves</p>
                                <p>Available</p>
                            </div>
                            <small class="text-muted my-auto">47 min</small>
                        </li>
                    </ul>
                </div>
                <!-- chat tab ends -->
            </div>
        </div>
        <!-- partial -->
        <!-- partial:partials/_sidebar.html -->
        @include('includes.sidebar')
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
                                <p class="card-title">Profile Settings</p>
                                <form class="forms-sample" enctype="multipart/form-data"
                                    action="{{ route('mosque-profile.update', $auth) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <input type="hidden" value="{{ $auth }}" name="user_id" id="user_id">
                                    </div>
                                    <label>Update Foto Masjid</label>
                                    @if ($user != null)
                                        <div class="form-group">
                                            <img width="100px" class="img-thumbnail"
                                                src="{{ Storage::url($user->photo_path) }}" alt="">
                                        </div>
                                        <div class="form-group">
                                            <input type="file" name="photo_path" class="form-control" />
                                        </div>
                                    @else
                                    @endif
                                    <label for="manager" class="mt-3">Nama Manager/Koordinator/PJ Masjid</label>
                                    <div class="form-group">
                                        <input id="manager" type="text"
                                            class="form-control @error('manager') is-invalid @enderror" name="manager"
                                            value="{{ $user->manager }}" autocomplete="manager" autofocus
                                            placeholder="Nama Manager/Koordinator/PJ Masjid">
                                    </div>
                                    <label for="name">Nomor Hp Masjid, Harap dengan format (08xxxxxxxx) contoh :
                                        0812345667</label>
                                    <div class="form-group">
                                        <input id="phone_number" type="number"
                                            class="form-control @error('phone_number') is-invalid @enderror"
                                            name="phone_number" value="{{ $user->phone_number }}"
                                            autocomplete="phone_number" placeholder="Nomor Hp">
                                    </div>


                                    <div class="form-group">
                                        <label for="province_id">Provinsi</label>
                                        <select data-show-subtext="true" data-live-search="true" name="province_id"
                                            id="province_id" class="selectpicker form-control">
                                            <option data-tokens="{{ $user->province->name }}"
                                                value="{{ $user->province_id }}">
                                                {{ $user->province->name }}
                                            </option>
                                            @foreach ($provinces as $province)
                                                <option data-tokens="{{ $province->name }}" value="{{ $province->id }}">
                                                    {{ $province->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="regencies_id">Kabupaten/Kota</label>
                                        <select data-live-search="true" name="regency_id" id="regencies_id"
                                            class="selectpicker form-control">
                                            <option data-tokens="{{ $user->regency->name }}"
                                                value="{{ $user->regency_id }}">
                                                {{ $user->regency->name }}
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

                                        <textarea cols="5" rows="5" id="address" type="text"
                                            class="form-control @error('address') is-invalid @enderror" name="address" value="{{ $user->address }}" required
                                            autocomplete="address" autofocus placeholder="Alamat Lengkap Masjid">{{ $user->address }}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="history">Sejarah Singkat Masjid</label>
                                        <textarea name="history" class="form-control" id="history" placeholder="Sejarah Masjid">{{ $user->history }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="deputy_regional_supervisor">Nama Wakil Pengasuh Wilayah</label>
                                        <input type="text" value="{{ $user->deputy_regional_supervisor }}"
                                            name="deputy_regional_supervisor" class="form-control"
                                            id="deputy_regional_supervisor" placeholder="Sejarah Masjid">
                                    </div>
                                    <div class="form-group">
                                        <label for="deputy_branch_supervisor">Nama wakil Pengasuh Cabang(Jika ada)</label>
                                        <input type="text"
                                            value="{{ $user->deputy_branch_supervisor ?? 'Belum Ada' }}"
                                            name="deputy_branch_supervisor" class="form-control"
                                            id="deputy_branch_supervisor" placeholder="Sejarah Masjid">
                                    </div>
                                    <div class="form-group">
                                        <label for="instagram">Instagram (Jika Ada)</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fab fa-instagram"></i></span>
                                            </div>
                                            <input type="text" name="instagram"
                                                value="{{ $user->instagram ?? 'Belum Ada' }}" class="form-control"
                                                id="instagram" placeholder="Nama Pengguna Instagram">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="youtube">YouTube (Jika Ada)</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fab fa-youtube"></i></span>
                                            </div>
                                            <input value="{{ $user->youtube ?? 'Belum Ada' }}" type="text"
                                                name="youtube" class="form-control" id="youtube"
                                                placeholder="Nama Kanal YouTube">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="facebook">Facebook (Jika Ada)</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fab fa-facebook"></i></span>
                                            </div>
                                            <input value="{{ $user->instagram ?? 'Belum Ada' }}" type="text"
                                                name="facebook" class="form-control" id="facebook"
                                                placeholder="Nama Halaman Facebook">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="tiktok">TikTok (Jika Ada)</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fab fa-tiktok"></i></span>
                                            </div>
                                            <input type="text" value="{{ $user->tiktok ?? 'Belum Ada' }}"
                                                name="tiktok" class="form-control" id="tiktok"
                                                placeholder="Nama Pengguna TikTok">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="tweeter">Twitter (Jika Ada)</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fab fa-twitter"></i></span>
                                            </div>
                                            <input value="{{ $user->tweeter ?? 'Belum Ada' }}" type="text"
                                                name="tweeter" class="form-control" id="tweeter"
                                                placeholder="Nama Pengguna Twitter">
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                    <button class="btn btn-light">Cancel</button>
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
@endpush
