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
    border: #fff 10px solid;
    margin-top: 15px;
    max-width: 888px;
  }

  .infomation {
    display: flex;
    align-items: center;
    color: #fff;
    margin-top: 10px;

    >.icon {
      font-size: 18px;
    }

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
    margin: 65px 0 10px 0;
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


<form id="form_upload_payment" method="POST" action="{{ url('/profile/' . Auth::user()->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
  {{ method_field('PATCH') }}
  {{ csrf_field() }}

  

  <div class="container section-payment">
    <div>
      <div class="text-center">
        <h4 class="header-instruction">Video instruction</h4>
      </div>
      <video src="https://res.cloudinary.com/codelife/video/upload/v1637805738/intro_l5ul1k.mp4" controls autoplay loop muted style="width:100%;" class="video-preview"></video>
      <a class="infomation" data-toggle="modal" data-target="#modal-infomation">
        <i class="fa-solid fa-circle-info icon"></i>
        <span class="detail">กดเพื่อดูข้อมูลเพิ่มเติม</span>
      </a>

      
    </div>
    
    <div class="detail-payment">
      <h4 class="header-payment text-center">
        ช่องทางการชำระเงิน
      </h4>
      <div class="container">
      <div class="w-100 float-start">
        <p class="float-start w-100">ธนาคาร : XXXXX</p>
        <div class="w-100 d-flex justify-content-between align-items-center">
            <p class="float-start ">เลขบัญชี : <span id="number_payment">123xxxxxxxx</span></p>
            <a class="btn btn-copy w-auto p-0" onclick="copy()">
              <i class="fa-regular fa-copy"></i> คัดลอก
            </a>
        </div>
        <p class="float-start w-100">จำนวนเงิน : 10,000 บาท</p>
      </div>
    </div>

    <div class=" text-center">
      <p class="header-upload-payment">อัพโหลดหลักฐานการชำระค่าสมัคร</p>
        <div class="input-group">
          <!-- <input type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload" required> -->
          <input class="form-control d-none" name="pay_slip" type="file" id="pay_slip" value="{{ isset(Auth::user()->pay_slip) ? Auth::user()->pay_slip : ''}}" accept="image/*" required>
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
    </div>
  </div>


  <!-- <div class="card border-top border-0 border-4 border-primary d-none">
    <div class="card-body p-5">
      <div class="card-title d-flex align-items-center">
        <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
        </div>
        <h5 class="mb-0 text-primary">ลงทะเบียนเข้าร่วมกิจกรรม</h5>
      </div>
      <hr>

      <form class="row g-3">
        <div class="col-12 col-md-6">
          <label for="name" class="form-label">ชื่อโปรไฟล์</label>
          <input type="text" class="form-control" id="name" name="name" value="{{ isset(Auth::user()->name) ? Auth::user()->name : ''}}" readonly>
        </div>

        <input type="text" class="d-none" id="user_id" name="user_id" value="{{ Auth::user()->id }}" readonly>
        <input type="text" class="d-none" id="currentX" name="currentX" value="" readonly>
        <input type="text" class="d-none" id="currentY" name="currentY" value="" readonly>
        <input type="text" class="d-none" id="currentWidth" name="currentWidth" value="" readonly>
        <input type="text" class="d-none" id="currentHeight" name="currentHeight" value="" readonly>

        <div class="col-12 col-md-6 mt-3">
          <label for="photo" class="form-label">รูปโปรไฟล์</label>
          <input class="form-control" name="photo" type="file" id="photo" accept="image/*" onchange="previewImage(this)" required>
        </div>
        <div id="imagePreview" class="col-12 col-md-6 mt-3" style="display:none;">
          <label class="form-label">ภาพพรีวิว</label>
          <img id="preview" src="" alt="ภาพพรีวิว" style="max-width:100%; height:auto; display:none;">
        </div>

        <div class="col-12 col-md-6 mt-3">
          <label for="pay_slip" class="form-label">หลักฐานการชำระเงิน</label>
          <input class="form-control" name="pay_slip" type="file" id="pay_slip" value="{{ isset(Auth::user()->pay_slip) ? Auth::user()->pay_slip : ''}}" accept="image/*" required>
        </div>

        <div class="col-12 col-md-6 mt-3">
          <input type="checkbox" name="check_terms_of_service" id="check_terms_of_service" required>
          <span class="text-dark">ฉันยอมรับ</span>
          <br>
          <span class="text-danger">
            ข้อกำหนดและเงื่อนไขการใช้บริการบน เว็บไซต์ <span class="text-dark">และ</span> นโยบายเกี่ยวกับข้อมูลส่วนบุคคล
          </span>
        </div>

        <div class="col-12 mt-3">
          <button type="submit" class="btn btn-primary px-5">ยืนยันการลงทะเบียน</button>
        </div>
      </form>
    </div>
  </div> -->

  <input type="text" class="d-none" id="user_id" name="user_id" value="{{ Auth::user()->id }}" readonly>
    <input type="text" class="d-none" id="currentX" name="currentX" value="" readonly>
    <input type="text" class="d-none" id="currentY" name="currentY" value="" readonly>
    <input type="text" class="d-none" id="currentWidth" name="currentWidth" value="" readonly>
    <input type="text" class="d-none" id="currentHeight" name="currentHeight" value="" readonly>
</form>


<a class="btn btn-sm btn-danger" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" style="position: absolute;top: 2%;right: 1%;">
  <i class='bx bx-log-out-circle'></i>
</a>

<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
  @csrf
</form>


<!-- Modal -->
<div class="modal fade" id="modal-infomation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content modal-border">
      <div class="modal-body px-2">
        <h6 class="modal-title text-center pb-2 header-infomation mb-4" id="exampleModalLabel"> กิจกรรม THE FRANCHISE BUILDER 2024 </h6>

        <p class="sub-header-infomation mb-4 text-center">วิธีการสมัครเข้าร่วมกิจกรรม</p>
        <ol class="detail-register">
          <li>ผู้เล่นกิจกรรมต้องทำการลงทะเบียนเข้าร่วม โดยการกรอกข้อมูล Agent code และรหัสผ่าน โดยรหัสผ่านของคุณคือ วัน/เดือน/ปี เกิด 8 หลักเช่น เกิดวันที่ 1 เดือน มกราคม ค.ศ 1989 รหัสผ่านของคุณคือ 01011989 </li>
          <li>ชำระค่าสมัคร เป็นจำนวนเงิน 10,000 บาท พร้อมอัพโหลดหลักฐานการชำระค่าสมัครที่ช่องอัพโหลดด้านล่าง</li>
          <li>เเสดง QR code ยืนยันการชำระค่าสมัครกับเจ้าหน้าที่เเละรับเสื้อหน้างาน</li>
        </ol>

        <p class="sub-header-infomation mb-4 text-center">กติกาการร่วมเล่นกิจกรรม</p>
        <ol class="detail-register">
          <li>ระบบจะมี Group สำหรับรองรับผู้เข้าร่วมกิจกรรมทั้งหมด 80 Group</li>
          <li>ผู้เล่นต้องทำการรวบรวมสมาชิกให้ครบ 10 คน / 1กลุ่ม โดยผู้เล่นคนเเรกจะมีหน้าที่เป็น Hostสามารถทำการอนุญาติ หรือปฏิเสธการขอเข้าร่วม Group ของผู้เล่นที่ขอเข้าร่วมหลัง จากคุณได้ เเละสามารถเชิญผู้เล่นที่ยังไม่มี Group เข้าร่วม Group เดียวกับคุณได้</li>
          <li>ผู้เล่นสามารถส่งต่อสถานะ Host ให้กับสมาชิกภายใน Group ได้ โดยที่ผู้ที่ต้องการเป็น Host คนถัดไป ต้องกดยอมรับการ เปลี่ยนสถานะก่อน Host คนเดิมจึงจะสามารถส่งต่อสถานะ Host ได้</li>
          <li>ผู้เล่นสามารถออกจาก Group ได้ทุกเมื่อ ในกรณีที่ Group ที่คุณอยู่ยังมีสมาชิกไม่ครบ 10 คน</li>
          <li>หากผู้เล่นต้องการออกจาก Group สามารถกด “ออกจาก Group” ได้ด้วยตนเอง</li>
          <li>ในกรณีที่ Group มีสมาชิกครบ 10 คน ระบบจะทำการปิด Group อัตโนมัติ โดยที่สมาชิกทุกคนจะไม่สามารถเข้าหรือออกจากกลุ่มได้</li>
        </ol>
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