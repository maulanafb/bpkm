@extends('layouts.details')

@section('title')
    Admin BPKM
@endsection
@push('addon-style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css">

    <style>
        .notify {
            z-index: 99999;
        }

        .custom-form-check {
            margin-left: 30px;
            /* Sesuaikan dengan nilai margin left yang diinginkan */
        }

        input[type=checkbox] {
            accent-color: green;
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
                                <h3 class="font-weight-bold">Assalamualaikum {{ $user->name }}</h3>
                                <h6 class="font-weight-normal mb-0">We Are Nothing Allah Is Everything</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">

                                <div class="row mb-4 align-items-center ">
                                    <div class="col-md-12 col-sm-12 d-flex align-items-center ">
                                        <h4 class="card-title text-center mb-0">Checklist Program Harian {{ $mosque->name }}
                                        </h4>
                                    </div>
                                    {{-- <div class="col-md-6 col-sm-12 d-flex justify-content-end align-items-center">
                                        <button class="btn btn-danger mx-2 poppins" data-toggle="modal"
                                            data-target="#pdfExportModal">
                                            Export <i class="fas fa-file-pdf"></i>
                                        </button>
                                        <button class="btn btn-primary mx-2 poppins" data-toggle="modal"
                                            data-target="#tambahModal">
                                            Tambah
                                        </button>
                                    </div> --}}
                                </div>
                                <form action="{{ route('daily-checklists.show', ['daily_checklist' => $mosqueId]) }}"
                                    method="GET" class="d-flex ">

                                    <div class="row d-flex ">
                                        <div class="mr-2">
                                            <input required type="date" name="start_date" class="form-control">
                                        </div>
                                        <div class="mr-2">
                                            <input required type="date" name="end_date" class="form-control">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Filter</button>
                                    </div>
                                </form>
                                <hr>
                                {{-- <p class="card-description">
                                    Add class <code>.table</code>
                                </p> --}}
                                <div class="table-responsive">
                                    <table class="table" id="report">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>tanggal</th>
                                                <th>Sholat Tepat Waktu</th>
                                                <th>Al-Mulk Habis Maghrib</th>
                                                <th>Subuh Menggapai Keberkahan</th>
                                                <th>One Day One Juz</th>
                                                {{-- <th>Aksi</th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($dailyChecklists as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->date }}</td>
                                                    <td>
                                                        @if ($item->stw)
                                                            <button class="btn btn-success">√</button>
                                                        @else
                                                            <button class="btn btn-danger">X</button>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($item->al_mulk)
                                                            <button class="btn btn-success">√</button>
                                                        @else
                                                            <button class="btn btn-danger">X</button>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($item->smk)
                                                            <button class="btn btn-success">√</button>
                                                        @else
                                                            <button class="btn btn-danger">X</button>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($item->odoj)
                                                            <button class="btn btn-success">√</button>
                                                        @else
                                                            <button class="btn btn-danger">X</button>
                                                        @endif
                                                    </td>
                                                    {{-- <td>
                                                        <button class="btn btn-warning btn-edit"
                                                            data-id="{{ $item->id }}" data-stw="{{ $item->stw }}"
                                                            data-al_mulk="{{ $item->al_mulk }}"
                                                            data-smk="{{ $item->smk }}" data-odoj="{{ $item->odoj }}"
                                                            data-date="{{ $item->date }}" data-toggle="modal"
                                                            data-target="#editModal">
                                                            Edit
                                                        </button>
                                                        <button class="btn btn-danger btn-delete"
                                                            data-id="{{ $item->id }}">Hapus</button>
                                                    </td> --}}
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal "Tambah" -->
            <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="tambahModalLabel"
                aria-hidden="true">
                <div class="modal-dialog mx-auto" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="tambahModalLabel">Tambah Checklist Program Masjid</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form enctype="multipart/form-data" action="{{ route('daily-checklists.store') }}"
                                method="POST">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ Auth::id() }}">

                                <!-- Label for checklist -->
                                <label for="checklist" class="poppins">Checklist Program yang sudah dilaksanakan hari
                                    ini:</label>

                                <!-- Checkboxes for each field -->
                                <div class="form-check custom-form-check">
                                    <input class="form-check-input" type="checkbox" id="stw" name="stw">
                                    <label class="form-check-label ml-2 poppins" for="stw">Sholat Tepat Waktu</label>
                                </div>

                                <div class="form-check custom-form-check">
                                    <input class="form-check-input" type="checkbox" id="al_mulk" name="al_mulk">
                                    <label class="form-check-label ml-2 poppins" for="al_mulk">Al Mulk</label>
                                </div>

                                <div class="form-check custom-form-check">
                                    <input class="form-check-input" type="checkbox" id="smk" name="smk">
                                    <label class="form-check-label ml-2 poppins" for="smk">Shubuh Menggapai
                                        Keberkahan</label>
                                </div>

                                <div class="form-check custom-form-check">
                                    <input class="form-check-input" type="checkbox" id="odoj" name="odoj">
                                    <label class="form-check-label ml-2 poppins" for="odoj">One Day One Juz</label>
                                </div>
                                <!-- Date input -->
                                <div class="form-group mt-4">
                                    <label for="date" class="poppins">Tanggal</label>
                                    <input required type="date" class="form-control poppins" id="date"
                                        name="date">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary poppins"
                                        data-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary poppins">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            {{-- modal edit  --}}
            <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel">Edit Checklist Program Masjid</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="POST" enctype="multipart/form-data" id="editForm">

                                @csrf
                                @method('PUT')
                                <input type="hidden" id="editid" name="user_id">

                                <!-- Label for checklist -->
                                <label for="checklist" class="poppins">Checklist Program yang sudah dilaksanakan hari
                                    ini:</label>

                                <!-- Checkboxes for each field -->
                                <div class="form-check custom-form-check">
                                    <input class="form-check-input" type="checkbox" id="edit_stw" name="stw">
                                    <label class="form-check-label ml-2 poppins" for="edit_stw">Sholat Tepat Waktu</label>
                                </div>

                                <div class="form-check custom-form-check">
                                    <input class="form-check-input" type="checkbox" id="edit_al_mulk" name="al_mulk">
                                    <label class="form-check-label ml-2 poppins" for="edit_al_mulk">Al Mulk</label>
                                </div>

                                <div class="form-check custom-form-check">
                                    <input class="form-check-input" type="checkbox" id="edit_smk" name="smk">
                                    <label class="form-check-label ml-2 poppins" for="edit_smk">Shubuh Menggapai
                                        Keberkahan</label>
                                </div>

                                <div class="form-check custom-form-check">
                                    <input class="form-check-input" type="checkbox" id="edit_odoj" name="odoj">
                                    <label class="form-check-label ml-2 poppins" for="edit_odoj">One Day One Juz</label>
                                </div>

                                <!-- Date input -->
                                <div class="form-group mt-4">
                                    <label for="edit_date" class="poppins">Tanggal</label>
                                    <input required type="date" class="form-control poppins" id="edit_date"
                                        name="date">
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary poppins"
                                        data-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary poppins">Simpan Perubahan</button>
                                </div>
                            </form>
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
    <!-- SweetAlert CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
    <script>
        var table = $('#report').DataTable();

        $('.btn-delete').click(function() {
            var id = $(this).data('id');

            Swal.fire({
                title: 'Konfirmasi Hapus',
                text: 'Anda yakin ingin menghapus data ini?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Hapus',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Menggunakan parameter id dalam URL
                    $.ajax({
                        url: '{{ url('daily-checklists') }}/' + id, // Ganti dengan URL yang sesuai
                        type: 'DELETE',
                        data: {
                            "_token": "{{ csrf_token() }}"
                        },
                        success: function(response) {
                            Swal.fire('Deleted!', 'Your data has been deleted.', 'success');
                            // Optionally, you can update the UI or perform other actions
                        },
                        error: function(xhr) {
                            Swal.fire('Error!', 'An error occurred while deleting.', 'error');
                            // Optionally, you can log errors or perform other actions
                        }
                    });
                    window.location.reload();
                }
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            lightbox.option({
                'resizeDuration': 200,
                'wrapAround': true
            })
        });
    </script>
    <script>
        $('#editModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var id = button.data('id');
            var stw = button.data('stw');
            var alMulk = button.data('al_mulk');
            var smk = button.data('smk');
            var odoj = button.data('odoj');
            var date = button.data('date');

            var modal = $(this);
            var form = modal.find('#editForm');

            // Set action URL dengan menyertakan parameter id
            form.attr('action', '{{ url('daily-checklists') }}/' + id);

            modal.find('#editid').val(id);
            modal.find('#edit_stw').prop('checked', stw);
            modal.find('#edit_al_mulk').prop('checked', alMulk);
            modal.find('#edit_smk').prop('checked', smk);
            modal.find('#edit_odoj').prop('checked', odoj);
            modal.find('#edit_date').val(date);

            // ... kode lainnya
        });
    </script>
    <script>
        $(document).ready(function() {
            // Menggunakan jQuery untuk menangani perubahan status checkbox
            $('.custom-form-check input[type="checkbox"]').change(function() {
                if ($(this).is(':checked')) {
                    $(this).parent().addClass(
                        'bg-primary text-white rounded'
                    ); // Menambahkan warna latar belakang primary jika dicentang
                } else {
                    $(this).parent().removeClass(
                        'bg-primary text-white'
                    ); // Menghapus warna latar belakang primary jika tidak dicentang
                }
            });
        });
    </script>
@endpush
