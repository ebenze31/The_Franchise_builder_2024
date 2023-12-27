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
  }#modal_cf_pay_slip .modal-dialog .modal-content{
      border-radius: 10px;
      >.modal-footer{
        border-top: none;
        display: flex;
        justify-content: center !important;
      }
  }.btn-submit {
    border-radius: 5px;
    width: auto;
    font-size: 16px;
    margin-top: 15px;
    padding: 10px 40px;

    background-color: #005CD3;
    color: #fff;
  }

  .btn-submit:hover {
    border: 1px solid #00E0FF;
    box-shadow: 0px 0px 15px 1px #00FBFF;
    color: #fff;

  }
</style>

<!-- modal -->
<button id="btn_modal_cf_pay_slip" class="d-none" data-toggle="modal" data-target="#modal_cf_pay_slip"></button>

<div class="modal fade" id="modal_cf_pay_slip" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered px-4">
        <div class="modal-content">
            <div id="modal_cf_pay_slip_content" class="modal-body text-center pb-0">
                <img src="{{ url('/img/icon/Frame 2.png') }}" style="width:150px;" class="mt-2 mb-2">
                <h4 class="text-info mt-3"><b>ยืนยันการชำระเงินเรียบร้อยแล้ว</b></h4>
                <p class="text-info mb-0">ไปยังหน้าจัดกลุ่ม</p>
                <br>
            </div>
            <div id="modal_cf_pay_slip_footer" class="modal-footer text-center">
                <a href="{{ url('/groups') }}" type="button" class="btn btn-submit">OK</a>
            </div>
            <a id="link_to_my_team" class="d-none"></a>
        </div>
    </div>
</div>
<!-- END modal -->

<div class="w-100 qr-section">
  <div class="card qr-card text-center">
    <div class="d-flex justify-content-center w-100">
      <ul class="nav nav-pills mb-3 d-flex justify-content-center w-100" id=" pills-tab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active btn-qr-code" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true" onclick="stopScanQRCode();">My QR code</a>
        </li>
        <li class="nav-item">
          <a class="nav-link btn-scan-code" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false" onclick="start_scanQRCode();">scan QR code</a>
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
        <a href="{{ url('img/qr_profile')}}/{{ Auth::user()->qr_profile }}" class="btn btn-download" download>
          Download
        </a>
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
    <button class="btn test" id="btnSelectImage">
        <img src="{{ url('/img/icon/select-img.png') }}" alt="">
    </button>
    <input type="file" accept="image/*" style="display:none" id="inputImage" />

      </div>
      
    </div>


    
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/jsqr/dist/jsQR.js"></script>

<script>

    var loop_check_time_cf_pay_slip ;

    document.addEventListener('DOMContentLoaded', (event) => {
        // console.log("START");

        let check_time_cf_pay_slip = "{{ Auth::user()->time_cf_pay_slip }}" ;
        if(!check_time_cf_pay_slip){
          loop_check_time_cf_pay_slip = setInterval(function () {
              fetch("{{ url('/') }}/api/check_pay_slip" + "/" + "{{ Auth::user()->id }}" )
                .then(response => response.json())
                .then(result => {
                    // console.log(result);
                    // console.log(result.time_cf_pay_slip);

                    if(result.time_cf_pay_slip){
                      document.querySelector('#btn_modal_cf_pay_slip').click();
                      myStop_check_time_cf_pay_slip();
                    }
              });
          }, 5000);
        }

    });

    function myStop_check_time_cf_pay_slip() {
        clearInterval(loop_check_time_cf_pay_slip);
        // console.log("STOP LOOP");
    }

    const video = document.getElementById('qr-video');
    const canvas = document.createElement('canvas');
    const context = canvas.getContext('2d');

    function start_scanQRCode() {
      navigator.mediaDevices.getUserMedia({
        video: {
          facingMode: 'environment'
        }
      })
      .then(function(stream) {
        videoStream = stream; // เก็บ stream ในตัวแปร global
        video.srcObject = stream;
        video.play();

        scanQRCode();
      });
    }

    function scanQRCode() {
      if (video.readyState === video.HAVE_ENOUGH_DATA) {
        canvas.height = video.videoHeight;
        canvas.width = video.videoWidth;
        context.drawImage(video, 0, 0, canvas.width, canvas.height);
        const imageData = context.getImageData(0, 0, canvas.width, canvas.height);
        const code = jsQR(imageData.data, imageData.width, imageData.height);

        if (code) {
          console.log(code.data);
          alert(code.data);
          return;
        }
      }

      requestAnimationFrame(scanQRCode);
    }

    function stopScanQRCode() {
      if (videoStream) {
        const tracks = videoStream.getTracks();
        tracks.forEach(track => track.stop());
        videoStream = null;
      }
    }


    // อ่าน QR-CODE จากรูปภาพ
    const btnSelectImage = document.getElementById('btnSelectImage');
    const inputImage = document.getElementById('inputImage');

    btnSelectImage.addEventListener('click', () => {
        inputImage.click();
    });

    inputImage.addEventListener('change', (event) => {
        const selectedFile = event.target.files[0];

        if (selectedFile) {
            // ในกรณีที่เลือกไฟล์เสร็จสิ้น
            readQRCode(selectedFile);
        }
    });

    function readQRCode(imageFile) {
        const reader = new FileReader();

        reader.onload = function (e) {
            const img = new Image();
            img.src = e.target.result;

            img.onload = function () {
                const canvas = document.createElement('canvas');
                const context = canvas.getContext('2d');
                canvas.width = img.width;
                canvas.height = img.height;
                context.drawImage(img, 0, 0, img.width, img.height);

                const imageData = context.getImageData(0, 0, canvas.width, canvas.height);
                const code = jsQR(imageData.data, imageData.width, imageData.height);

                if (code) {
                    // ทำอะไรกับข้อมูลจาก QR Code ที่ได้ เช่น alert
                    alert(code.data);
                    // เคลียรูปภาพที่เลือก
                    inputImage.value = "";
                } else {
                    alert('ไม่พบ QR Code');
                }
            };
        };

        reader.readAsDataURL(imageFile);
    }


</script>
@endsection