@extends('layouts.register')

@section('title')
    Admin BPKM
@endsection

@section('content')
@push('addon-style')

@endpush
<div class="main-panel mt-5">        
  <div class="content-wrapper">
    <div class="row">

      <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Harap Melengkapi Profil terlebih dahulu</h4>
            <p class="card-description">
              Harap Perhatikan data sebaik mungkin
            </p>
            <form class="forms-sample" method="POST" action="{{ route('mosque-profile-store') }}">
              
              @csrf
              
              
              <div class="form-group">
                
                <input type="hidden" value="{{ $auth }}" name="user_id" id="user_id">
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
  <footer class="footer">
    <div class="d-sm-flex justify-content-center justify-content-sm-between">
      <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021.  Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash. All rights reserved.</span>
      <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span>
    </div>
  </footer>
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
    <script>
      var locations = new Vue({
        el: "#locations",
        mounted() {
          this.getProvincesData();
        },
        data: {
          provinces: null,
          regencies: null,
          provinces_id: null,
          regencies_id: null,
        },
        methods: {
          getProvincesData() {
            var self = this;
            axios.get('{{ route('api-provinces') }}')
              .then(function (response) {
                  self.provinces = response.data;
              })
          },
          getRegenciesData() {
            var self = this;
            axios.get('{{ url('api/regencies') }}/' + self.provinces_id)
              .then(function (response) {
                  self.regencies = response.data;
              })
          },
        },
        watch: {
          provinces_id: function (val, oldVal) {
            this.regencies_id = null;
            this.getRegenciesData();
          },
        }
      });
    </script>
@endpush