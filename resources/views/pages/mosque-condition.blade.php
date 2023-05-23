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
            <form class="forms-sample" method="POST" action="{{ route('mosque-condition-store') }}">
              
              @csrf
              
              
              <div class="form-group">
                
                <input type="hidden" value="{{ $auth }}" name="user_id" id="user_id">
              </div>
  
              <div class="form-group">
                <label for="development_status">Apakah masih bisa pengembangan/pembebasan lahan disekitar Masjid</label>
                <select data-show-subtext="true" data-live-search="true" name="development_status" id="development_status select_box" class="selectpicker form-control" v-model="development_status" v-if="province">
                  <option data-tokens="ya" value="1">Ya</option>
                  <option data-tokens="tidak" value="0">Tidak</option>
              </select>
              </div>
              <div class="form-group">
                <label for="director_house_status">Apakah Sudah ada rumah Ustadz/pengasuh?</label>
                <select data-show-subtext="true" data-live-search="true" name="director_house_status" id="director_house_status select_box" class="selectpicker form-control" v-model="director_house_status" v-if="province">
                  <option data-tokens="ya" value="1">Ya</option>
                  <option data-tokens="tidak" value="0">Tidak</option>
              </select>
              </div>
              <div class="form-group">
                <label for="quran_house_status">Apakah di kawasan Masjid sudah terdapat rumah Qur'an/Pondok khusus santri?</label>
                <select data-show-subtext="true" data-live-search="true" name="quran_house_status" id="quran_house_status select_box" class="selectpicker form-control" v-model="quran_house_status" v-if="province">
                  <option data-tokens="ya" value="1">Ya</option>
                  <option data-tokens="tidak" value="0">Tidak</option>
              </select>
              </div>
              <div class="form-group">
                <label for="odoj_status">Apakah di Masjid sudah ada program rutin One Day One Juz (ODOJ)</label>
                <select data-show-subtext="true" data-live-search="true" name="odoj_status" id="odoj_status select_box" class="selectpicker form-control" v-model="odoj_status" v-if="province">
                  <option data-tokens="ya" value="1">Ya</option>
                  <option data-tokens="tidak" value="0">Tidak</option>
              </select>
              </div>
              <div class="form-group">
                <label for="business_entity_status">Apakah di kawasan Masjid sudah terdapat amal usaha Masjid Munzalan?</label>
                <select data-show-subtext="true" data-live-search="true" name="business_entity_status" id="business_entity_status select_box" class="selectpicker form-control" v-model="business_entity_status" v-if="province">
                  <option data-tokens="ya" value="1">Ya</option>
                  <option data-tokens="tidak" value="0">Tidak</option>
              </select>
              </div>
              <div class="form-group">
                <label for="bmi_status">Apakah di kawasan Masjid sudah terdapat Baitulmaal Munzalan Indonesia?</label>
                <select data-show-subtext="true" data-live-search="true" name="bmi_status" id="bmi_status select_box" class="selectpicker form-control" v-model="bmi_status" v-if="province">
                  <option data-tokens="ya" value="1">Ya</option>
                  <option data-tokens="tidak" value="0">Tidak</option>
              </select>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>

@endpush