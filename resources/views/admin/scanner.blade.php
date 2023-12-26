@extends('layouts.theme_admin')

@section('content')

<style>
  #header-text-login {
    width: 45% !important;
    margin-top: 35px;
  }

  .user-img-qr {
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


  .div_alert {
        position: fixed;
        top: -100px;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 50px;
        text-align: center;
        font-family: 'Kanit', sans-serif;
        z-index: 9999;
        font-size: 18px;

    }

    .div_alert span {
        background-color: white;
        border-radius: 10px;
        color: #2DD284;
        padding: 15px;
        font-family: 'Kanit', sans-serif;
        z-index: 9999;
        font-size: 1em;
    }

    .up_down {
        animation-name: slideDownAndUp;
        animation-duration:5s;
    }

    @keyframes slideDownAndUp {
        0% {
            transform: translateY(0);
        }
        10% {
            transform: translateY(120px);
        }
        90% {
            transform: translateY(120px);
        }
        100% {
            transform: translateY(0);
        }
    }
</style>

<div id="alert_success" class="div_alert" role="alert">
    <span id="alert_text">
        <!--  -->
    </span>
</div>

<!-- Button trigger modal -->
<button id="btn_modal_check_activity" type="button" class="d-none" data-toggle="modal" data-target="#modal_check_activity">
    <!--  -->
</button>

<!-- Modal -->
<div class="modal fade" id="modal_check_activity" tabindex="-1" aria-labelledby="Label_modal_check_activity" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="Label_modal_check_activity">โปรดตรวจสอบข้อมูลอีกครั้ง</h5>
                <button id="btn_close_modal_check_activity" type="button" class="close btn" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div id="content_modal_check_activity" class="col-12 text-center">
                        <!-- DATA -->
                    </div>
                    <div class="col-12 text-center mt-4 mb-0">
                        <p>เจ้าหน้าที่ผู้ยืนยัน : {{ Auth::user()->name }}</p>
                    </div>
                </div>
            </div>
            <div id="modal_footer" class="modal-footer text-center">
                <!-- BTN -->
            </div>
        </div>
    </div>
</div>

<div class="w-100 qr-section">
  <div class="card qr-card text-center">

    @php
        $Activity = App\Models\Activity::get();
    @endphp
    <div class="">
        <select name="name_Activity" id="name_Activity" class="form-control" onchange="start_scanQRCode();">
            <option class="text-dark" value="">ชื่อกิจกรรม</option>
            @foreach($Activity as $item)
                <option class="text-dark" value="{{ $item->name_Activities }}">{{ $item->name_Activities }}</option>
            @endforeach
        </select>
    </div>

    <div class=" d-flex justify-content-center w-100 mt-4">
        @if( !empty(Auth::user()->photo) )
            <img src="{{ url('storage')}}/{{ Auth::user()->photo }}" class="user-img-qr" alt="รูปภาพผู้ใช้">
        @else
            <img src="{{ url('/img/icon/profile.png') }}" class="user-img-qr" alt="รูปภาพผู้ใช้">
        @endif
    </div>
    <p class="info-user mt-3 mb-0" data-toggle="modal" data-target="#exampleModalCenter">
        {{ Auth::user()->name }}
    </p>

    <div class="d-flex w-100 justify-content-center mt-4">
        <div class="box" style="--c:#000;--w:40px;--b:2px;--r:20px;">
            <video style="width:100%;" id="qr-video"></video>
        </div>
    </div>
    
  </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/jsqr/dist/jsQR.js"></script>

<script>
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
                // console.log(code.data);

                let name_Activity = document.querySelector('#name_Activity').value ;

                if(name_Activity == "ยืนยันการชำระเงิน"){
                    create_modal(name_Activity , code);
                }

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

    function change_status(account , Staff_id){

        fetch("{{ url('/') }}/api/change_status" + "/" + account + "/" + Staff_id )
            .then(response => response.text())
            .then(result => {
                // console.log(result);
                document.querySelector('#btn_close_modal').click();

                document.querySelector('#alert_text').innerHTML = `
                   <i class="fa-solid fa-check text-success"></i> Success fully !
                `;
                document.querySelector('#alert_success').classList.add('up_down');

                const animated = document.querySelector('.up_down');
                animated.onanimationend = () => {
                    document.querySelector('#alert_success').classList.remove('up_down');
                };
        });
    }


    function create_modal(type , code)
    {
        if(type == "ยืนยันการชำระเงิน"){
            // let type = code.data.split('=')[0]
            let name = code.data.split('=')[1];

            fetch("{{ url('/') }}/api/get_users" + "/" + name )
                .then(response => response.json())
                .then(result => {
                    // console.log(result);
                    let html_modal = `
                        <h4>ยืนยันการเข้าร่วมกิจกรรมของ</h4>
                        <h3 class="text-info">`+result.name+`</h3>
                        <p>ในการเข้าร่วมกิจกรรม .....</p>
                        <h3>`+type+`</h3>
                    `;

                    let html_footer = `
    
                        <button type="button" class="btn btn-primary" onclick="change_status('`+name+`','{{ Auth::user()->id }}')">
                            Confirm
                        </button>
                        <button id="btn_close_modal" type="button" class="btn btn-secondary" data-dismiss="modal">
                            Back
                        </button>
                    `;

                    document.querySelector('#content_modal_check_activity').innerHTML = html_modal;
                    document.querySelector('#modal_footer').innerHTML = html_footer;

                    document.querySelector('#btn_modal_check_activity').click();
            });
        }
    }

</script>

@endsection