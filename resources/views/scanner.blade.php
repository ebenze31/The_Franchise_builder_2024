@extends('layouts.theme_user')

@section('content')
<style>
  #header-text-login {
    width: 45% !important;
    margin-top:5px;
  }

  .user-img {
    width: 110px;
    height: 110px;
  }

  .info-user {
    color: #002449;
    font-weight: bolder;
  }

  .qr-profile {
    width: 200px;
    height: 200px;
    object-fit: contain;
    margin-top: 20px;

  }

  .qr-section {
    position: relative;
    padding: 18px 5px 35px 5px;
  }

  .btn-download {
    background-color: #005CD3;
    padding: 10px 40px;
    width: auto;
    color: #fff;
    border-radius: 5px;
    margin-top: 45px;
    font-size: 14px;
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
    padding: 13px 20px;
  }

  .btn-qr-code.active {
    background-color: #002449 !important;
    color: #fff !important;
  }

  .btn-scan-code {
    padding: 13px 20px;
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
  .btn-cancle {
    border-radius: 5px;
    width: auto;
    font-size: 16px;
    margin-top: 15px;
    padding: 5px 15px;

    background-color: #FF3838;
    color: #fff;
  }
  .btn-submit:hover {
    border: 1px solid #00E0FF;
    box-shadow: 0px 0px 15px 1px #00FBFF;
    color: #fff;

  }.padding-btn{
        padding: 10px 30px !important;
        border-radius: 5px;
    }.detail-event-2-line{
      display: -webkit-box;
  -webkit-box-orient: vertical;
  overflow: hidden;
  -webkit-line-clamp: 2;
    }
    .detail-event-more{
display: block;
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
    }p{
      -webkit-letter-spacing: -1px !important;  
            letter-spacing:-1px !important; 
            -moz-letter-spacing:-1px !important;
            -khtml-letter-spacing:-1px !important;
    }
</style>

<a id="a_to_account_scan" class="d-none"></a>

<!-- modal -->
<button id="btn_modal_cf_pay_slip" class="d-none" data-toggle="modal" data-target="#modal_cf_pay_slip"></button>

<div class="modal fade" id="modal_cf_pay_slip" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered px-4">
        <div class="modal-content">
            <div id="modal_cf_pay_slip_content" class="modal-body text-center pb-0">
              <img src="{{ url('/img/icon/tick.png') }}" style="width:125px;height:125px;" class="mt-2 mb-2">
                <h4 class="text-success mt-3">ยืนยันการเข้าร่วมสำเร็จ !</h4>
                <p class="text-dark">คุณพร้อมเเล้วสำหรับการสร้าง Team work</p>
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

<!-- Button trigger modal -->
<button id="btn_modal_check_activity" type="button" class="d-none" data-toggle="modal" data-target="#modal_check_activity">
    <!--  -->
</button>

<!-- Modal -->
<div class="modal fade" id="modal_check_activity" tabindex="-1" aria-labelledby="Label_modal_check_activity" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content py-3 mx-4">
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
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary d-none" id="btnmodalSuccess" data-toggle="modal" data-target="#modalSuccess">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="modalSuccess" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content mx-4">
      <div class="modal-body">
          <div class="d-flex justify-content-center " style="margin-bottom: 33px;">
            <img src="{{ url('/img/icon/join_success.png') }}" style="width: 113px;height: 84px;flex-shrink: 0;">
          </div>
          <div class="text-center">
            <p class=" mb-1 mt-2 text-center" style="color: #071027;font-size: 14px;font-style: normal;font-weight: bold;line-height: normal;">คุณได้ยืนยันการเข้าร่วมกิจกรรม</p>
            <p id="modalSuccess_name_activity" style="color: #128DFF;font-size: 14px;font-style: normal;font-weight: bold;line-height: normal;"></p>
            <p class=" mb-1 mt-2 text-center" style="color: #071027;font-size: 14px;font-style: normal;font-weight: bold;line-height: normal;">เรียบร้อยแล้ว!</p>
          </div>
          <div class="d-flex justify-content-evenly mb-2">
            <button type="button" class="btn btn-submit" style="padding: 5px 25px;"  data-dismiss="modal">
              Close
            </button>
          </div>
      </div>
    </div>
  </div>
</div>

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

    <div class=" d-flex justify-content-center w-100 mt-4 d-none">
      @if( !empty(Auth::user()->photo) )
      <img src="{{ url('storage')}}/{{ Auth::user()->photo }}" class="user-img" alt="รูปภาพผู้ใช้">
      @else
      <img src="{{ url('/img/icon/profile.png') }}" class="user-img" alt="รูปภาพผู้ใช้">
      @endif

    </div>
    <h5 class="info-user mt-3 mb-0" data-toggle="modal" data-target="#exampleModalCenter"><b>{{ Auth::user()->name }}</b> </h5>
    <p class="text-secondary mt-1">ID : {{ Auth::user()->account }}</p>

    <div class="tab-content " id="pills-tabContent">
      <div class="tab-pane fade show active text-white" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
        <div class="d-flex justify-content-center w-100">
          <img src="{{ url('/img/qr_profile')}}/{{ Auth::user()->qr_profile }}" class="qr-profile" alt="รูปภาพ QR Code">
        </div>
        <a href="{{ url('/img/qr_profile')}}/{{ Auth::user()->qr_profile }}" class="btn btn-download" download>
          Download
        </a>
      </div>
      <div class="tab-pane fade text-white mt-4" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
        <div class="d-flex w-100 justify-content-center mb-5">
          <div class="box" style="--c:#000;--w:40px;--b:2px;--r:20px;">
            <video style="width:100%;" id="qr-video" muted></video>
          </div>
        </div>
        <style>
      .btn-edit-img{
        
        /* background-color: #15093F; */
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 50%;
        position: absolute;
        bottom: 10px;
        right: 10px;
      }.btn-edit-img img{
        width: 38px !important;
        height: 38px !important;
        object-fit: contain;
      }
    </style>
    <button class="btn btn-edit-img" id="btnSelectImage">
        <img src="{{ url('/img/icon/edit-img.png') }}" alt="">
        
    </button>
    <input type="file" accept="image/*" style="display:none" id="inputImage" />

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

    var loop_check_time_cf_pay_slip ;

    document.addEventListener('DOMContentLoaded', (event) => {
        // console.log("START");

        change_menu_bar('scan');

        check_url();

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

    function check_url(){

      let full_url = "{{ url()->full() }}";
      let url_0 = full_url.split("?Activities=")[0];
      let url_1 = full_url.split("?Activities=")[1];
          name_activity = decodeURIComponent(url_1);

      let url = url_0 + "?Activities=" + name_activity ;
      // console.log(url);

      let code = [];
      code['data'] = url ;
      // console.log(code['data']);

      if(code.data){

      // console.log(code.data);
      // https://www.franchisebuilder2024.com/for_Activities?Activities=วิ่ง_วิ่ง_วิ่ง
      let type = code.data.split('=')[0];
          type = type.split('?')[1];

      let name = code.data.split('=')[1];

        if(name){
          name = name.replaceAll("_"," ");
        }else{
          document.querySelector('#btn_modal_worng_qrcode').click();
        }

      // console.log(type);
      // console.log(name);

      if(type == "Activities"){

          let for_url = name.replaceAll(" " , "_");

          fetch("{{ url('/') }}/api/check_user_join_activity"+'/'+"{{ Auth::user()->account }}"+ "/" + for_url )
            .then(response => response.json())
            .then(result => {
                // console.log(result.check);

                // ผู้ใช้เคยเข้าร่วมกิจจกรรมนี้แล้ว
                if(result.check == 'joined'){
                    create_modal_Activies('joined' , code , name);
                }
                else if(result.check == 'For Team Ready'){
                    create_modal_Activies('For_Team_Ready' , code , name);
                }
                else{
                    // ไม่เคยเข้าร่วมกิจจกรรมนี้
                    create_modal_Activies(name , code , null);
                }

                let newUrl = "{{ url('/scanner') }}";  // เปลี่ยนเป็น URL ที่คุณต้องการ
                history.pushState(null, null, newUrl);
          });
      }
      else if(type == "account"){
          document.querySelector('#a_to_account_scan').setAttribute('href' , 'https://www.franchisebuilder2024.com/for_scan?account='+name);
          document.querySelector('#a_to_account_scan').click();
      }
  }else{
      // console.log('สแกนใหม่');
      start_scanQRCode();
  }

  return;

    }

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

                // console.log(code.data);
                // https://www.franchisebuilder2024.com/for_Activities?Activities=test_1
                let type = code.data.split('=')[0];
                    type = type.split('?')[1];

                let name = code.data.split('=')[1];

                  if(name){
                    name = name.replaceAll("_"," ");
                  }else{
                    document.querySelector('#btn_modal_worng_qrcode').click();
                  }

                // console.log(type);
                // console.log(name);

                if(type == "Activities"){

                    let for_url = name.replaceAll(" " , "_");

                    fetch("{{ url('/') }}/api/check_user_join_activity"+'/'+"{{ Auth::user()->account }}"+ "/" + for_url )
                      .then(response => response.json())
                      .then(result => {
                          // console.log(result.check);

                          // ผู้ใช้เคยเข้าร่วมกิจจกรรมนี้แล้ว
                          if(result.check == 'joined'){
                              create_modal_Activies('joined' , code , name);
                          }
                          else if(result.check == 'For Team Ready'){
                              create_modal_Activies('For_Team_Ready' , code , name);
                          }
                          else{
                              // ไม่เคยเข้าร่วมกิจจกรรมนี้
                              create_modal_Activies(name , code , null);
                          }
                    });
                }
                else if(type == "account"){
                    document.querySelector('#a_to_account_scan').setAttribute('href' , 'https://www.franchisebuilder2024.com/for_scan?account='+name);
                    document.querySelector('#a_to_account_scan').click();
                }
            }else{
                // console.log('สแกนใหม่');
                start_scanQRCode();
            }

            return;
        }else{

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

                  inputImage.value = "";

                  if(code.data){

                      console.log(code.data);
                      let type = code.data.split('=')[0];
                          type = type.split('?')[1];

                      let name = code.data.split('=')[1];

                        if(name){
                          name = name.replaceAll("_"," ");
                        }else{
                          document.querySelector('#btn_modal_worng_qrcode').click();
                        }

                      // console.log(type);
                      // console.log(name);

                      if(type == "Activities"){

                            let for_url = name.replaceAll(" " , "_");

                            fetch("{{ url('/') }}/api/check_user_join_activity"+'/'+"{{ Auth::user()->account }}"+ "/" + for_url )
                              .then(response => response.json())
                              .then(result => {
                                  // console.log(result.check);

                                  // ผู้ใช้เคยเข้าร่วมกิจจกรรมนี้แล้ว
                                  if(result.check == 'joined'){
                                      create_modal_Activies('joined' , code , name);
                                  }
                                  else if(result.check == 'For Team Ready'){
                                      create_modal_Activies('For_Team_Ready' , code , name);
                                  }
                                  else{
                                      // ไม่เคยเข้าร่วมกิจจกรรมนี้
                                      create_modal_Activies(name , code , null);
                                  }
                            });
                        }
                        else if(type == "account"){
                            document.querySelector('#a_to_account_scan').setAttribute('href' , 'https://www.franchisebuilder2024.com/for_scan?account='+name);
                            document.querySelector('#a_to_account_scan').click();
                        }
                    }else{
                        // console.log('สแกนใหม่');
                        alert('ไม่พบ QR Code');
                        start_scanQRCode();
                    }
                    return;
                }else{
                    alert('ไม่พบ QR Code');
                }
            };
        };

        reader.readAsDataURL(imageFile);
    }

    function create_modal_Activies(type , code , name_for_joined)
    {
        if(type == "รับเสื้อ"){
            let name = code.data.split('=')[1];
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

              <button type="button" class="btn btn-submit padding-btn  mt-4" onclick="cf_shirt_size('`+"{{ Auth::user()->account }}"+`')">
                  Confirm
              </button>
              <button id="btn_close_modal" type="button" class="btn btn-secondary padding-btn mt-4" data-dismiss="modal" onclick="start_scanQRCode();">
                  Back
              </button>
            `;

            document.querySelector('#content_modal_check_activity').innerHTML = html_modal;
            document.querySelector('#modal_footer').innerHTML = html_footer;
            document.querySelector('#modal_footer').classList.remove('d-none');

            document.querySelector('#btn_modal_check_activity').click();
        }
        else if(type == "joined"){
            // let html_modal = `
            //     <img src="{{ url('/img/icon/sorry.png')}}" style="width: 100px;height:100px">
            //     <br>
            //     <h4 class="mt-3 text-danger">คุณได้เข้าร่วมกิจกรรม (`+name_for_joined+`) เเล้ว !</h4>
            // `;

            let html_modal = `
                <div class="d-flex justify-content-center " style="margin-bottom: 20px;">
                    <img src="{{ url('/img/icon/warn.png') }}" style="height: 120px;flex-shrink: 0;">
                </div>
                <div class="text-center">
                    <p class=" mb-1 mt-4 text-center" style="color: #071027;font-size: 14px;font-style: normal;font-weight: bold;line-height: normal;">คุณได้เข้าร่วมกิจกรรม</p>
                    <p style="color: #128DFF;font-size: 14px;font-style: normal;font-weight: bold;line-height: normal;">`+name_for_joined+`</p>
                    <p class=" mb-1 mt-2 text-center" style="color: #071027;font-size: 14px;font-style: normal;font-weight: bold;line-height: normal;">เรียบร้อยแล้ว!</p>
                </div>
            `;

            let html_footer = `
                <button style="padding:10px 30px;" id="btn_close_modal" type="button" class="btn btn-submit" data-dismiss="modal" onclick="start_scanQRCode();">
                    Close
                </button>
            `;

            document.querySelector('#content_modal_check_activity').innerHTML = html_modal;
            document.querySelector('#modal_footer').innerHTML = html_footer;
            document.querySelector('#modal_footer').classList.remove('d-none');

            document.querySelector('#btn_modal_check_activity').click();
        }
        else if(type == "For_Team_Ready"){
            // let html_modal = `
            //     <img src="{{ url('/img/icon/sorry.png')}}" style="width: 100px;height:100px">
            //     <br>
            //     <h4 class="mt-3 text-danger">ขออภัย คุณ `+"{{ Auth::user()->name }}"+`</h4>
            //     <p>กิจกรรมนี้สงวนสิทธิ์สำหรับทีมที่มีสมาชิกครบแล้วเท่านั้น</p>
            // `;

            let html_modal = `
                <div class="d-flex justify-content-center " style="margin-bottom: 20px;">
                  <img src="{{ url('/img/icon/cry.png') }}" style="width: 90px;height: 90px;flex-shrink: 0;">
                </div>
                <p class="m-2" style="color: #128DFF;text-align: center;font-size: 16px;font-style: normal;font-weight: 400;line-height: normal;">
                  ขออภัย !  
                </p>
                <p class=" mb-1 mt-2 text-center" style="color: #071027;font-size: 14px;font-style: normal;font-weight: 400;line-height: normal;">
                  กิจกรรมนี้สงวนสิทธิ์เฉพาะผู้เล่นที่อยู่ใน <br>
                  ทีมที่มีสมาชิกครบ 10 คนแล้่วเท่านั้น
                </p>
                <div class="d-flex justify-content-evenly mb-2">
                  <button type="button" class="btn btn-submit" style="padding:10px 30px;"  data-dismiss="modal" onclick="start_scanQRCode();">
                    Close
                  </button>
                </div>
            `;

            // let html_footer = `
            //     <button id="btn_close_modal" style="padding: 5px; 25px;" type="button" class="btn btn-submit" data-dismiss="modal" onclick="start_scanQRCode();">
            //         Close
            //     </button>
            // `;

            let html_footer = ``;

            document.querySelector('#content_modal_check_activity').innerHTML = html_modal;
            // document.querySelector('#modal_footer').innerHTML = html_footer;
            document.querySelector('#modal_footer').classList.add('d-none');

            document.querySelector('#btn_modal_check_activity').click();
        }
        else{

            let name = code.data.split('=')[1];
            let for_url = type.replaceAll(" " , "_");

            fetch("{{ url('/') }}/api/get_activity" + "/" + for_url )
                .then(response => response.json())
                .then(result => {
                    // console.log(result);

                    if(result){

                      // let html_modal = `
                      //   <img src="{{ url('storage')}}/`+result.icon+`" style="width: 120px;height: 120px;flex-shrink: 0;">
                      //    <h4 class="mt-3" style="color: #000;font-size: 16px;font-style: normal;font-weight: 700;line-height: normal;">ยืนยันการเข้าร่วมกิจกรรม</h4>
                      //   <h3 class="my-4" style="color: #000;font-size: 16px;font-style: normal;font-weight: 600;line-height: normal;">`+type+`</h3>
                      //   <br>
                      // `;

                      let html_modal = `
                        <div class="d-flex justify-content-center text-center">
                          <img src="{{ url('storage')}}/`+result.icon+`" style="width: 120px;height: 120px;flex-shrink: 0;">
                        </div>
                        <div class="text-center">

                          <p class=" mb-1 mt-4 text-center" style="color: #071027;font-size: 14px;font-style: normal;font-weight: bold;line-height: normal;">
                          ยืนยันการเข้าร่วม
                          </p>
                          <p class="text-center mb-2" style="color: #128DFF;">`+type+`</p>
                          <p class="detail-event-2-line" id="detail-event">`+result.detail+`</p>

                          <a class="see_more" onclick="document.querySelector('#detail-event').classList.toggle('detail-event-2-line'); document.querySelector('#detail-event').classList.toggle('detail-event-more');">ดูรายละเอียดเพิ่มเติม</a>
                        </div>
                      `;

                      let html_footer = `
                          <div class="d-flex justify-content-evenly mb-2">
                            <button id="btn_close_modal" style="padding:10px 30px;" type="button padding-btn" class="btn btn-cancle" data-dismiss="modal" onclick="start_scanQRCode();">
                              Cancle
                            </button>
                            <button type="button" class="btn btn-submit" style="padding:10px 30px;" data-dismiss="modal"  mt-4" onclick="cf_Activities('`+"{{ Auth::user()->id }}"+`' , '`+type+`')">
                            Join
                            </button>
                          </div>
                      `;

                      

                      document.querySelector('#content_modal_check_activity').innerHTML = html_modal;
                      document.querySelector('#modal_footer').innerHTML = html_footer;
                      document.querySelector('#modal_footer').classList.remove('d-none');

                      document.querySelector('#btn_modal_check_activity').click();

                    }
              });

        }

    }

    function cf_Activities(user_id , name_Activities){

      // console.log('cf_Activities');
      // console.log(user_id);
      // console.log(name_Activities);

        let text_show = name_Activities ;
        name_Activities = name_Activities.replaceAll(" ","_");

        fetch("{{ url('/') }}/api/cf_Activities" + "/" + user_id + "/" + name_Activities )
            .then(response => response.text())
            .then(result => {
              // console.log(result);

                if(result){
                    document.querySelector('#btn_close_modal').click();

                    document.querySelector('#modalSuccess_name_activity').innerHTML = text_show ;
                    // modal success
                    document.querySelector('#btnmodalSuccess').click();
                    start_scanQRCode();
                }
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

        // console.log(account);
        // console.log(Title_value);

        fetch("{{ url('/') }}/api/cf_shirt_size" + "/" + account + "/" + Title_value )
            .then(response => response.text())
            .then(result => {
                // console.log(result);
                // console.log(result);
                document.querySelector('#btn_close_modal').click();
                  
                document.querySelector('#modalSuccess_name_activity').innerHTML = "รับเสื้อ" ;
                // modal success
                document.querySelector('#btnmodalSuccess').click();
                start_scanQRCode();
        });
    }
</script>
@endsection