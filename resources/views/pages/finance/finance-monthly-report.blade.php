@extends('layouts.app')

@section('title')
    Admin BPKM
@endsection
@push('addon-style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" />

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
                                <h4 class="card-title">Keuangan Bulanan</h4>
                                <div class="row mb-4 align-items-center">
                                    <div class="col-md-6 col-sm-12">
                                        <div class="row align-items-center">
                                            <form action="{{ route('monthly-report.index') }}" method="GET"
                                                class="d-flex align-items-center">
                                                <div class="mx-auto row align-items-center ">
                                                    <div class="mr-2">
                                                        <input required type="date" name="start_date"
                                                            class="form-control">
                                                    </div>
                                                    <div class="mr-2">
                                                        <input required type="date" name="end_date" class="form-control">
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Filter</button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12 d-flex justify-content-end ">
                                        <div class="row align-items-center">
                                            {{-- <button class="btn btn-danger mx-2" data-toggle="modal"
                                                data-target="#pdfExportModal">
                                                Export <i class="fas fa-file-pdf"></i>
                                            </button> --}}
                                            <button class="btn btn-primary mx-2" data-toggle="modal"
                                                data-target="#tambahModal">
                                                Tambah
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                {{-- <p class="card-description">
                                    Add class <code>.table</code>
                                </p> --}}
                                <div class="table-responsive">
                                    <table class="table poppins" id="report">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Pemasukan</th>
                                                <th>Pengeluaran</th>
                                                <th>Tanggal</th>
                                                <th>Foto</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($monthlyReports as $report)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td> <!-- Nomor otomatis, dimulai dari 1 -->
                                                    <td>Rp {{ number_format($report->income, 0, ',', '.') }}</td>
                                                    <!-- Format mata uang untuk income -->
                                                    <td>Rp {{ number_format($report->outcome, 0, ',', '.') }}</td>
                                                    <!-- Format mata uang untuk outcome -->
                                                    <td>{{ $report->date }}</td>
                                                    <td>
                                                        <a class="btn btn-success"
                                                            href="{{ asset('storage/' . $report->photo_path) }}"
                                                            data-fancybox="gallery" data-caption="Deskripsi Gambar">
                                                            Lihat
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-warning btn-edit"
                                                            data-id="{{ $report->id }}"
                                                            data-income="{{ $report->income }}"
                                                            data-outcome="{{ $report->outcome }}"
                                                            data-date="{{ $report->date }}"
                                                            data-photo_path="{{ $report->photo_path }}" data-toggle="modal"
                                                            data-target="#editModal">
                                                            Edit
                                                        </button>
                                                        <button class="btn btn-danger btn-delete"
                                                            data-id="{{ $report->id }}">Hapus</button>
                                                        <!-- Tombol Hapus -->
                                                    </td>
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
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="tambahModalLabel">Tambah Pemasukan dan pengeluaran</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form enctype="multipart/form-data" action="{{ route('monthly-report.store') }}"
                                method="POST">
                                @csrf
                                <div class="form-group">
                                    <input type="hidden" name="user_id" value="1">
                                </div>
                                <div class="form-group">
                                    <label for="income">Pemasukan</label>
                                    <input required type="text" class="form-control" id="income" name="income"
                                        value="{{ old('income') }}" oninput="formatCurrency('income')">
                                </div>
                                <div class="form-group">
                                    <label for="outcome">Pengeluaran</label>
                                    <input required type="text" class="form-control" id="outcome" name="outcome"
                                        value="{{ old('outcome') }}" oninput="formatCurrency('outcome')">
                                </div>
                                <div class="form-group">
                                    <label for="date">Tanggal</label>
                                    <input required type="date" class="form-control" id="date" name="date"
                                        value="{{ old('date') }}">
                                </div>
                                <div class="form-group">
                                    <label for="photo_path">Upload Rekap (Foto)</label>
                                    <input required type="file" class="form-control-file" id="photo_path"
                                        name="photo_path">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
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
                            <h5 class="modal-title" id="editModalLabel">Edit Data Keuangan Bulanan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="POST" enctype="multipart/form-data" id="editForm">
                                @csrf
                                @method('PUT')
                                <input type="hidden" id="editid" name="user_id">
                                <div class="form-group">
                                    <label for="editIncome">Pemasukan</label>
                                    <input type="text" class="form-control" id="editIncome" name="income">
                                </div>
                                <div class="form-group">
                                    <label for="editOutcome">Pengeluaran</label>
                                    <input type="text" class="form-control" id="editOutcome" name="outcome">
                                </div>
                                <div class="form-group">
                                    <label for="editDate">Tanggal</label>
                                    <input type="date" class="form-control" id="editDate" name="date">
                                </div>
                                <div class="form-group">
                                    <label for="editPhoto">Ubah Rekap (Foto)</label>
                                    <input type="file" class="form-control-file" id="editPhoto" name="photo_path">
                                </div>
                                <div class="form-group">
                                    <img id="editPhotoPreview" src="" alt="Photo Preview"
                                        style="max-width: 100%;">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <!-- Contoh referensi Numeral.js dari internet -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.btn-delete').click(function() {
                var id = $(this).data('id');

                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Anda tidak akan dapat mengembalikan data ini!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Hapus'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "POST",
                            url: '{{ route('monthly-report.destroy', '') }}/' + id,
                            data: {
                                _token: '{{ csrf_token() }}',
                                _method: 'DELETE'
                            },
                            success: function(data) {
                                if (data.success) {
                                    Swal.fire('Terhapus!', 'Data berhasil dihapus.',
                                        'success');
                                    location.reload();
                                }
                            },
                            error: function(data) {
                                Swal.fire('Error!',
                                    'Terjadi kesalahan saat menghapus data.',
                                    'error');
                            }
                        });
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.btn-edit').click(function() {
                var id = $(this).data('id');
                var income = $(this).data('income');
                var outcome = $(this).data('outcome');
                var date = $(this).data('date');
                var photoPath = $(this).data('photo_path');
                photoPath = '{{ asset('storage') }}' + '/' + photoPath;

                // Mengisi data ke dalam formulir modal edit
                $('#editid').val(id);
                $('#editIncome').val(income);
                $('#editOutcome').val(outcome);
                $('#editDate').val(date);

                // Menyusun URL aksi formulir berdasarkan ID pengurus masjid
                var actionUrl = '/monthly-report-update/' +
                    id; // Sesuaikan dengan URL yang sesuai dengan route edit
                $('#editForm').attr('action', actionUrl);

                // Mengisi data sebelumnya ke dalam formulir
                $('#editIncome').val(income);
                $('#editOutcome').val(outcome);
                $('#editDate').val(date);

                // Menampilkan preview foto
                var photoPreview = $('#editPhotoPreview');
                photoPreview.attr('src', photoPath);
                photoPreview.show();
            });
        });
    </script>


    <script>
        $(document).ready(function() {
            // Inisiasi tabel dengan DataTables
            var table = $('#report').DataTable({
                "pageLength": 100, // Set the default number of rows per page to 100
                "lengthMenu": [
                    [10, 25, 50, 100, -1],
                    [10, 25, 50, 100, "All"]
                ] // Provide options for page length, including "All"
            });
        });
    </script>
    <script>
        function formatCurrency(inputId) {
            var input = document.getElementById(inputId);
            var value = input.value.replace(/\D/g, ''); // Hapus karakter selain angka
            input.value = formatNumber(value);
        }

        function formatNumber(value) {
            if (value === '') {
                return ''; // Jika tidak ada angka, biarkan input kosong
            } else {
                return 'Rp ' + parseFloat(value).toLocaleString('id-ID'); // Format angka sebagai mata uang
            }
        }
    </script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
@endpush
