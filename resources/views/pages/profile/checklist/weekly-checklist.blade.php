@extends('layouts.app')

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
        }

        input[type=checkbox] {
            accent-color: green;
        }
    </style>
@endpush

@section('content')
    <div class="container-fluid page-body-wrapper">
        <x-notify::notify style="z-index: 99999;" />

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

        @include('includes.sidebar')

        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-md-12 grid-margin">
                        <div class="row">
                            <div class="col-12 col-xl-8 mb-4 mb-xl-0">
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
                                <div class="row mb-4 align-items-center">
                                    <div class="col-md-6 col-sm-12 d-flex align-items-center">
                                        <h4 class="card-title text-center mb-0">Checklist Program Mingguan</h4>
                                    </div>
                                    <div class="col-md-6 col-sm-12 d-flex justify-content-end align-items-center">
                                        <button class="btn btn-danger mx-2 poppins" data-toggle="modal"
                                            data-target="#pdfExportWeeklyModal">
                                            Export <i class="fas fa-file-pdf"></i>
                                        </button>
                                        <button class="btn btn-primary mx-2 poppins" data-toggle="modal"
                                            data-target="#tambahWeeklyModal">
                                            Tambah
                                        </button>
                                    </div>
                                </div>
                                <hr>
                                <div class="table-responsive">
                                    <table class="table" id="weeklyReport">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Tanggal</th>
                                                <th>Praza</th>
                                                <th>Sholat Jumah</th>
                                                <th>Buka Puasa Senin Kamis</th>
                                                <th>Happy Family</th>
                                                <th>Happy Neighbour</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($weeklyChecklists as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->date }}</td>
                                                    <td>
                                                        @if ($item->praza)
                                                            <button class="btn btn-success">√</button>
                                                        @else
                                                            <button class="btn btn-danger">X</button>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($item->jumah_prayer)
                                                            <button class="btn btn-success">√</button>
                                                        @else
                                                            <button class="btn btn-danger">X</button>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($item->bp_sk)
                                                            <button class="btn btn-success">√</button>
                                                        @else
                                                            <button class="btn btn-danger">X</button>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($item->happy_family)
                                                            <button class="btn btn-success">√</button>
                                                        @else
                                                            <button class="btn btn-danger">X</button>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($item->happy_neighbour)
                                                            <button class="btn btn-success">√</button>
                                                        @else
                                                            <button class="btn btn-danger">X</button>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-warning btn-edit-weekly"
                                                            data-id="{{ $item->id }}" data-praza="{{ $item->praza }}"
                                                            data-jumah_prayer="{{ $item->jumah_prayer }}"
                                                            data-bp_sk="{{ $item->bp_sk }}"
                                                            data-happy_family="{{ $item->happy_family }}"
                                                            data-happy_neighbour="{{ $item->happy_neighbour }}"
                                                            data-date="{{ $item->date }}" data-toggle="modal"
                                                            data-target="#editWeeklyModal">
                                                            Edit
                                                        </button>
                                                        <button class="btn btn-danger btn-delete-weekly"
                                                            data-id="{{ $item->id }}">Hapus</button>
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
            <div class="modal fade" id="tambahWeeklyModal" tabindex="-1" role="dialog"
                aria-labelledby="tambahWeeklyModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="tambahWeeklyModalLabel">Tambah Checklist Program Mingguan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form enctype="multipart/form-data" action="{{ route('weekly-checklists.store') }}"
                                method="POST">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ Auth::id() }}">

                                <!-- Label for checklist -->
                                <label for="checklist" class="poppins">Checklist Program yang sudah dilaksanakan Pekan
                                    ini:</label>

                                <!-- Checkboxes for each field -->
                                <div class="form-check custom-form-check">
                                    <input class="form-check-input" type="checkbox" id="praza" name="praza">
                                    <label class="form-check-label ml-2 poppins" for="praza">Praza</label>
                                </div>

                                <div class="form-check custom-form-check">
                                    <input class="form-check-input" type="checkbox" id="jumah_prayer"
                                        name="jumah_prayer">
                                    <label class="form-check-label ml-2 poppins" for="jumah_prayer">Sholat Jumah</label>
                                </div>

                                <div class="form-check custom-form-check">
                                    <input class="form-check-input" type="checkbox" id="bp_sk" name="bp_sk">
                                    <label class="form-check-label ml-2 poppins" for="bp_sk">Buka Puasa Senin
                                        Kamis</label>
                                </div>

                                <div class="form-check custom-form-check">
                                    <input class="form-check-input" type="checkbox" id="happy_family"
                                        name="happy_family">
                                    <label class="form-check-label ml-2 poppins" for="happy_family">Happy Family</label>
                                </div>

                                <div class="form-check custom-form-check">
                                    <input class="form-check-input" type="checkbox" id="happy_neighbour"
                                        name="happy_neighbour">
                                    <label class="form-check-label ml-2 poppins" for="happy_neighbour">Happy
                                        Neighbour</label>
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

            <!-- Modal "Edit" -->
            <div class="modal fade" id="editWeeklyModal" tabindex="-1" role="dialog"
                aria-labelledby="editWeeklyModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editWeeklyModalLabel">Edit Checklist Program Mingguan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="POST" enctype="multipart/form-data" id="editWeeklyForm">
                                @csrf
                                @method('PUT')
                                <input type="hidden" id="editid" name="user_id">

                                <!-- Label for checklist -->
                                <label for="checklist" class="poppins">Checklist Program yang sudah dilaksanakan Pekan
                                    ini:</label>

                                <!-- Checkboxes for each field -->
                                <div class="form-check custom-form-check">
                                    <input class="form-check-input" type="checkbox" id="edit_praza" name="praza">
                                    <label class="form-check-label ml-2 poppins" for="edit_praza">Praza</label>
                                </div>

                                <div class="form-check custom-form-check">
                                    <input class="form-check-input" type="checkbox" id="edit_jumah_prayer"
                                        name="jumah_prayer">
                                    <label class="form-check-label ml-2 poppins" for="edit_jumah_prayer">Sholat
                                        Jumah</label>
                                </div>

                                <div class="form-check custom-form-check">
                                    <input class="form-check-input" type="checkbox" id="edit_bp_sk" name="bp_sk">
                                    <label class="form-check-label ml-2 poppins" for="edit_bp_sk">Buka Puasa Senin
                                        Kamis</label>
                                </div>

                                <div class="form-check custom-form-check">
                                    <input class="form-check-input" type="checkbox" id="edit_happy_family"
                                        name="happy_family">
                                    <label class="form-check-label ml-2 poppins" for="edit_happy_family">Happy
                                        Family</label>
                                </div>

                                <div class="form-check custom-form-check">
                                    <input class="form-check-input" type="checkbox" id="edit_happy_neighbour"
                                        name="happy_neighbour">
                                    <label class="form-check-label ml-2 poppins" for="edit_happy_neighbour">Happy
                                        Neighbour</label>
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

            @include('includes.footer')
        </div>
    </div>
@endsection

@push('addon-script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        $(document).ready(function() {
            var weeklyTable = $('#weeklyReport').DataTable();

            // Menangani klik tombol delete
            $('.btn-delete-weekly').click(function() {
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
                        $.ajax({
                            url: '{{ url('weekly-checklists') }}/' + id,
                            type: 'DELETE',
                            data: {
                                "_token": "{{ csrf_token() }}"
                            },
                            success: function(response) {
                                Swal.fire('Deleted!', 'Your data has been deleted.',
                                    'success');
                                weeklyTable.ajax
                                    .reload(); // Memuat ulang tabel setelah menghapus data
                            },
                            error: function(xhr) {
                                Swal.fire('Error!', 'An error occurred while deleting.',
                                    'error');
                            }
                        });
                        window.location.reload();
                    }

                });

            });
        });
    </script>
    <script>
        $('#editWeeklyModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var id = button.data('id');
            var praza = button.data('praza');
            var jumahPrayer = button.data('jumah_prayer');
            var bpSk = button.data('bp_sk');
            var happyFamily = button.data('happy_family');
            var happyNeighbour = button.data('happy_neighbour');
            var date = button.data('date');

            var modal = $(this);
            var form = modal.find('#editWeeklyForm');

            // Set action URL dengan menyertakan parameter id
            form.attr('action', '{{ url('weekly-checklists') }}/' + id);

            modal.find('#editWeeklyId').val(id);
            modal.find('#edit_praza').prop('checked', praza);
            modal.find('#edit_jumah_prayer').prop('checked', jumahPrayer);
            modal.find('#edit_bp_sk').prop('checked', bpSk);
            modal.find('#edit_happy_family').prop('checked', happyFamily);
            modal.find('#edit_happy_neighbour').prop('checked', happyNeighbour);
            modal.find('#edit_date').val(date);

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
