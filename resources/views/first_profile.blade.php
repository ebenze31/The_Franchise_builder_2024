@extends('layouts.theme_login')

@section('content')

<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.js" integrity="sha512-9KkIqdfN7ipEW6B6k+Aq20PV31bjODg4AA52W+tYtAE0jE0kMx49bjJ3FgvS56wzmyfMUHbQ4Km2b7l9+Y/+Eg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.css" integrity="sha512-bs9fAcCAeaDfA4A+NiShWR886eClUcBtqhipoY5DM60Y1V3BbVQlabthUBal5bq8Z8nnxxiyb1wfGX2n76N1Mw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.js" integrity="sha512-Zt7blzhYHCLHjU0c+e4ldn5kGAbwLKTSOTERgqSNyTB50wWSI21z0q6bn/dEIuqf6HiFzKJ6cfj2osRhklb4Og==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.css" integrity="sha512-hvNR0F/e2J7zPPfLC9auFe3/SE0yG4aJCOd/qxew74NN7eyiSKjr7xJJMu1Jy2wf7FXITpWS1E/RY8yzuXN7VA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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
    font-weight: bolder;
  }

  .qr-profile {
    width: 180px;
    height: 180px;
    object-fit: contain;
    margin-top: 20px;

  }

  .qr-section {
    padding: 18px 5px 35px 5px;

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
    padding:2.8rem 1rem 2rem 1rem!important;
    border-radius: 10px;
  }

  .cropper-crop-box,
  .cropper-view-box {
    border-radius: 50%;
  }

  .btn-qr-code {
    background-color: #002449 !important;
    color: #fff !important;
    font-size: 14px;
    border-radius: 5px 0 0 5px !important;
  }

  .btn-qr-code.active {
    background-color: #3980B9 !important;
    color: #fff !important;
  }

  .btn-scan-code {
    background-color: #002449 !important;
    color: #fff !important;
    font-size: 14px;
    border-radius: 0 5px 5px 0 !important;
  }

  .btn-scan-code.active {
    background-color: #3980B9 !important;
    color: #fff !important;
  }

  .btn-close-modal {
        font-size: 22px;
  }
  .btn-close-modal span {
    background-color: #fff;
    color: #002449;
    padding: 0px 12px;
    border-radius: 50%;
    font-size: 22px;
}
  

  .modalHeaderRename {
    background-color: #002449;
    color: #fff !important;
    padding: 3px;
  }

  .modal-rename-title {
    font-size: 16px;
    margin: 0;
  }

  .inputRename {
    border-radius: 5px;
    border: #005CD3 1px solid;
    padding: 5px;
    text-align: center;
  }

  .btnSaveRename {
    background-color: #005CD3;
    color: #fff;
    border-radius: 5px;
    padding: 5px 20px;
  }

  .user-new-img {
    width: 195px;
    height: 195px;
    border-radius: 50%;
  }

  .edit-first-profile {
    position: relative;
  }

  .btn-edit-profile {
    position: absolute;
    bottom: 0;
    right: 20px;
  }.btn-edit-profile img{
    width: 47px;
    height: 47px;
  }

  .info-warn {
    font-size: 12px;
    font-weight: lighter;
    color: #002449;
  }

  .btn-submit {
    border-radius: 5px;
    width: auto;
    font-size: 16px;
    margin-top: 15px;
    padding: 8px 35px;
    background-color: #005CD3;
    color: #fff;
  }

  .btn-submit:hover {
    border: 1px solid #00E0FF;
    box-shadow: 0px 0px 15px 1px #00FBFF;
    
    color: #fff;

  }#btn_select_new_img{
    position: absolute;
    top: 20px;
    left: 20px;
    color: #005CD3;
  } .btn-logout {
        color: rgb(244, 244, 244, .7);
        border: 1px solid rgb(244, 244, 244, .7);
        -webkit-border-radius: 50px;    
        border-radius: 50px; 
        -moz-border-radius:50px;
        -khtml-border-radius:50px;
        font-size: 12px;
        display: flex;
        align-items: center;

      opacity: .7;
    }

    .btn-logout i {
        font-size: 15px;
        margin-top: -12px;
    }.cropper-container{
margin-top: 30px;
    }
</style>


<form class="w-100 qr-section" action="{{ route('edit_profile', Auth::user()->id) }}" method="post" enctype="multipart/form-data">
  @csrf
  <div class="card qr-card text-center">
    @if(request("type") == "edit_profile")
    <div class=" d-flex justify-content-center w-100 mt-4 ">
      <div class="edit-first-profile" id="DivEditProfile">
      @if(!empty(Auth::user()->photo) )
        <label for="photo">
          <img src="{{ url('storage')}}/{{ Auth::user()->photo }}" class="user-new-img" alt="รูปภาพผู้ใช้">
        </label>
        @else
        <label for="photo">
          <img src="{{ url('/img/icon/profile.png') }}" class="user-new-img" alt="รูปภาพผู้ใช้">
        </label>
        @endif
        <label for="photo" class="btn-edit-profile">
          <img src="{{ url('/img/icon/edit-profile.png') }}" alt="รูปภาพผู้ใช้">
        </label>
      </div>
      <img id="preview" src="{{ url('/') }}" alt="ภาพพรีวิว" class="d-none mt-3" style="max-width:100%; max-height:250px;">
    </div>
    <label for="photo" id="btn_select_new_img" class="d-none">
    <i class="fa-solid fa-chevron-right fa-rotate-180"></i> Chang image
    </label>

    <p class="info-user mt-3 mb-0" data-toggle="modal" data-target="#exampleModalCenter">{{ Auth::user()->name }} </p>
    <!-- <p class="info-user">{{ Auth::user()->email }}</p> -->
    <div>
      <button id="btn-edit-profile" class="btn btn-submit" type="submit">Next</button>
    </div>
  
    @else
    <div class=" d-flex justify-content-center w-100 mt-1 ">
      <div class="edit-first-profile" id="DivEditProfile">
        <img src="{{ url('/img/icon/profile.png') }}" class="user-new-img" alt="รูปภาพผู้ใช้">
        <label for="photo" class="btn-edit-profile">
          <img src="{{ url('/img/icon/edit-profile.png') }}" alt="รูปภาพผู้ใช้">
        </label>
      </div>
      <img id="preview" src="{{ url('/') }}" alt="ภาพพรีวิว" class="d-none mt-3" style="max-width:100%; max-height:250px;">
    </div>
    <label for="photo" id="btn_select_new_img" class="d-none">
    <i class="fa-solid fa-chevron-right fa-rotate-180"></i> Chang image
    </label>
    <p class="info-user mt-4 mb-0">{{ Auth::user()->name }}</p>
    @if(request("type") == "first_profile")
    <p class="info-warn mb-4 d-inline"><b>กรุณาเปลี่ยนรูป Profile ของคุณก่อนเข้าร่วมกิจกรรม</b></p>
    @endif
    <div>
      <button id="btn-first-profile"class="btn btn-submit" disabled>
        Next
      </button>
    </div>
    @endif
  </div>

  <input type="text" class="form-control d-none" id="name" name="name" value="{{ isset(Auth::user()->name) ? Auth::user()->name : ''}}" readonly>
  <input type="text" class="d-none" id="user_id" name="user_id" value="{{ Auth::user()->id }}" readonly>
  <input type="text" class="d-none" id="currentX" name="currentX" value="" readonly>
  <input type="text" class="d-none" id="currentY" name="currentY" value="" readonly>
  <input type="text" class="d-none" id="currentWidth" name="currentWidth" value="" readonly>
  <input type="text" class="d-none" id="currentHeight" name="currentHeight" value="" readonly>
  <input type="text" class="d-none" id="type" name="type" value="{{request("type")}}" readonly>

  @if(request("type") == "first_profile")
  <input class="form-control d-none" name="photo" type="file" id="photo" typeEdit="first-profile" accept="image/*" onchange="checkimg(this)"required>
  @else
  <input class="form-control d-none" name="photo" type="file" id="photo" typeEdit="edit-peofile" accept="image/*" onchange="checkimg(this)" >
  @endif

</form>

<!-- <img id="preview" src="{{ url('/') }}" alt="ภาพพรีวิว" style="max-width:100%; height:auto; display:none;"> -->


<a class="btn btn-logout" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" style="position: absolute;top:10px;right: 20px;">
  <img src="{{ url('/img/icon/Logo-logout.png') }}" alt="" width="15" height="15"> &nbsp;logout
</a>
<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
  @csrf
</form>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content mx-5">
      <div class="modal-header modalHeaderRename">
        <div class="w-100 text-center">

          <p class="modal-rename-title text-white text-center" id="exampleModalLongTitle">กรุณากรอกชื่อใหม่ของคุณ</p>
        </div>
        <button type="button" class="close btn btn-close-modal" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body my-3">
        <input type="text" class="inputRename w-100" name="" id="" placeholder="กรอกชื่อใหม่ของคุณ" oninput="document.querySelector('.btnSaveRename').disabled = false;">
      </div>
      <div class="my-3 d-flex justify-content-center w-100">
        <button type="button" class="btn btn-primary btnSaveRename" disabled>Save</button>
      </div>
    </div>
  </div>
</div>

<!-- <div class="card border-top border-0 border-4 border-primary d-nne">
  <div class="card-body p-5">
    <div class="card-title d-flex align-items-center">
      <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
      </div>
      <h5 class="mb-0 text-primary">ลงทะเบียนเข้าร่วมกิจกรรม</h5>
    </div>
    <hr>

    <form action="{{ route('edit_profile', ['id' => Auth::user()->id]) }}" method="post">
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


<script>

  function checkimg(data) {
    let typeEdit = data.getAttribute('typeEdit');
    if (data.files && data.files[0]) {
      previewImage(data)
      if(typeEdit == "first-profile"){
      document.getElementById("btn-first-profile").disabled = false;
    }
    }else{
      document.getElementById('preview').classList.add('d-none');
      document.querySelector('.cropper-container').classList.add('d-none');
      document.querySelector('#DivEditProfile').classList.remove('d-none');
      document.querySelector('#btn_select_new_img').classList.add('d-none');
      if(typeEdit == "first-profile"){
      document.getElementById("btn-first-profile").disabled = true;
    }
    }

  
  }
  function previewImage(input) {
    let preview = document.getElementById('preview');
    let edit_first_profile = document.querySelector('#DivEditProfile');
    let btn_select_new_img = document.querySelector('#btn_select_new_img');
    // console.log('asd');
    if (input.files && input.files[0]) {
      let reader = new FileReader();

      reader.onload = function(e) {
        edit_first_profile.classList.add('d-none');
        btn_select_new_img.classList.remove('d-none');
        preview.src = e.target.result;
        preview.classList.remove('d-none');

        // Initialize or update cropper
        if (preview.cropper) {
          preview.cropper.destroy();
        }
        cropper_img(preview);
      };

      reader.readAsDataURL(input.files[0]);
    } else {
      preview.src = '#';
      preview.classList.add('d-none');
      if (preview.cropper) {
        preview.cropper.destroy();
      }
    }
  }

  function cropper_img(imageElement) {
    new Cropper(imageElement, {
      aspectRatio: 1 / 1,
      viewMode: 2,
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
@endsection