@extends('layouts.details')

@section('title')
    Admin BPKM
@endsection
@push('addon-style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />

    <style>
        .notify {
            z-index: 99999;
        }

        .custom-file-label::after {
            content: "Pilih";
        }

        .custom-file-input:lang(en)~.custom-file-label::after {
            content: "Pilih";
        }

        .custom-file-input:focus~.custom-file-label {
            border-color: rgba(0, 0, 0, 0.125);
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }

        /*

                                                                                                                                                                                                                                                                                                                                                                                                                                                                            /* Gaya tambahan untuk close button di pojok kanan atas */
        .modal-header .close {
            color: white;
            opacity: 1;
        }

        .image-container {
            position: relative;
            overflow: hidden;
        }

        .image-container:hover .image-overlay {
            box-shadow: 0 4px 6px rgba(15, 7, 7, 0.5);
            /* Sesuaikan parameter bayangan di sini */
            opacity: 1;
        }

        .image-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.0);
            display: flex;
            justify-content: center;
            align-items: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .edit-icon,
        .delete-icon,
        .lightbox-icon {
            color: #fff;
            font-size: 24px;
            margin: 0 10px;
            cursor: pointer;
        }

        .image-container img {
            transition: transform 0.2s ease;
            /* Menambahkan transition pada border-radius */
        }

        .image-container:hover img {
            transform: scale(1.1);
            filter: brightness(50%);
            border-radius: 30px;
            /* Sesuaikan nilai border-radius sesuai keinginan Anda */
        }

        .image-container::before {
            content: '';
            /* Pseudo-element for border-radius */
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border-radius: 15px;
            /* Adjust the border-radius as needed */
            background: transparent;
            /* Match the background color of your image container */
            transition: opacity 0.2s ease;
            /* Add a transition for opacity */
            opacity: 0;
            /* Initially invisible */
        }

        .image-container:hover::before {
            opacity: 1;
            /* Make the pseudo-element visible on hover */
        }

        .custom-break-inside-avoid {
            page-break-inside: avoid;
            break-inside: avoid;
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
                            <div class="col-12">
                                <h3 class="font-weight-bold">Assalamualaikum {{ $mosque->name }}</h3>
                            </div>
                            <div class="col-12">
                                <h6 class="font-weight-normal mb-0 poppins">We Are Nothing Allah Is Everything</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card ">
                            <div class="card-body rounded">
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <p class="card-title poppins mb-0">Gallery {{ $mosque->name }}</p>
                                    {{-- <button style="background-color: #ab509f" type="button" class="btn btn-primary"
                                        data-toggle="modal" data-target="#tambahModal" data-backdrop="false">
                                        <i class="ti-plus"></i>
                                    </button> --}}
                                </div>

                                <!-- Section gallery -->
                                <div class="container mt-5">
                                    <div class="row">
                                        @forelse ($galleries as $index => $image)
                                            <div class="col-md-4 mb-4 custom-break-inside-avoid">
                                                <div class="modal fade" id="editModal{{ $image->id }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="editModalLabel" aria-hidden="true"
                                                    data-backdrop="false" data-keyboard="false">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="editModalLabel">Edit Foto</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <!-- Form edit galeri -->
                                                                <form
                                                                    action="{{ route('mosque-gallery.update', $image->id) }}"
                                                                    method="POST" enctype="multipart/form-data">
                                                                    @csrf
                                                                    @method('PUT')

                                                                    <div class="form-group">
                                                                        <label for="edit_title">Judul</label>
                                                                        <input type="text" class="form-control rounded"
                                                                            id="edit_title" name="title"
                                                                            value="{{ $image->title }}" required>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="edit_image">Gambar</label>
                                                                        <div class="custom-file">
                                                                            <input type="file"
                                                                                class="custom-file-input rounded"
                                                                                id="edit_image" name="image"
                                                                                accept="image/*">
                                                                            <label class="custom-file-label rounded"
                                                                                for="edit_image">Pilih
                                                                                gambar...</label>
                                                                        </div>
                                                                    </div>

                                                                    <button type="submit" class="btn btn-primary rounded"
                                                                        style="background-color: #4CAF50; border: none; color: white; padding: 10px 20px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; border-radius: 5px;">Simpan
                                                                    </button>
                                                                </form>
                                                                <!-- Form edit galeri -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="image-container position-relative">
                                                    <img src="{{ asset('storage/' . $image['image']) }}"
                                                        class="w-100 shadow-1-strong mb-4" alt="{{ $image->title }}"
                                                        style="border-radius: 15px;" />
                                                    <div class="image-overlay">
                                                        {{-- <a class="edit-icon" data-toggle="modal"
                                                            data-target="#editModal{{ $image->id }}">
                                                            <i class="fa fa-edit"></i>
                                                        </a> --}}
                                                        {{-- <a href="javascript:void(0);" class="delete-icon"
                                                            onclick="confirmDelete({{ $image->id }})">
                                                            <i class="fa fa-trash"></i>
                                                        </a> --}}
                                                        <a href="{{ asset('storage/' . $image['image']) }}"
                                                            data-fancybox="gallery" data-caption="{{ $image->title }}"
                                                            class="lightbox-icon">
                                                            <i class="fa fa-search-plus"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            @if (($index + 1) % 3 == 0 && $index + 1 < count($galleries))
                                    </div>
                                    <div class="row">
                                        @endif
                                    @empty
                                        <div class="col-md-12 text-center">
                                            <p>Belum ada gambar.</p>
                                        </div>
                                        @endforelse
                                    </div>
                                </div>
                                <!-- End gallery -->
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

        @push('addon-script')
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

            <!-- Tambahkan SweetAlert library jika belum ada -->
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

            <!-- Gantilah tag <a> dengan <form> -->


            <!-- Tombol hapus yang memicu SweetAlert dan form submit -->
            <button class="delete-icon" onclick="confirmDelete()">
                <i class="fa fa-trash"></i>
            </button>

            <script>
                function confirmDelete(imageId) {
                    Swal.fire({
                        title: 'Apakah Anda yakin?',
                        text: 'Anda tidak akan dapat mengembalikan ini!',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Ya, hapus!',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Menggunakan route untuk menghasilkan URL yang sesuai
                            var deleteUrl = '{{ route('mosque-gallery.destroy', ':id') }}';
                            deleteUrl = deleteUrl.replace(':id', imageId);

                            // Jika pengguna menekan "Ya", kirimkan permintaan DELETE dengan AJAX
                            $.ajax({
                                url: deleteUrl,
                                type: 'DELETE',
                                data: {
                                    _token: '{{ csrf_token() }}',
                                },
                                success: function(response) {
                                    // Tambahkan logika atau pesan sukses di sini jika diperlukan
                                    console.log(response);
                                    // Kemudian, refresh halaman atau lakukan pembaruan yang diperlukan
                                    window.location.reload();
                                },
                                error: function(xhr) {
                                    // Tambahkan logika atau pesan kesalahan di sini jika diperlukan
                                    console.error(xhr.responseText);
                                }
                            });
                            window.location.reload();
                        }
                    });
                }
            </script>
        @endpush
    @endsection
