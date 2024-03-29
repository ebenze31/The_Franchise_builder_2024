@extends('layouts.theme_login')

@section('content')

<style>
  #header-text-login {
    width: 45% !important;
    margin-top: 35px;
  }

  .user-img-qr {
    width: 83px;
    height: 83px;
    border-radius: 50%;
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
    padding: 18px 35px 15px 35px;
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
    height: 100%;
    object-fit: cover;
    width: 97.5%;
    border-radius: 15px;
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
    overflow: hidden;
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
        z-index: 9999;
        font-size: 18px;

    }

    .div_alert span {
        background-color: white;
        border-radius: 10px;
        color: #2DD284;
        padding: 15px;
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
    }.form-control  {
        background: #002449 !important;
        border: 3px solid rgb(84, 73, 116);
        font-size: large;
        color: #fff !important;


    }.btn-submit{
        padding: 5px 25px;
      border-radius: 5px;
      font-size: 16px;
      background-color: #005CD3;
      color: #fff;
    }
    .btn-submit:hover{
      border: 1px solid #00E0FF;
      box-shadow: 0px 0px 15px 1px #00FBFF;
      color: #fff;

    }
    .btn-cancle {
        border-radius: 5px;
        width: auto;
        font-size: 16px;
        padding: 5px 15px;
        background-color: #686666;
        color: #fff;
      }

      .see_more{
      color: #898989;

        text-align: center;
        font-size: 10px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
        text-decoration-line: underline;
    }
      .text-team-10-staff{
        color: #071027;
        text-align: center;
        font-size: 14px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
        margin: 0px;
      }
    
    .padding-btn{
        padding: 10px 30px !important;
        border-radius: 5px;
    }

    .btn-logout {
        color: rgb(244, 244, 244, .7);
        border: 1px solid rgb(244, 244, 244, .7);
        -webkit-border-radius: 50px;    
        border-radius: 50px; 
        -moz-border-radius:50px;
        -khtml-border-radius:50px;
        font-size: 12px;
        display: flex;
        align-items: center;
    }

    .btn-logout i {
        font-size: 15px;
        margin-top: -12px;
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
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content py-3 mx-5">
            <div class="modal-body">
                <div class="row">
                    <div id="content_modal_check_activity" class="col-12 text-center">
                        <!-- DATA -->
                    </div>
                </div>
            </div>
            <div id="modal_footer" class="text-center mb-3">
                <!-- BTN -->
        
            </div>
        </div>
    </div>
</div>

<div class="w-100 qr-section">
  <div class="card qr-card text-center">

    @php
        $Activity = App\Models\Activity::where('show_staff' , 'Yes')->get();
    @endphp
    <div class="" style="position: relative;">
        <i style="position: absolute;top:50%; right:5%;" class="fa-solid fa-chevron-down fa-xl text-white"></i>
        <select name="name_Activity" id="name_Activity" class="form-control" onchange="keep_name_Activity();start_scanQRCode();">
            @if( !empty(Auth::user()->scan_qr_for) )
            <option class="text-white text-center" value="{{ Auth::user()->scan_qr_for }}">{{ Auth::user()->scan_qr_for }}</option>
            @else
            <option class="text-white text-center" value="">กรุณาเลือกกิจกรรม</option>
            @endif

            @foreach($Activity as $item)
                @if( Auth::user()->scan_qr_for != $item->name_Activities )
                <option class="text-white text-center" value="{{ $item->name_Activities }}">{{ $item->name_Activities }}</option>
                @endif
            @endforeach
        </select>
    </div>

    <div class=" d-flex justify-content-center w-100 mt-4 d-none">
        @if( !empty(Auth::user()->photo) )
            <img src="{{ url('storage')}}/{{ Auth::user()->photo }}" class="user-img-qr" alt="รูปภาพผู้ใช้">
        @else
            <img src="{{ url('/img/icon/profile.png') }}" class="user-img-qr" alt="รูปภาพผู้ใช้">
        @endif
    </div>
    <p class="info-user mt-3 mb-0">
        {{ Auth::user()->name }}
    </p>
    <p class="info-user text-secondary">
        ID : {{ Auth::user()->id }}
    </p>
    <div id="div_video" class="d-flex w-100 justify-content-center mt-4">
        <div class="box" style="--c:#000;--w:40px;--b:2px;--r:20px;">
            <video style="width:100%;" id="qr-video" muted></video>
        </div>
    </div>
    
  </div>
</div>

<div class="d-flex justify-content-center w-100">
    <a class="btn btn-logout" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
        <img src="{{ url('/img/icon/Logo-logout.png') }}" alt="" width="15" height="15"> &nbsp;logout
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
</div>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary d-none" id="btnmodalSuccess" data-toggle="modal" data-target="#modalSuccess">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="modalSuccess" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body p-5">
            <center>
                <img src="{{ url('/img/icon/success.png') }}" alt="" width="87" height="87">
                <h6 class="" style="font-weight: bolder;margin:50px 0 10px 0 ">ยืนยันการเข้าร่วมกิจกรรมสำเร็จ !</h6>
                <button type="button" class="btn btn-submit padding-btn" data-dismiss="modal" onclick="start_scanQRCode();">Close</button>
            </center>
      </div>
    </div>
  </div>
</div>
<!-- Button trigger modal -->
<button id="btn_modal_worng_qrcode" type="button" class="btn btn-primary d-none" data-toggle="modal" data-target="#modal_worng_qrcode">
  <!-- Launch demo modal -->
</button>

<!-- modal สแกนผิด -->
<div class="modal fade" id="modal_worng_qrcode" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content modal-border modal-success mx-4" style="border-radius: 10px;">
      <div class="modal-body px-2">
        <!-- <div class="d-flex justify-content-center my-4">
          <img src="{{ url('/img/icon/qrcode_worng.png') }}" style="width: 100px;height:100px">
        </div> -->
        <h4 class="modal-title text-center pb-2 header-upload-success mb-2 text-danger" id="exampleModalLabel">QR code ของคุณไม่ถูกต้อง </h4>
        <!-- <p class="detail-upload-success mb-4 text-center">
            QR Code ไม่ถูกต้อง กรุณาสแกน QR Code<br> ที่ The Franchise builder สร้างขึ้นเท่านั้น
        </p> -->
        <p class="detail-upload-success mb-4 text-center">
          กรุณาใช้ QR code ภายในกิจกรรมเท่านั้น
        </p>
        <div class="d-flex justify-content-center">

        <button type="button" class="btn btn-submit padding-btn" data-dismiss="modal"  onclick="start_scanQRCode();">
          Close
        </button>
          
        </div>
      </div>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/jsqr/dist/jsQR.js"></script>

<script>

    @if( !empty(Auth::user()->scan_qr_for) )
       start_scanQRCode();  
    @endif

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
            video.setAttribute("playsinline", true);
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

                if(code.data){
                  // console.log.log(code.data);

                    let name_Activity = document.querySelector('#name_Activity').value ;

                    let check_account = code.data.split('=')[1];
                    if(check_account){
                        // console.log(check_account);

                        let for_url = name_Activity.replaceAll(" " , "_");

                        fetch("{{ url('/') }}/api/check_user_join_activity"+'/'+check_account+ "/" + for_url )
                            .then(response => response.json())
                            .then(result => {
                                // console.log(result);

                                // ผู้ใช้เคยเข้าร่วมกิจจกรรมนี้แล้ว
                                if(result.check == 'joined'){
                                    create_modal('joined' , code , result.name_user);
                                }
                                else if(result.check == 'For Team Ready'){
                                    create_modal('For_Team_Ready' , code , result.name_user);
                                }
                                else{
                                    // ไม่เคยเข้าร่วมกิจจกรรมนี้
                                    if(name_Activity == "ยืนยันการชำระเงิน"){
                                        create_modal(name_Activity , code , null);
                                        // document.querySelector('#div_video').classList.add('d-none');
                                    }
                                    else if(name_Activity == "รับเสื้อ"){
                                        create_modal(name_Activity , code , null);
                                        // document.querySelector('#div_video').classList.add('d-none');
                                    }
                                    else{
                                        create_modal(name_Activity , code , null);
                                    }
                                }
                        });
                    }
                }else{
                    // console.log('สแกนใหม่');
                    start_scanQRCode();
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

                // modal success
                document.querySelector('#btnmodalSuccess').click();
                start_scanQRCode();

                // document.querySelector('#alert_text').innerHTML = `
                //    <i class="fa-solid fa-check text-success"></i> Success fully !
                // `;
                // document.querySelector('#alert_success').classList.add('up_down');

                // const animated = document.querySelector('.up_down');
                // animated.onanimationend = () => {
                //     document.querySelector('#alert_success').classList.remove('up_down');
                // };
        });
    }


    function create_modal(type , code , name_user)
    {
        let check_name = code.data.split('=')[1];
        if(!check_name){
            document.querySelector('#btn_modal_worng_qrcode').click();
        }
        else{
            if(type == "ยืนยันการชำระเงิน"){
                // let type = code.data.split('=')[0]
                // let name = code.data.split('=')[1];
                let name = code.data.split('=')[1];

                fetch("{{ url('/') }}/api/get_users" + "/" + name )
                    .then(response => response.json())
                    .then(result => {
                        // console.log(result);
                        let html_modal = `
                            <h4 class="mt-3" style="color: #000;font-size: 16px;font-style: normal;font-weight: 700;line-height: normal;">ยืนยันการเข้าร่วมกิจกรรมของ</h4>
                            <h3 class="my-4" style="color: #38D7D7;font-size: 16px;font-style: normal;font-weight: 600;line-height: normal;">`+result.name+`</h3>
                            <p style="font-size: 12px;color: #002449;font-style: normal;font-weight: 400;line-height: normal;">ในการเข้าร่วมกิจกรรม .....</p>
                            <h3 style="color: #002449;font-size: 16px;font-style: normal;font-weight: 400;line-height: normal;">`+type+`</h3>
                        `;

                        let html_footer = `
        
                            <button type="button" class="btn btn-submit padding-btn" onclick="change_status('`+name+`','{{ Auth::user()->id }}')">
                                Confirm
                            </button>
                            <button id="btn_close_modal" type="button" class="btn btn-secondary padding-btn" data-dismiss="modal">
                                Back
                            </button>
                        `;

                        document.querySelector('#content_modal_check_activity').innerHTML = html_modal;
                        document.querySelector('#modal_footer').innerHTML = html_footer;

                        document.querySelector('#btn_modal_check_activity').click();
                });
            }
            else if(type == "รับเสื้อ"){
                let name = code.data.split('=')[1];

                fetch("{{ url('/') }}/api/get_users" + "/" + name )
                    .then(response => response.json())
                    .then(result => {
                        // console.log(result);
                        let html_modal = `
                            <h4 class="mt-3" style="color: #000;font-size: 16px;font-style: normal;font-weight: 700;line-height: normal;">ยืนยันการเข้าร่วมกิจกรรม</h4>
                            <h3 class="my-4" style="color: #000;font-size: 16px;font-style: normal;font-weight: 600;line-height: normal;">`+type+`</h3>
                            <br>
                            <div class="mx-2 py-3" style="background-color: #090823;border-radius: 5px;">
                                <h4 class="text-white" style="font-weight: lighter;">Title</h4>
                                <div class="w-100 ">
                                    <div class="row px-3 text-white">
                                        <div class="col-4 my-2">
                                            <input type="radio" value="XS(36)" id="XS(36)"  name="Title"/>&nbsp;<label for="XS(36)">XS(36)</label>
                                        </div>
                                        <div class="col-4 my-2">
                                            <input type="radio" value="S(38)" id="S(38)"  name="Title"/>&nbsp;<label for="S(38)">S(38)</label>
                                        </div>
                                        <div class="col-4 my-2">
                                            <input type="radio" value="M(40)" id="M(40)"  name="Title"/>&nbsp;<label for="M(40)">M(40)</label>
                                        </div>
                                        <div class="col-4 my-2">
                                            <input type="radio" value="L(42)" id="L(42)"  name="Title"/>&nbsp;<label for="L(42)">L(42)</label>
                                        </div> 
                                        <div class="col-4 my-2">
                                            <input type="radio" value="XL(44)" id="XL(44)"  name="Title"/>&nbsp;<label for="XL(44)">XL(44)</label>
                                        </div>
                                        <div class="col-4 my-2">
                                            <input type="radio" value="2XL(46)" id="2XL(46)"  name="Title"/>&nbsp;<label for="2XL(46)">2XL(46)</label>
                                        </div>
                                        <div class="col-4 my-2">
                                            <input type="radio" value="3XL(48)" id="3XL(48)"  name="Title"/>&nbsp;<label for="3XL(48)">3XL(48)</label>
                                        </div>
                                        <div class="col-4 my-2">
                                            <input type="radio" value="4XL(50)" id="4XL(50)"  name="Title"/>&nbsp;<label for="4XL(50)">4XL(50)</label>
                                        </div>
                                        <div class="col-4 my-2">
                                            <input type="radio" value="5XL(52)" id="5XL(52)"  name="Title"/>&nbsp;<label for="5XL(52)">5XL(52)</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `;

                        let html_footer = `
        
                            <button type="button" class="btn btn-submit padding-btn" onclick="cf_shirt_size('`+name+`')">
                                Confirm
                            </button>
                            <button id="btn_close_modal" type="button" class="btn btn-secondary padding-btn" data-dismiss="modal">
                                Back
                            </button>
                        `;

                        document.querySelector('#content_modal_check_activity').innerHTML = html_modal;
                        document.querySelector('#modal_footer').innerHTML = html_footer;

                        document.querySelector('#btn_modal_check_activity').click();
                });
            }
            else if(type == "joined"){
                // let html_modal = `
                //     <img src="{{ url('/img/icon/sorry.png')}}" style="width: 100px;height:100px">
                //     <br>
                //     <h4 class="mt-3 text-danger">คุณ (`+name_user+`) ได้เข้าร่วมกิจกรรมนี้เเล้ว !</h4>
                // `;

                // <div class="text-center">
                //         <p class=" mb-1 mt-2 text-center" style="color: #071027;font-size: 14px;font-style: normal;font-weight: bold;line-height: normal;">คุณได้เข้าร่วมกิจกรรม</p>
                //         <p class="m-0" style="color: #128DFF;font-size: 14px;font-style: normal;font-weight: bold;line-height: normal;">`+nameActivity+`</p>
                //         <p class=" mb-1 mt-2 text-center" style="color: #071027;font-size: 14px;font-style: normal;font-weight: bold;line-height: normal;">เรียบร้อยแล้ว!</p>
                //     </div>

                let nameActivity = document.querySelector('#name_Activity').value ;

                let html_modal = `
                    <div class="d-flex justify-content-center " style="margin-bottom: 20px;">
                        <img src="{{ url('/img/icon/happiness.png') }}" style="height: 120px;flex-shrink: 0;">
                    </div>
                    <div class="text-center">
                        <p class=" mb-1 mt-4 text-center" style="color: #FF3838;font-size: 14px;font-style: normal;font-weight: bold;line-height: normal;">คุณได้เข้าร่วมกิจกรรม</p>
                        <p style="color: #128DFF;font-size: 14px;font-style: normal;font-weight: bold;line-height: normal;">`+nameActivity+`</p>
                        <p class=" mb-0 mt-2 text-center" style="color: #FF3838;font-size: 14px;font-style: normal;font-weight: bold;line-height: normal;">เรียบร้อยแล้ว!</p>
                    </div>
                `;

                let html_footer = `
                    <button id="btn_close_modal" type="button padding-btn" class="btn btn-cancle" data-dismiss="modal" onclick="start_scanQRCode();">
                        Close
                    </button>

                    <button id="btn_close_modal" type="button" class="btn btn-cancle" data-dismiss="modal" onclick="start_scanQRCode();">
                        Close
                    </button>
                `;

                document.querySelector('#content_modal_check_activity').innerHTML = html_modal;
                document.querySelector('#modal_footer').innerHTML = html_footer;

                document.querySelector('#btn_modal_check_activity').click();
            }
            else if(type == "For_Team_Ready"){
                // let html_modal = `
                //     <img src="{{ url('/img/icon/sorry.png')}}" style="width: 100px;height:100px">
                //     <br>
                //     <h4 class="mt-3 text-danger">ขออภัย คุณ `+name_user+`</h4>
                //     <p>กิจกรรมนี้สงวนสิทธิ์สำหรับทีมที่มีสมาชิกครบแล้วเท่านั้น</p>

                // `;

                let html_modal = `
                    <div class="d-flex justify-content-center " style="margin-bottom: 20px;">
                      <img src="{{ url('/img/icon/sed.png') }}" style="width: 90px;height: 90px;flex-shrink: 0;">
                    </div>
                    <div class="text-center">
                        <p class="m-2" style="color: #FF3838;text-align: center;font-size: 16px;font-style: normal;font-weight: 400;line-height: normal;">
                            ขออภัย `+"{{ Auth::user()->name }}"+`  
                        </p>
                        <p class="text-team-10-staff">คุณ <span id="" style="color: #128DFF;">`+name_user+`</span></p>
                        <p class="mb-1 mt-2 text-center" style="color: #071027;font-size: 14px;font-style: normal;font-weight: 400;line-height: normal;">
                        กิจกรรมนี้สงวนสิทธิ์เฉพาะผู้เล่นที่อยู่ใน <br>
                        ทีมที่มีสมาชิกครบ 10 คนแล้่วเท่านั้น
                        </p>
                    </div>
                `;

                let html_footer = `
                    <button id="btn_close_modal" type="button padding-btn" class="btn btn-cancle" data-dismiss="modal" onclick="start_scanQRCode();">
                        Close
                    </button>
                `;

                document.querySelector('#content_modal_check_activity').innerHTML = html_modal;
                document.querySelector('#modal_footer').innerHTML = html_footer;

                document.querySelector('#btn_modal_check_activity').click();
            }
            else{
                let name = code.data.split('=')[1];

                fetch("{{ url('/') }}/api/get_users" + "/" + name )
                    .then(response => response.json())
                    .then(result => {
                        // console.log(result);

                    let for_url = type.replaceAll(" " , "_");

                    fetch("{{ url('/') }}/api/get_activity" + "/" + for_url )
                        .then(response => response.json())
                        .then(data_activity => {
                          console.log(data_activity);

                            if(data_activity){
                                // let html_modal = `
                                //     <h4 class="mt-3">ยืนยันการเข้าร่วมกิจกรรม</h4>
                                //     <h3>`+type+`</h3>
                                //     <br>
                                //     <img src="{{ url('storage')}}/`+data_activity.icon+`" style="width: 100px;height:100px">
                                // `;

                                let html_modal = `
                                    <div class="d-flex justify-content-center text-center">
                                      <img src="{{ url('storage')}}/`+data_activity.icon+`" style="width: 120px;height: 120px;flex-shrink: 0;">
                                    </div>
                                    <div class="text-center">

                                      <p class=" mb-1 mt-2 text-center" style="color: #071027;font-size: 14px;font-style: normal;font-weight: bold;line-height: normal;">
                                      ยืนยันการเข้าร่วม
                                      </p>
                                      <p class="text-center mb-1" style="color: #128DFF;">`+type+`</p>
                                      <p class="detail-event-2-line m-0" id="detail-event">`+data_activity.detail+`</p>

                                      <a class="see_more" onclick="document.querySelector('#detail-event').classList.toggle('detail-event-2-line'); document.querySelector('#detail-event').classList.toggle('detail-event-more');">ดูรายละเอียดเพิ่มเติม</a>
                                    </div>
                                `;

                                let html_footer = `
                                    <div class="d-flex justify-content-evenly mb-2">
                                        <button type="button"  style="width: 112px;" class="btn btn-submit" style="padding: 5px 15px;" data-dismiss="modal"  onclick="cf_Activities('`+result.id+`' , '`+type+`')">
                                        Confirm
                                        </button>
                                        <button id="btn_close_modal"  style="width: 112px;" type="button padding-btn" class="btn btn-cancle" data-dismiss="modal" onclick="start_scanQRCode();">
                                            Cancle
                                        </button>
                                    </div>
                                `;

                                document.querySelector('#content_modal_check_activity').innerHTML = html_modal;
                                document.querySelector('#modal_footer').innerHTML = html_footer;

                                document.querySelector('#btn_modal_check_activity').click();
                            }
                    });

                    
                });
            }
        }
        
    }

    function cf_Activities(user_id , name_Activities){

      // console.log.log(user_id);
      // console.log.log(name_Activities);
        
        let text_show = name_Activities ;
        name_Activities = name_Activities.replaceAll(" ","_");

        fetch("{{ url('/') }}/api/cf_Activities" + "/" + user_id + "/" + name_Activities )
            .then(response => response.text())
            .then(result => {
              // console.log.log(result);

                if(result){
                    document.querySelector('#btn_close_modal').click();
                    // modal success
                    document.querySelector('#btnmodalSuccess').click();
                    // start_scanQRCode();
                }
        });
    }

    function keep_name_Activity(){

        let name_Activity = document.querySelector('#name_Activity').value ;

        fetch("{{ url('/') }}/api/keep_name_Activity/" + name_Activity + "/" + "{{ Auth::user()->id }}")
            .then(response => response.text())
            .then(result => {
                // console.log(result);
        });
    }

    function cf_shirt_size(account){

        let Title = document.querySelectorAll('input[name="Title"]');
        let Title_value = "" ;
            Title.forEach(Title => {
                if(Title.checked){
                    Title_value = Title.value;
                }
            })
        fetch("{{ url('/') }}/api/cf_shirt_size" + "/" + account + "/" + Title_value )
            .then(response => response.text())
            .then(result => {
                // console.log(result);
                // console.log(result);
                document.querySelector('#btn_close_modal').click();

                // modal success
                document.querySelector('#btnmodalSuccess').click();
                // start_scanQRCode();
                
                // document.querySelector('#alert_text').innerHTML = `
                //    <i class="fa-solid fa-check text-success"></i> Success fully !
                // `;
                // document.querySelector('#alert_success').classList.add('up_down');

                // const animated = document.querySelector('.up_down');
                // animated.onanimationend = () => {
                //     document.querySelector('#alert_success').classList.remove('up_down');
                // };
        });
    }

</script>

@endsection