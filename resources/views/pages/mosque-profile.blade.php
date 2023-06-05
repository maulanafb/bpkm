@extends('layouts.register')

@section('title')
    Admin BPKM
@endsection

@section('content')

@push('addon-style')
<style>


.bcca-breadcrumb {
  margin-left: 20px;
  margin-top: 40px;
}

/*** breadcrumb container ***/
.bcca-breadcrumb {
  display: flex;
  flex-direction: row-reverse;
  flex-shrink: 0;
  width: fit-content;
  margin-bottom: 15px;
  position: relative;
  border-radius: 4px;
}

/*** breadcrumb items ***/
.bcca-breadcrumb-item {
  transition: all 0.2s ease-in-out;
  height: 40px;
  background: white;
  box-shadow: 0px 0px 18px -2px #d9d9d9;
  line-height: 40px;
  padding-left: 30px;
  padding-right: 10px;
  font-size: 13px;
  font-weight: 600;
  color: rgba(74, 74, 74, 0.8);
  position: relative;
  cursor: pointer;
  float: left;
}

.bcca-breadcrumb-item:after {
  transition: all ease-in-out 0.2s;
  content: "";
  position: absolute;
  left: calc(100% - 10px);
  top: 6px;
  z-index: 1;
  width: 0;
  height: 0;
  border: 14px solid #ffffff;
  border-left-color: transparent;
  border-bottom-color: transparent;
  box-shadow: 0px 0px 0 0px #d9d9d9, 5px -5px 10px -4px #d9d9d9;
  transform: rotate(45deg);
  margin-left: -4px;
}

.bcca-breadcrumb-item-active:after {
  transition: all ease-in-out 0.2s;
  content: "";
  position: absolute;
  left: calc(100% - 10px);
  top: 6px;
  z-index: 1;
  width: 0;
  height: 0;
  border: 14px solid #d1b2cd;
  border-left-color: transparent;
  border-bottom-color: transparent;
  box-shadow: 0px 0px 0 0px #d9d9d9, 5px -5px 10px -4px #d9d9d9;
  transform: rotate(45deg);
  margin-left: -4px;
}

.bcca-breadcrumb-item:last-child {
  border-top-left-radius: 4px;
  border-bottom-left-radius: 4px;
  padding-left: 10px;
}

.active {
  border-top-right-radius: 4px;
  border-bottom-right-radius: 4px;
  background-color: #d1b2cd;
}

.bcca-breadcrumb-item:first-child:after {
  content: "";
  display: none;
}

.bcca-breadcrumb-item i {
  margin-left: 5px;
  color: rgba(0, 0, 0, 0.2);
}

/*** hover breadcrumbs ***/
.bcca-breadcrumb-item:hover {
  background-color: #ab509f;
}

.bcca-breadcrumb-item:hover:after {
  border: 14px solid #ab509f;
  border-left-color: transparent;
  border-bottom-color: transparent;
}

.active:hover {
  background-color: #ab509f;
}
</style>
@endpush
<div class="main-panel mt-5">
  <div class="content-wrapper">
    <div class="row">

      <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="bcca-breadcrumb">
            <a class="bcca-breadcrumb-item" href="{{ route('mosque-document.index') }}">5<i class="fa fa-pencil"></i></a>
            <div ></div>
            <a class="bcca-breadcrumb-item" href="{{ route('mosque-administrator') }}">4</a>
            <a class="bcca-breadcrumb-item" href="{{ route('mosque-condition') }}">3</a>
            <a class="bcca-breadcrumb-item" href="{{ route('mosque-land') }}">2</a>
            <a class="bcca-breadcrumb-item bcca-breadcrumb-item-active active" href="{{ route('mosque-profile.show') }}">1</a>

            {{-- <div class="bcca-breadcrumb-item">Home</div> --}}
          </div>
          <div class="card-body">
            <h4 class="card-title">Harap Melengkapi Profil terlebih dahulu</h4>
            <p class="card-description">
              Harap Perhatikan data sebaik mungkin
            </p>
            <form class="forms-sample" method="POST" action="{{ route('mosque-profile-store') }}" enctype="multipart/form-data">

              @csrf
              <div class="form-group" >

                <input type="hidden" value="{{ $auth }}" name="user_id" id="user_id">
              </div>
              <label>Upload Foto Masjid</label>
              @if ($user != null)
                  <img width="100px" class="img-thumbnail" src="{{ Storage::url($user->photo_path) }}" alt="">
              @else
              <input type="file" name="photo_path" class="form-control" />
              @endif
              <label for="coordinator" >Nama koordinator/Penanggung Jawab Masjid</label>
              <div class="form-group">
                <input id="coordinator" type="text" class="form-control @error('coordinator') is-invalid @enderror" name="coordinator" value="{{ old('coordinator') }}" required autocomplete="coordinator" autofocus placeholder="Nama Koordinator/penanggung jawab Masjid">
              </div>
              <label for="name" >Nomor Hp Harap dengan format (08xxxxxxxx) contoh : 0812345667</label>
              <div class="form-group">
                <input id="phone_number" type="number" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}" required autocomplete="phone_number" placeholder="Nomor Hp">
              </div>
              <div class="form-group">
                <label for="province_id">Provinsi</label>
                <select data-show-subtext="true" data-live-search="true" name="province_id" id="province_id select_box" class="selectpicker form-control" v-model="province_id" v-if="province">
                    @foreach ($provinces as $province)
                        <option data-tokens="{{ $province->name }}" value="{{ $province->id }}">{{ $province->name }}</option>
                    @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="regencies_id">Kabupaten/Kota</label>
                <select data-live-search="true" name="regencies_id" id="regencies_id" class="selectpicker form-control" v-model="regencies_id" v-if="regencies">
                  @foreach ($regencies as $regency)

                      <option  value="{{ $regency->id }}">{{$regency->name }}</option>
                  @endforeach
                </select>
              </div>
              <label for="address" >Alamat Lengkap Masjid</label>
              <div class="form-group">

                <textarea cols="5" rows="5" id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus placeholder="Alamat Lengkap Masjid"></textarea>
              </div>
              <div class="form-group">
                <label for="problem">Permasalahan Terkait Masjid</label>
                <input required type="text" name="problem" class="form-control" id="problem" placeholder="Permasalahan Masjid">
              </div>
              <div class="form-group">
                <label for="funding_plan">Rencana Kebutuhan dana</label>
                <input required type="text" name="funding_plan" class="form-control" id="funding_plan" placeholder="Rencana Kebutuhan dana (untuk apa)">
              </div>
              <div class="form-group">
                <label for="funding_needs">Berapa jumlah nominal kebutuhan dana</label>
                <input required type="number" name="funding_needs" class="form-control" id="funding_needs" placeholder="dalam rupiah" >
              </div>
              <div class="form-group">
                <label for="mosque_account_number">Rekening Masjid, Contoh : 28138123 a/n Munzalan Indonesia</label>
                <input required type="text" name="mosque_account_number" class="form-control" id="mosque_account_number" placeholder="No Rekening Masjid">
              </div>
              <div class="form-group">
                <label for="bmi_account_number">Rekening BMI, Contoh : 28138123 a/n Munzalan Indonesia</label>
                <input required type="text" name="bmi_account_number" class="form-control" id="bmi_account_number" placeholder="No Rekening BMI">
              </div>
              <div class="form-group">
                <label for="building_area">Luas Bangunan Masjid</label>
                <input required type="text" name="building_area" class="form-control" id="building_area" placeholder="Luas bangunan Masjid">
              </div>
              <div class="form-group">
                <label for="history">Sejarah Masjid</label>
                <textarea name="history" class="form-control" id="history" placeholder="Sejarah Masjid"></textarea>
              </div>
              <button type="submit" class="btn btn-primary mr-2">Submit</button>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- content-wrapper ends -->
  <!-- partial:../../partials/_footer.html -->
  @include('includes.footer')
  <!-- partial -->
</div>
<!-- main-panel ends -->
@endsection


@push('addon-script')
<script>
   /* Tanpa Rupiah */
   var tanpa_rupiah = document.getElementById('tanpa-rupiah');
    tanpa_rupiah.addEventListener('keyup', function(e)
    {
        tanpa_rupiah.value = formatRupiah(this.value);
    });

    /* Dengan Rupiah */
    var dengan_rupiah = document.getElementById('funding_needs');
    dengan_rupiah.addEventListener('keyup', function(e)
    {
        dengan_rupiah.value = formatRupiah(this.value, 'Rp. ');
    });

    /* Fungsi */
    function formatRupiah(angka, prefix)
    {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split    = number_string.split(','),
            sisa     = split[0].length % 3,
            rupiah     = split[0].substr(0, sisa),
            ribuan     = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>

<script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <script src="https://unpkg.com/vue-toasted"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

@endpush
