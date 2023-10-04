@extends('layouts.app')
@section('title')
    Ganti Password
@endsection
@push('addon-style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
@endpush
@section('content')
    <div class="container " style="margin-top:150px ">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header mx-auto">{{ __('Halaman Ubah Password') }}</div>
                    {{-- {{ Auth::user() }} --}}

                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form method="POST" action="{{ route('change-password') }}"
                            onsubmit="return confirmChangePassword();" id="change-password-form">
                            @csrf

                            <div class="form-group">
                                <label for="current_password">Password Sekarang</label>
                                <input id="current_password" type="password" class="form-control" name="current_password"
                                    required autofocus>
                                @error('current_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="new_password">Password Baru</label>
                                <input id="new_password" type="password" class="form-control" name="new_password" required>
                            </div>

                            <div class="form-group">
                                <label for="new_password_confirmation">Konfirmasi Password Baru</label>
                                <input id="new_password_confirmation" type="password" class="form-control"
                                    name="new_password_confirmation" required>
                            </div>

                            <button type="button" class="btn btn-primary mx-auto" onclick="confirmChangePassword();">
                                {{ __('Ubah Password') }}
                            </button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('addon-script')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script>
            function confirmChangePassword() {
                Swal.fire({
                    title: 'Konfirmasi',
                    text: 'Apakah Anda yakin ingin mengubah password?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya',
                    cancelButtonText: 'Batal',
                    customClass: {
                        confirmButton: 'custom-confirm-button-class',
                        icon: 'custom-icon-class'
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Jika pengguna mengonfirmasi, kirim formulir
                        document.getElementById('change-password-form').submit();
                    }
                });
            }
        </script>
    @endpush

@endsection
