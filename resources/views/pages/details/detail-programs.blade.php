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
                                <p class="card-title mb-3">Status Program {{ $user->user->name }}</p>
                                <form class="forms-sample" method="POST">
                                    @csrf
                                    @foreach ([
            'five_daily_prayer' => 'Sholat 5 Waktu',
            'jumah_prayer' => "Sholat Jum'at",
            'odoj' => 'One Day One Juz (ODOJ)',
            'smk' => 'Melaksanakan SMK (Offline/Online)',
            'praza' => 'Prasmanan Munzalan Setiap Jumat',
            'khatam_quran' => 'Khataman Qur\'an Setiap Bulan',
            'bp_sk' => 'Buka Puasa Sunnah Senin-Kamis',
            'almulk_am' => 'Al Mulk Selesai Sholat Maghrib',
            'happy_neightbor' => 'Tetangga Bahagia',
            'happy_family' => 'Keluarga Bahagia',
        ] as $field => $label)
                                        <div class="form-group">
                                            <label for="{{ $field }}">Apakah di Masjid sudah ada program
                                                {{ $label }}?</label>
                                            <select data-show-subtext="true" data-live-search="true"
                                                name="{{ $field }}" id="{{ $field }}"
                                                class="selectpicker form-control {{ $user->$field ? 'bg-success' : 'bg-danger' }}"
                                                v-model="{{ $field }}" disabled>
                                                <option value="0"{{ !$user->$field ? ' selected' : '' }}>Belum
                                                </option>
                                                <option value="1"{{ $user->$field ? ' selected' : '' }}>Sudah
                                                </option>
                                            </select>
                                        </div>
                                    @endforeach

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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        // Fungsi untuk menampilkan modal delete dengan mengatur action formulir DELETE secara dinamis
        function showDeleteModal(id) {
            var deleteForm = document.getElementById('deleteForm');
            var modal = document.getElementById('deleteModal');

            // Set action formulir DELETE sesuai dengan id pengurus masjid yang akan dihapus
            deleteForm.action = '/dashboard-mosque-programs/' + id;

            // Tampilkan modal delete
            $(modal).modal('show');
        }
    </script>
    <script>
        $(document).ready(function() {
            $('.btn-edit').click(function() {
                var id = $(this).data('id');
                var name = $(this).data('name');
                var role = $(this).data('role');

                // Mengisi data ke dalam formulir modal
                $('#editId').val(id);
                $('#editName').val(name);
                $('#editRole').val(role);

                // Menyusun URL aksi formulir berdasarkan ID pengurus masjid
                var actionUrl = '/dashboard-mosque-programs/' + id;
                $('#editForm').attr('action', actionUrl);
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
@endpush
