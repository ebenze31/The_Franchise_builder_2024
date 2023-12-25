<div class="d-flex justify-content-center w-100">
      <ul class="nav nav-pills mb-3 d-flex justify-content-center w-100"" id=" pills-tab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active btn-qr-code" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">My QR code</a>
        </li>
        <li class="nav-item">
          <a class="nav-link btn-scan-code" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">scan QR code</a>
        </li>
      </ul>
    </div>

    <div class=" d-flex justify-content-center w-100 mt-4">

      @if( !empty(Auth::user()->photo) )
      <img src="{{ url('storage')}}/{{ Auth::user()->photo }}" class="user-img" alt="รูปภาพผู้ใช้">
      @else
      <img src="{{ url('/img/icon/profile.png') }}" class="user-img" alt="รูปภาพผู้ใช้">
      @endif

    </div>
    <p class="info-user mt-3 mb-0" data-toggle="modal" data-target="#exampleModalCenter">{{ Auth::user()->name }} </p>
    <!-- <p class="info-user">{{ Auth::user()->email }}</p> -->

    <div class="tab-content mt-5 " id="pills-tabContent">
      <div class="tab-pane fade show active text-white" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
        <div class="d-flex justify-content-center w-100">
          <img src="{{ url('img/qr_profile')}}/{{ Auth::user()->qr_profile }}" class="qr-profile" alt="รูปภาพ QR Code">

        </div>
      </div>
      <div class="tab-pane fade text-white" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">2</div>
    </div>

    <div>
      <a href="{{ url('img/qr_profile')}}/{{ Auth::user()->qr_profile }}" class="btn btn-download" download>
        Download
      </a>
    </div>