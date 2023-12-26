@extends('layouts.theme_login')

@section('content')
<style>
  #header-text-login {
    width: 45% !important;
    margin-top: 35px;
  }

  .user-img {
    width: 83px;
    height: 83px;
  }

  .info-user {
    color: #002449;
    font-weight: lighter;
  }

  .qr-profile {
    width: 180px;
    height: 180px;
    object-fit: contain;
    margin-top: 20px;

  }

  .qr-section {
    position: relative;
    padding: 18px 35px 35px 35px;
  }

  .btn-download {
    background-color: #005CD3;
    padding: 10px 40px;
    width: auto;
    color: #fff;
    border-radius: 5px;
    margin-top: 45px;
    font-size: 12px;
  }

  .qr-card {
    padding: 3rem 1rem 1.8rem 1rem !important;
    border-radius: 10px;
  }

  .btn-qr-code {
    background-color: #3980B9 !important;
    color: #fff !important;
    font-size: 14px;
    border-radius: 5px 0 0 5px !important;
  }

  .btn-qr-code.active {
    background-color: #002449 !important;
    color: #fff !important;
  }

  .btn-scan-code {
    background-color: #3980B9 !important;
    color: #fff !important;
    font-size: 14px;
    border-radius: 0 5px 5px 0 !important;
  }

  .btn-scan-code.active {
    background-color: #002449 !important;
    color: #fff !important;
  }

  #qr-video {
    width: 157px;
    height: 157px;
  }

  .box {
    --b: 0px;
    /* thickness of the border */
    --c: red;
    /* color of the border */
    --w: 20px;
    /* width of border */
    --r: 25px;
    /* radius */


    padding: var(--b);
    /* space for the border */

    position: relative;
    /*Irrelevant code*/
    width: 250px;
    height: 220px;
    box-sizing: border-box;
    margin: 5px;
    display: inline-flex;
    font-size: 30px;
    justify-content: center;
    align-items: center;
    text-align: center;
  }

  .box::before {
    content: "";
    position: absolute;
    inset: 0;
    background: var(--c, red);
    padding: var(--b);
    border-radius: var(--r);
    -webkit-mask:
      linear-gradient(0deg, #000 calc(2*var(--b)), #0000 0) 50% var(--b)/calc(100% - 2*var(--w)) 100% repeat-y,
      linear-gradient(-90deg, #000 calc(2*var(--b)), #0000 0) var(--b) 50%/100% calc(100% - 2*var(--w)) repeat-x,
      linear-gradient(#000 0 0) content-box,
      linear-gradient(#000 0 0);
    -webkit-mask-composite: destination-out;
    mask-composite: exclude;
  }
</style>
<div class="w-100 qr-section">
  <div class="card qr-card text-center">
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
      <div class="tab-pane fade text-white" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
        <div class="d-flex w-100 justify-content-center">
          <div class="box" style="--c:#000;--w:40px;--b:2px;--r:20px;">
            <video style="width:100%;" id="qr-video"></video>
          </div>
        </div>
        <style>
      .test{
        width: 38px;
        height: 38px;
        background-color: #15093F;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 50%;
        position: absolute;
        bottom: 10px;
        right: 10px;
      }
    </style>
    <button class="btn test">
        <img src="{{ url('/img/icon/select-img.png') }}" alt="">
    </button>
      </div>
      
    </div>

    <div>
      <a href="{{ url('img/qr_profile')}}/{{ Auth::user()->qr_profile }}" class="btn btn-download" download>
        Download
      </a>
    </div>

    
  </div>
</div>

<!-- Button trigger modal -->
<button id="btn_Modal_cf_slip" type="button" class="d-none" data-toggle="modal" data-target="#Modal_cf_slip">
  <!--  -->
</button>
<button class="btn" onclick="scanQRCode()">
  asdf
</button>
<!-- Modal -->
<div class="modal fade" id="Modal_cf_slip" tabindex="-1" aria-labelledby="Label_Modal_cf_slip" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="Label_Modal_cf_slip">โปรดตรวจสอบข้อมูลอีกครั้ง</h5>
        <button id="btn_close_Modal_cf_slip" type="button" class="close btn" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div id="content_Modal_cf_slip" class="col-12 text-center">
            <!-- DATA -->
          </div>
          <div class="col-12 text-center mt-4 mb-0">
            <p>เจ้าหน้าที่ผู้ยืนยัน : {{ Auth::user()->name }}</p>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button id="btn_change_status" style="width: 40%;" type="button" class="btn btn-success">ยืนยัน</button>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/jsqr/dist/jsQR.js"></script>

<script>
  window.onload = function() {
    const video = document.getElementById('qr-video');
    const canvas = document.createElement('canvas');
    const context = canvas.getContext('2d');

    navigator.mediaDevices.getUserMedia({
        video: {
          facingMode: 'environment'
        }
      })
      .then(function(stream) {
        video.srcObject = stream;
        video.play();

        scanQRCode();
      });

    function scanQRCode() {
      if (video.readyState === video.HAVE_ENOUGH_DATA) {
        canvas.height = video.videoHeight;
        canvas.width = video.videoWidth;
        context.drawImage(video, 0, 0, canvas.width, canvas.height);
        const imageData = context.getImageData(0, 0, canvas.width, canvas.height);
        const code = jsQR(imageData.data, imageData.width, imageData.height);

        if (code) {
          // console.log(code.data);
          alert(code.data);

          if (code.data.split('=')[1]) {
            let text_account = code.data.split('=')[1];
            console.log(text_account);

            document.querySelector('#btn_Modal_cf_slip').click();
          }
          return;
        }
      }

      requestAnimationFrame(scanQRCode);
    }
  };
</script>
@endsection