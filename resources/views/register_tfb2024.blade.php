@extends('layouts.theme_login')

@section('content')

<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.js" integrity="sha512-9KkIqdfN7ipEW6B6k+Aq20PV31bjODg4AA52W+tYtAE0jE0kMx49bjJ3FgvS56wzmyfMUHbQ4Km2b7l9+Y/+Eg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.css" integrity="sha512-bs9fAcCAeaDfA4A+NiShWR886eClUcBtqhipoY5DM60Y1V3BbVQlabthUBal5bq8Z8nnxxiyb1wfGX2n76N1Mw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.js" integrity="sha512-Zt7blzhYHCLHjU0c+e4ldn5kGAbwLKTSOTERgqSNyTB50wWSI21z0q6bn/dEIuqf6HiFzKJ6cfj2osRhklb4Og==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.css" integrity="sha512-hvNR0F/e2J7zPPfLC9auFe3/SE0yG4aJCOd/qxew74NN7eyiSKjr7xJJMu1Jy2wf7FXITpWS1E/RY8yzuXN7VA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>
  *:not(i) {
    font-family: 'Kanit', sans-serif;

  }

  label {
    color: #7D7D7D;
  }

  .header-instruction {
    align-items: center;
    color: #fff;
    font-weight: 100;
  }

  .video-preview {
    border: #fff 1px solid;
    margin-top: 25px;
    max-width: 888px;
    border-radius: 5px;
  }

  .infomation {
    display: flex;
    align-items: center;
    justify-content: center;
    color: #002449;
    margin-top: 10px;


    >.detail {
      font-size: 12px;
      margin-left: 10px;
    }
  }

  .header-infomation {}

  .sub-header-infomation {
    color: #002449;
    font-weight: bold;
    font-family: 'Kanit', sans-serif;
    font-size: 16px;
  }

  .detail-register li {
    color: #002449;
    font-family: 'Kanit', sans-serif;

  }

  .modal-border {
    border-radius: 10px;
  }

  .header-payment {
    color: #fff;
    margin: 30px 0 10px 0;
    font-size: 14;
  }

  .btn-copy {
    width: auto;
    font-size: 14px;
    color: #fff;
    margin-bottom: 16px;
  }

  .header-upload-payment {
    color: #fff;
    padding-top: 150px;
  }

  .btn-upload{
    background-color: #005CD3;
    color: #fff;
  }

  .section-payment{
      display: block;
      background-color: rgb(255, 255, 255,.3);
      border-radius: 10px;
    }
  @media (width >= 1200px) {
    #header-text-login{
      width: 40% !important;
    }
    .section-payment{
      margin-top: 40px;
      display: flex !important;
    }
    .detail-payment{
      padding: 20px 20px;
    }
  }
  .detail-payment ol li {
      font-size: 13px;
      font-weight: lighter;
    }
  .modal-success{
    margin: 10px 60px;
  }
  .label-upload-slip{
    border-radius: 50px;
    color: #949494;
  }.after-upload{
    margin-top: 15px;
    color: #A0A0A0;
    font-size: 10px;
    align-items: center;
  }
</style>


  <h4 class="header-instruction text-center">Video instruction</h4>
  <div class="container section-payment pb-3">
    <div>
      <div class="text-center">
      </div>
      <video src="https://res.cloudinary.com/codelife/video/upload/v1637805738/intro_l5ul1k.mp4" controls autoplay loop muted style="width:100%;" class="video-preview"></video>
      

      
    </div>
    
    <div class="detail-payment">
      <p class="header-payment text-center">
      วิธีการสมัครเข้าร่วมกิจกรรม
      </p>
      <ol class="text-white">
          <li>ผู้ที่ต้องการเข้าร่วมกิจกรรมต้องทำการชำระค่าสมัคร เป็นจำนวนเงิน 10,000 บาท </li>
          <li>ผู้เล่นกิจกรรมต้องทำการลงทะเบียนเข้าร่วม โดยการกรอกข้อมูล Agent code และรหัสผ่าน โดยรหหัสผ่านของคุณคือ วัน/เดือน/ปี เกิด 8 หลักเช่น เกิดวันที่ 1 เดือน มกราคม ค.ศ 1989  รหัสผ่านของคุณคือ 01011989 </li>
          <li>เเสดง QR code ยืนยันการชำระค่าสมัครกับเจ้าหน้าที่เเละรับเสื้อหน้างาน</li>
        </ol>
      <!-- <div class="w-100 float-start">
        <p class="float-start w-100">ธนาคาร : XXXXX</p>
        <div class="w-100 d-flex justify-content-between align-items-center">
            <p class="float-start ">เลขบัญชี : <span id="number_payment">123xxxxxxxx</span></p>
            <a class="btn btn-copy w-auto p-0" onclick="copy()">
              <i class="fa-regular fa-copy"></i> คัดลอก
            </a>
        </div>
        <p class="float-start w-100">จำนวนเงิน : 10,000 บาท</p>
      </div> -->

    <!-- <div class=" text-center">
      <p class="header-upload-payment">อัพโหลดหลักฐานการชำระค่าสมัคร</p>
        <div class="input-group">
          <input class="form-control d-none" name="pay_slip" type="file" id="pay_slip" value="{{ isset(Auth::user()->pay_slip) ? Auth::user()->pay_slip : ''}}" accept="image/*">
          <label for="pay_slip" class="form-control text-start label-upload-slip">อัพโหลดรูปภาพ</label>
          <a class="btn btn-upload" type="button" id="btnSubmitPayment" onclick="check_form()">
            upload 
            <i class="fa-solid fa-arrow-up-from-bracket font-16"></i>
          </a>
        </div>
      </div>

      <p class="after-upload text-center">
      หลังจากอัพโหลดหลักหลักฐานการชำระเรียบร้อยเเล้ว กรุณา <br>
        นำ QR code ของคุณ ไปติดต่อเจ้าหน้าที่ภายในงาน
      </p>
    </div> -->
  </div>
  </div>

  <style>
    .btn-submit{
      border-radius: 5px;
      
      font-size: 16px;
      margin-top: 15px;
      padding: 5px 40px;

      background-color: #005CD3;
      color: #fff;
    }
    .btn-submit:hover{
      border: 1px solid #00E0FF;
      box-shadow: 0px 0px 15px 1px #00FBFF;
      color: #fff;

    }
    .btn-cancel{
      border-radius: 5px;
      font-size: 16px;
      margin-top: 15px;
      padding: 5px 40px;
      outline: #FF3838 1px solid;

      background-color: #FF3838;
      color: #fff;
    }
    .img-modal{
      margin:  20px 0px;
      width: 120px;
    }
    .modal-text-header{
      font-size: 16px;
    }
    .modal-detail{
      font-size: 12px;
    }.accept-text-header{
      color: #128DFF;
    }
    .btn-outline-submit{
      outline: #005CD3 1px solid;
      color:  #005CD3;

      border-radius: 5px;
      font-size: 16px;
      margin-top: 15px;
      padding: 5px 40px;
    }.text-agree{
      color: #00377F;
    }#checkRegis{
      accent-color: #002449;
      font-size: 18px;
    }.text-warn{
      font-size: 12px;
      padding: 0 30px;
    }
  </style>
  <div class="d-flex justify-content-center mt-5 mb-3">
    <button class="btn btn-submit mx-3" type="button" data-toggle="modal" data-target="#modalAcceptRegis">Join</button>
    <button class="btn btn-cancel"  type="button" data-toggle="modal" data-target="#modalCancelRegis">Cancel</button>
  </div>
<p class="text-center text-white text-warn">ผู้สมัครต้องอยู่ในระดับ AL ที่มี unit code แล้วเท่านั้นเเละมีค่าสมัครเข้าโครงการ 10,000 บาท โดยหักผ่านบัญชีตัวแทนเป็น 3 งวด </p>


<!-- Modal -->
<div class="modal fade" id="modalAcceptRegis" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content mx-5">
      <div class="modal-body">
        <div class="d-flex justify-content-center">
          <img src="{{ url('/img/icon/ask.png') }}" class="img-modal text-center">
        </div>

        <h6 class="text-center accept-text-header">
        <b>คุณต้องการเข้าร่วมกิจกรรมใช่หรือไม่ ?</b> 
        </h6>
        <p class="text-center modal-detail">ยืนยันการเข้าร่วม Franchise builder 2024 และยืนยอนให้บริษัทหักชำระค่าบริการ</p>
        <div class="text-center mt-5">
          <input type="checkbox" name="" id="checkRegis" onchange="AcceptRegister()" > 
          <span class="text-agree">ฉันยอมรับเงื่อนไขเเละข้อกำหนด</span>
        </div>

        <div class="d-flex justify-content-center ">
          <button type="submit" id="btnAcceptRegis" class="btn btn-outline-submit mx-3" disabled onclick="location.href='{{ url('first_profile?type=first_profile') }}'">OK</button>
          <button type="button" class="btn btn-cancel px-4  " data-dismiss="modal">Cancel</button>
        </div>
        <a class="infomation" data-toggle="modal" data-target="#modal-infomation">
          <div class=" m-0 p-0">
        
              <i class="fa-solid fa-circle-info icon m-0 p-0" ></i>
            </div>
            <span class="detail">กดเพื่อดูข้อมูลเพิ่มเติม</span>
          </a>
      </div>
    </div>
  </div>
</div>

<script>
  function AcceptRegister() {
    let checkRegis = document.getElementById("checkRegis");
    
    if (checkRegis.checked) {
        document.getElementById("btnAcceptRegis").classList.remove('btn-outline-submit');
        document.getElementById("btnAcceptRegis").classList.add('btn-submit');
        document.getElementById("btnAcceptRegis").disabled = false;
  } else {
        document.getElementById("btnAcceptRegis").classList.add('btn-outline-submit');
        document.getElementById("btnAcceptRegis").classList.remove('btn-submit');
        document.getElementById("btnAcceptRegis").disabled = true;
  }
}
</script>
<!-- Modal -->
<div class="modal fade" id="modalCancelRegis" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered " role="document">
    <div class="modal-content mx-5">
      <div class="modal-body">
        <div class="d-flex justify-content-center">
          <img src="{{ url('/img/icon/logout.png') }}" class="img-modal text-center">
        </div>

        <h6 class="text-danger text-center modal-text-header">
        <b>ยังไม่พร้อม ไ่ม่เป็นไร !</b> 
        </h6>
        <p class="text-center modal-detail">คุณสามารถทำการสมัครเข้าร่วมกิจกรรมได้ภายในวันที่ 24 ม.ค.2567</p>
        <div class="d-flex justify-content-center mt-4">
          <a class="btn btn-submit mx-3 px-4"  href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">OK</a>
          <button type="button" class="btn btn-cancel px-4  " data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div>
</div>

<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>
<!-- Modal -->
<div class="modal fade" id="modal-infomation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered px-3" role="document">
    <div class="modal-content " style="background-color: rgb(0,0,0,0);">
      <div class="modal-body px-2 modal-border" style="background-color: #fff">
        <h6 class="modal-title text-center pb-2 header-infomation mb-4" id="exampleModalLabel"> กิจกรรม THE FRANCHISE BUILDER 2024 </h6>

        <p class="sub-header-infomation mb-4">เงื่อนไขการเข้าร่วมกิจกรรม</p>
        <ol class="detail-register">
          <li>ผู้เข้าร่วมกิจกรรม ต้องเป็นตัวแทนระดับ AL ที่มี unit code แล้วเท่านั้น</li>
          <li>ผู้เข้ากิจกรรมยินยอมที่จะให้บริษัทหักค่าสมัคร 10,000 บาท (แบ่งชำระเป็นงวด) จากบัญชีตัวแทน หลักฐานการชำระค่าสมัครที่ช่องอัพโหลดด้านล่าง</li>
          <li>ผู้ร่วมกิจกรรมจะได้รับสิทธิประโยชน์ด้านต่างๆตามที่บริษัทระบุ หากสามารถรักษาสิทธิ์ผู้เล่นไว้ได้</li>
        </ol>
        <div class="d-flex justify-content-center w-100">
      <button class="btn btn-submit"  data-dismiss="modal">
        Close
      </button>
      
    </div>
      </div>
  
  </div>

  </div>
  
</div>

<style>
  .detail-upload-success{
    color: #005CD3;
    font-size: 16px;
  }.btn-payment-success{
    padding: 10px 40px;
    background-color: #005CD3;
    color: white;
    border-radius: 9px;
  }.upload-slipe{
    width: 90%;
    height: auto;
  }
</style>

<div class="modal fade" id="modal_upload_payment_success" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content modal-border modal-success">
      <div class="modal-body px-2">
        <div class="d-flex justify-content-center">

          <img src="{{ url('/img/other/Upload slipe.png') }}" class="upload-slipe ">
        </div>

        <h4 class="modal-title text-center pb-2 header-upload-success mb-2 text-success" id="exampleModalLabel">successfully ! </h4>
        <p class="detail-upload-success mb-4 text-center">
          อัพโหลดรูปภาพของคุณสำเร็จ <br>กรุณาเเสดงหลักฐานนี้เเก่เจ้าหน้าที่  
        </p>
        <div class="d-flex justify-content-center">

          <button class="btn btn-payment-success" onclick="submit_form()">Next</button>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
   function check_form() {
      if ($("#form_upload_payment")[0].checkValidity()) {
          
          $('#modal_upload_payment_success').modal('show');
          
      } else {
          // Validate Form
          $("#form_upload_payment")[0].reportValidity();
          event.preventDefault();
      }
  }
  function copy() {
    // ดึงข้อความที่ต้องการคัดลอกจาก element ด้วย id "number_payment"
    let numberPayment = document.getElementById('number_payment');

    // สร้างออบเจ็กต์ Range สำหรับการเลือกข้อความภายใน element
    let range = document.createRange();
    range.selectNode(numberPayment);

    // สร้าง Selection จาก Range
    let selection = window.getSelection();
    selection.removeAllRanges();
    selection.addRange(range);

    // คัดลอกข้อความไปยังคลิปบอร์ด
    document.execCommand('copy');

  }

  function submit_form() {
      $("#form_upload_payment")[0].submit();
  }


  function previewImage(input) {
    let preview = document.getElementById('preview');
    let imagePreviewDiv = document.getElementById('imagePreview');

    if (input.files && input.files[0]) {
      let reader = new FileReader();

      reader.onload = function(e) {
        preview.src = e.target.result;
        preview.style.display = 'block';
        imagePreviewDiv.style.display = 'block';
      };

      reader.readAsDataURL(input.files[0]);

      setTimeout(function() {
        cropper_img();
      }, 1000);
    } else {
      preview.src = '#';
      preview.style.display = 'none';
      imagePreviewDiv.style.display = 'none';
    }
  }

  function cropper_img() {
    const image = document.getElementById('preview');
    const cropper = new Cropper(image, {
      aspectRatio: 1 / 1,
      crop(event) {
        // console.log("x >> " + event.detail.x);
        // console.log("y >> " + event.detail.y);
        // console.log("width >> " + event.detail.width);
        // console.log("height >> " + event.detail.height);
        // console.log("rotate >> " + event.detail.rotate);
        // console.log("scaleX >> " + event.detail.scaleX);
        // console.log("scaleY >> " + event.detail.scaleY);

        document.querySelector('#currentX').value = event.detail.x;
        document.querySelector('#currentY').value = event.detail.y;
        document.querySelector('#currentWidth').value = event.detail.width;
        document.querySelector('#currentHeight').value = event.detail.height;
      },
    });
  }
</script>

@endsection