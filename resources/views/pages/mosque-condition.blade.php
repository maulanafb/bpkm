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
            <a class="bcca-breadcrumb-item" href="{{ route('mosque-document') }}">5<i class="fa fa-pencil"></i></a>
            <div ></div>
            <a class="bcca-breadcrumb-item" href="{{ route('mosque-administrator') }}">4</a>
            <a class="bcca-breadcrumb-item bcca-breadcrumb-item-active active" href="{{ route('mosque-condition') }}">3</a>
            <a class="bcca-breadcrumb-item" href="{{ route('mosque-land') }}">2</a>
            <a class="bcca-breadcrumb-item" href="{{ route('mosque-profile') }}">1</a>
           
            {{-- <div class="bcca-breadcrumb-item">Home</div> --}}
          </div>
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