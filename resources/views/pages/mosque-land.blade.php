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
            <form class="forms-sample" method="POST" action="{{ route('mosque-land-store') }}">
              
              @csrf
              
              
              <div class="form-group">
                
                <input type="hidden" value="{{ $auth }}" name="user_id" id="user_id">
              </div>
  
              <div class="form-group">
                <label for="land_status">Status tanah masjid</label>
                <input type="text" name="land_status" class="form-control" id="land_status" placeholder="Status tanah masjid">
              </div>
              <div class="form-group">
                <label for="land_name">Status tanah atas nama siapa</label>
                <input type="text" name="land_name" class="form-control" id="land_name" >
              </div>
              <div class="form-group">
                <label for="development_process">Proses Pembangunan</label>
                <input type="text" name="development_process" class="form-control" id="development_process" >
              </div>
              <div class="form-group">
                <label for="current_state_development">Jelaskan Kondisi pembangunan terkini</label>
                <input type="text" name="current_state_development" class="form-control" id="current_state_development" >
              </div>
              <div class="form-group">
                <label for="total_land_area">Luas tanah keseluruhan Masjid</label>
                <input type="text" name="total_land_area" class="form-control" id="total_land_area" >
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