@extends('layouts.app')

@section('title')
    Admin BPKM
@endsection

@section('content')

<div class="container-fluid page-body-wrapper">
    <!-- partial:partials/_settings-panel.html -->
    <div class="theme-setting-wrapper">
      <div id="settings-trigger"><i class="ti-settings"></i></div>
      <div id="theme-settings" class="settings-panel">
        <i class="settings-close ti-close"></i>
        <p class="settings-heading">SIDEBAR SKINS</p>
        <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border mr-3"></div>Light</div>
        <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark</div>
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
    <div id="right-sidebar" class="settings-panel">
      <i class="settings-close ti-close"></i>
      <ul class="nav nav-tabs border-top" id="setting-panel" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="todo-tab" data-toggle="tab" href="#todo-section" role="tab" aria-controls="todo-section" aria-expanded="true">TO DO LIST</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="chats-tab" data-toggle="tab" href="#chats-section" role="tab" aria-controls="chats-section">CHATS</a>
        </li>
      </ul>
      <div class="tab-content" id="setting-content">
        <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel" aria-labelledby="todo-section">
          <div class="add-items d-flex px-3 mb-0">
            <form class="form w-100">
              <div class="form-group d-flex">
                <input type="text" class="form-control todo-list-input" placeholder="Add To-do">
                <button type="submit" class="add btn btn-primary todo-list-add-btn" id="add-task">Add</button>
              </div>
            </form>
          </div>
          <div class="list-wrapper px-3">
            <ul class="d-flex flex-column-reverse todo-list">
              <li>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" type="checkbox">
                    Team review meeting at 3.00 PM
                  </label>
                </div>
                <i class="remove ti-close"></i>
              </li>
              <li>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" type="checkbox">
                    Prepare for presentation
                  </label>
                </div>
                <i class="remove ti-close"></i>
              </li>
              <li>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" type="checkbox">
                    Resolve all the low priority tickets due today
                  </label>
                </div>
                <i class="remove ti-close"></i>
              </li>
              <li class="completed">
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" type="checkbox" checked>
                    Schedule meeting for next week
                  </label>
                </div>
                <i class="remove ti-close"></i>
              </li>
              <li class="completed">
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" type="checkbox" checked>
                    Project review
                  </label>
                </div>
                <i class="remove ti-close"></i>
              </li>
            </ul>
          </div>
          <h4 class="px-3 text-muted mt-5 font-weight-light mb-0">Events</h4>
          <div class="events pt-4 px-3">
            <div class="wrapper d-flex mb-2">
              <i class="ti-control-record text-primary mr-2"></i>
              <span>Feb 11 2018</span>
            </div>
            <p class="mb-0 font-weight-thin text-gray">Creating component page build a js</p>
            <p class="text-gray mb-0">The total number of sessions</p>
          </div>
          <div class="events pt-4 px-3">
            <div class="wrapper d-flex mb-2">
              <i class="ti-control-record text-primary mr-2"></i>
              <span>Feb 7 2018</span>
            </div>
            <p class="mb-0 font-weight-thin text-gray">Meeting with Alisa</p>
            <p class="text-gray mb-0 ">Call Sarah Graves</p>
          </div>
        </div>
        <!-- To do section tab ends -->
        <div class="tab-pane fade" id="chats-section" role="tabpanel" aria-labelledby="chats-section">
          <div class="d-flex align-items-center justify-content-between border-bottom">
            <p class="settings-heading border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0">Friends</p>
            <small class="settings-heading border-top-0 mb-3 pt-0 border-bottom-0 pb-0 pr-3 font-weight-normal">See All</small>
          </div>
          <ul class="chat-list">
            <li class="list active">
              <div class="profile"><img src="images/faces/face1.jpg" alt="image"><span class="online"></span></div>
              <div class="info">
                <p>Thomas Douglas</p>
                <p>Available</p>
              </div>
              <small class="text-muted my-auto">19 min</small>
            </li>
            <li class="list">
              <div class="profile"><img src="images/faces/face2.jpg" alt="image"><span class="offline"></span></div>
              <div class="info">
                <div class="wrapper d-flex">
                  <p>Catherine</p>
                </div>
                <p>Away</p>
              </div>
              <div class="badge badge-success badge-pill my-auto mx-2">4</div>
              <small class="text-muted my-auto">23 min</small>
            </li>
            <li class="list">
              <div class="profile"><img src="images/faces/face3.jpg" alt="image"><span class="online"></span></div>
              <div class="info">
                <p>Daniel Russell</p>
                <p>Available</p>
              </div>
              <small class="text-muted my-auto">14 min</small>
            </li>
            <li class="list">
              <div class="profile"><img src="images/faces/face4.jpg" alt="image"><span class="offline"></span></div>
              <div class="info">
                <p>James Richardson</p>
                <p>Away</p>
              </div>
              <small class="text-muted my-auto">2 min</small>
            </li>
            <li class="list">
              <div class="profile"><img src="images/faces/face5.jpg" alt="image"><span class="online"></span></div>
              <div class="info">
                <p>Madeline Kennedy</p>
                <p>Available</p>
              </div>
              <small class="text-muted my-auto">5 min</small>
            </li>
            <li class="list">
              <div class="profile"><img src="images/faces/face6.jpg" alt="image"><span class="online"></span></div>
              <div class="info">
                <p>Sarah Graves</p>
                <p>Available</p>
              </div>
              <small class="text-muted my-auto">47 min</small>
            </li>
          </ul>
        </div>
        <!-- chat tab ends -->
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
                <p class="card-title">Profile Settings</p>
                <form class="forms-sample" method="POST" action="{{ route('dashboard-condition-update',$auth) }}">
              @csrf
              <div class="form-group">
                <input type="hidden" value="{{ $auth }}" name="user_id" id="user_id">
              </div>

              <div class="form-group">
                <label for="development_status">Apakah masih bisa pengembangan/pembebasan lahan disekitar Masjid</label>
                <select data-show-subtext="true" data-live-search="true" name="development_status" id="development_status select_box" class="selectpicker form-control" v-model="development_status" v-if="province">
                    <option data-tokens="{{ $user->development_status }}" value="{{ $user->development_status }}">{{ $user->development_status ? 'Ya' : 'Tidak' }}</option>
                  <option data-tokens="ya" value="1">Ya</option>
                  <option data-tokens="tidak" value="0">Tidak</option>
              </select>
              </div>
              <div class="form-group">
                <label for="director_house_status">Apakah Sudah ada rumah Ustadz/pengasuh?</label>
                <select data-show-subtext="true" data-live-search="true" name="director_house_status" id="director_house_status select_box" class="selectpicker form-control" v-model="director_house_status" v-if="province">
                    <option data-tokens="{{ $user->director_house_status }}" value="{{ $user->director_house_status }}">{{ $user->director_house_status ? 'Ya' : 'Tidak' }}</option>
                  <option data-tokens="ya" value="1">Ya</option>
                  <option data-tokens="tidak" value="0">Tidak</option>
              </select>
              </div>
              <div class="form-group">
                <label for="quran_house_status">Apakah di kawasan Masjid sudah terdapat rumah Qur'an/Pondok khusus santri?</label>
                <select data-show-subtext="true" data-live-search="true" name="quran_house_status" id="quran_house_status select_box" class="selectpicker form-control" v-model="quran_house_status" v-if="province">
                    <option data-tokens="{{ $user->quran_house_status }}" value="{{ $user->quran_house_status }}">{{ $user->quran_house_status ? 'Ya' : 'Tidak' }}</option>
                  <option data-tokens="ya" value="1">Ya</option>
                  <option data-tokens="tidak" value="0">Tidak</option>
              </select>
              </div>
              <div class="form-group">
                <label for="odoj_status">Apakah di Masjid sudah ada program rutin One Day One Juz (ODOJ)</label>
                <select data-show-subtext="true" data-live-search="true" name="odoj_status" id="odoj_status select_box" class="selectpicker form-control" v-model="odoj_status" v-if="province">
                    <option data-tokens="{{ $user->odoj_status }}" value="{{ $user->odoj_status }}">{{ $user->odoj_status ? 'Ya' : 'Tidak' }}</option>
                  <option data-tokens="ya" value="1">Ya</option>
                  <option data-tokens="tidak" value="0">Tidak</option>
              </select>
              </div>
              <div class="form-group">
                <label for="business_entity_status">Apakah di kawasan Masjid sudah terdapat amal usaha Masjid Munzalan?</label>
                <select data-show-subtext="true" data-live-search="true" name="business_entity_status" id="business_entity_status select_box" class="selectpicker form-control" v-model="business_entity_status" v-if="province">
                    <option data-tokens="{{ $user->business_entity_status }}" value="{{ $user->business_entity_status }}">{{ $user->business_entity_status ? 'Ya' : 'Tidak' }}</option>
                  <option data-tokens="ya" value="1">Ya</option>
                  <option data-tokens="tidak" value="0">Tidak</option>
              </select>
              </div>
              <div class="form-group">
                <label for="bmi_status">Apakah di kawasan Masjid sudah terdapat Baitulmaal Munzalan Indonesia?</label>
                <select data-show-subtext="true" data-live-search="true" name="bmi_status" id="bmi_status select_box" class="selectpicker form-control" v-model="bmi_status" v-if="province">
                    <option data-tokens="{{ $user->bmi_status }}" value="{{ $user->bmi_status }}">{{ $user->bmi_status ? 'Ya' : 'Tidak' }}</option>
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
      <!-- partial:partials/_footer.html -->
      @include('includes.footer')
      <!-- partial -->
    </div>
    <!-- main-panel ends -->
  </div>

@endsection