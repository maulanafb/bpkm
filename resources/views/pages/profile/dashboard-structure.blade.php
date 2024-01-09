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

                                <div class="row mb-4 align-items-center ">
                                    <div class="col-md-6 col-sm-12 d-flex align-items-center ">
                                        <h4 class="card-title text-center mb-0">Edit Struktur Masjid</h4>
                                    </div>
                                    <div class="col-md-6 col-sm-12 d-flex justify-content-end align-items-center">
                                        {{-- <button class="btn btn-danger mx-2 poppins" data-toggle="modal"
                                            data-target="#pdfExportModal">
                                            Export <i class="fas fa-file-pdf"></i>
                                        </button> --}}
                                        <button class="btn btn-primary mx-2 poppins" data-toggle="modal"
                                            data-target="#tambahModal">
                                            Tambah
                                        </button>
                                    </div>
                                </div>

                                <hr>
                                {{-- <p class="card-description">
                                    Add class <code>.table</code>
                                </p> --}}
                                <div class="table-responsive">
                                    <table class="table" id="report">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Foto</th>
                                                <th>Jabatan</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($structures as $item)
                                                <tr>
                                                    <td>{{ $item->id }}</td>
                                                    <td>{{ $item->name }}</td>
                                                    <td>
                                                        {{-- Menampilkan gambar dengan lightbox --}}
                                                        @if ($item->photo_path)
                                                            <a href="{{ asset('storage/' . $item->photo_path) }}"
                                                                data-lightbox="gallery{{ $item->id }}">
                                                                <img src="{{ asset('storage/' . $item->photo_path) }}"
                                                                    alt="{{ $item->name }}"
                                                                    style="max-width: 150px; max-height: 150px;">
                                                            </a>
                                                        @else
                                                            No Image
                                                        @endif
                                                    </td>
                                                    <td>{{ $item->position }}</td>
                                                    <td>
                                                        {{-- Tambahkan tombol untuk edit dan hapus --}}
                                                        <button class="btn btn-warning btn-edit"
                                                            data-id="{{ $item->id }}" data-name="{{ $item->name }}"
                                                            data-position="{{ $item->position }}"
                                                            data-other="{{ $item->position }}"
                                                            data-photo_path="{{ $item->photo_path }}" data-toggle="modal"
                                                            data-target="#editModal">
                                                            Edit
                                                        </button>
                                                        <button class="btn btn-danger btn-delete"
                                                            data-id="{{ $item->id }}">Hapus</button>
                                                        {{-- Form untuk menghapus --}}
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
                            <h5 class="modal-title" id="tambahModalLabel">Tambah Struktur Masjid</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form enctype="multipart/form-data" action="{{ route('mosque-structure.store') }}"
                                method="POST">
                                @csrf
                                <div class="form-group">
                                    <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                                </div>
                                <div class="form-group">
                                    <label for="name">Nama</label>
                                    <input required type="text" class="form-control" id="name" name="name"
                                        value="{{ old('name') }}">
                                </div>
                                <div class="form-group">
                                    <label for="position">Posisi</label>
                                    <select required class="form-control" id="position" name="position">
                                        <option value="Direktur">Direktur</option>
                                        <option value="Wakil Direktur">Wakil Direktur</option>
                                        <option value="Kabag Umum">Kabag Umum</option>
                                        <option value="Kabag Operasional">Kabag Operasional</option>
                                        <option value="Kabag Multimedia">Kabag Multimedia</option>
                                        <option value="Kabag Program">Kabag Program</option>
                                        <option value="Kabag Pembangunan">Kabag Pembangunan</option>
                                        <option value="Kepala Unit">Kepala Unit</option>

                                        <option value="">Other (Manual Input)</option>
                                    </select>
                                    <div class="form-group mt-3" id="manualInputContainer" style="display: none;">
                                        <label for="manual_input">Lainnya</label>
                                        <input type="text" class="form-control" id="manual_input" name="manual_input"
                                            placeholder="Masukkan Posisi Lainnya">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="photo_path">Upload Foto</label>
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
                            <h5 class="modal-title" id="editModalLabel">Edit Struktur Masjid</h5>
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
                                    <label for="editName">Nama</label>
                                    <input type="text" class="form-control" id="editName" name="name">
                                </div>
                                <div class="form-group">
                                    <label for="editPosition">Posisi</label>
                                    <select class="form-control" id="editPosition" name="position">
                                        <option value="Direktur">Direktur</option>
                                        <option value="Wakil Direktur">Wakil Direktur</option>
                                        <option value="Kabag Umum">Kabag Umum</option>
                                        <option value="Kabag Operasional">Kabag Operasional</option>
                                        <option value="Kabag Multimedia">Kabag Multimedia</option>
                                        <option value="Kabag Program">Kabag Program</option>
                                        <option value="Kabag Pembangunan">Kabag Pembangunan</option>
                                        <option value="Kepala Unit">Kepala Unit</option>
                                        {{-- <option value="Administrasi">Administrasi</option>
                                        <option value="Program">Program</option>
                                        <option value="Operasional">Operasional</option>
                                        <option value="Multimedia">Multimedia</option>
                                        <option value="Perlengkapan">Perlengkapan</option> --}}
                                        <option value="">Other (Manual Input)</option>
                                    </select>
                                    <div class="form-group mt-3" id="manualInputContainerEdit" style="display: none;">
                                        <label for="manual_input">Lainnya</label>
                                        <input type="text" class="form-control" id="manual_inputEdit"
                                            name="manual_input" placeholder="Masukkan Posisi Lainnya">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="editPhoto">Ubah Foto</label>
                                    <input type="file" class="form-control-file" id="editPhoto" name="photo_path"
                                        accept="image/*">
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
    <!-- SweetAlert CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
    <script>
        document.getElementById('position').addEventListener('change', function() {
            var manualInputContainer = document.getElementById('manualInputContainer');
            var positionInput = document.getElementById('manual_input');

            // Tampilkan atau sembunyikan input manual berdasarkan pilihan dropdown
            if (this.value === '') {
                manualInputContainer.style.display = 'block';
                positionInput.setAttribute('required', 'required');
            } else {
                manualInputContainer.style.display = 'none';
                positionInput.removeAttribute('required');
            }
        });
    </script>
    <script>
        document.getElementById('editPosition').addEventListener('change', function() {
            var manualInputContainer = document.getElementById('manualInputContainerEdit');
            var positionInput = document.getElementById('manual_inputEdit');

            // Tampilkan atau sembunyikan input manual berdasarkan pilihan dropdown
            if (this.value === '') {
                manualInputContainer.style.display = 'block';
                positionInput.setAttribute('required', 'required');
            } else {
                manualInputContainer.style.display = 'none';
                positionInput.removeAttribute('required');
            }
        });
    </script>
    <script>
        $(document).ready(function() {
            // ...

            // Event listener untuk tombol hapus
            $('.btn-delete').click(function() {
                var id = $(this).data('id');

                // Tampilkan pesan konfirmasi SweetAlert
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
                        // Jika dikonfirmasi, kirim AJAX request dengan metode DELETE
                        $.ajax({
                            url: '{{ url('mosque-structure') }}/' + id,
                            type: 'DELETE',
                            data: {
                                "_token": "{{ csrf_token() }}"
                            },
                            success: function(response) {
                                // Handle the success response
                                Swal.fire('Deleted!', 'Your data has been deleted.',
                                    'success');
                                // Optionally, you can update the UI or perform other actions
                            },
                            error: function(xhr) {
                                // Handle the error response
                                Swal.fire('Error!', 'An error occurred while deleting.',
                                    'error');
                                // Optionally, you can log errors or perform other actions
                            }
                        });
                        window.location.reload();
                    }
                });
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.btn-delete').click(function() {
                var id = $(this).data('id');
                // Set ID yang akan dihapus ke modal konfirmasi
                $('#confirmDeleteBtn').data('id', id);
                // Tampilkan modal konfirmasi
                $('#deleteModal').modal('show');
            });

            // Event listener untuk konfirmasi hapus
            $('#confirmDeleteBtn').click(function() {
                var id = $(this).data('id');
                // Redirect ke route delete dengan menyertakan parameter id
                window.location.href = '{{ url('mosque-structure-destroy') }}/' + id;
            });
            // Inisiasi tabel dengan DataTables
            var table = $('#report').DataTable();
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
            var name = button.data('name');
            var position = button.data('position');
            var other = button.data('position');
            var photoPath = button.data('photo_path');

            var modal = $(this);
            var form = modal.find('#editForm');

            // Set action URL dengan menyertakan parameter id
            form.attr('action', '{{ url('mosque-structure-update') }}/' + id);

            modal.find('#editid').val(id);
            modal.find('#editName').val(name);
            modal.find('#editPosition').val(position);
            modal.find('#manualInputContainerEdit').val(position);
            modal.find('#editPhotoPreview').attr('src', '{{ asset('storage/') }}/' + photoPath);
        });
    </script>
@endpush
