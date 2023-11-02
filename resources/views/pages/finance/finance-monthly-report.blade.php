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
                                <div class="row">
                                    <div class="col-6">
                                        <h4 class="card-title">Basic Table</h4>
                                    </div>
                                    <div class="col-6 d-flex justify-content-end">
                                        <div class="row">
                                            <button class="btn btn-danger mx-2" data-toggle="modal"
                                                data-target="#pdfExportModal">
                                                Export <i class="fas fa-file-pdf"></i>
                                            </button>
                                            <button class="btn btn-primary mx-2" data-toggle="modal"
                                                data-target="#tambahModal">
                                                Tambah
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <p class="card-description">
                                    Add class <code>.table</code>
                                </p>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Pemasukan</th>
                                                <th>Pengeluaran</th>
                                                <th>Tanggal</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Jacob</td>
                                                <td>53275531</td>
                                                <td>12 May 2017</td>
                                                <td>12 May 2017</td>
                                                <td><label class="badge badge-danger">Pending</label></td>
                                            </tr>
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
                            <form>
                                <div class="form-group">
                                    <input type="hidden" name="user_id" value="1">
                                </div>
                                <div class="form-group">
                                    <label for="income">Pemasukan</label>
                                    <input type="text" class="form-control" id="income">
                                </div>
                                <div class="form-group">
                                    <label for="outcome">Pengeluaran</label>
                                    <input type="text" class="form-control" id="outcome">
                                </div>
                                <div class="form-group">
                                    <label for="date">Tanggal</label>
                                    <input type="date" class="form-control" id="date">
                                </div>
                                <div class="form-group">
                                    <label for="photo_path">Upload Rekap (Foto)</label>
                                    <input type="file" class="form-control-file" id="photo_path" name="photo_path">
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="button" class="btn btn-primary">Simpan</button>
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
