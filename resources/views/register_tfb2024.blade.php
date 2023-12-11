@extends('layouts.theme_login')

@section('content')

<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.js" integrity="sha512-9KkIqdfN7ipEW6B6k+Aq20PV31bjODg4AA52W+tYtAE0jE0kMx49bjJ3FgvS56wzmyfMUHbQ4Km2b7l9+Y/+Eg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.css" integrity="sha512-bs9fAcCAeaDfA4A+NiShWR886eClUcBtqhipoY5DM60Y1V3BbVQlabthUBal5bq8Z8nnxxiyb1wfGX2n76N1Mw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.js" integrity="sha512-Zt7blzhYHCLHjU0c+e4ldn5kGAbwLKTSOTERgqSNyTB50wWSI21z0q6bn/dEIuqf6HiFzKJ6cfj2osRhklb4Og==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.css" integrity="sha512-hvNR0F/e2J7zPPfLC9auFe3/SE0yG4aJCOd/qxew74NN7eyiSKjr7xJJMu1Jy2wf7FXITpWS1E/RY8yzuXN7VA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>
  
  label{
    color: #7D7D7D;
  }

</style>


<form method="POST" action="{{ url('/profile/' . Auth::user()->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
  {{ method_field('PATCH') }}
  {{ csrf_field() }}

  <div class="card border-top border-0 border-4 border-primary">
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
          <input class="form-control" name="pay_slip" type="file" id="pay_slip" value="{{ isset(Auth::user()->pay_slip) ? Auth::user()->pay_slip : ''}}"  accept="image/*" required>
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
  </div>
</form>


<a class="btn btn-sm btn-danger" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" style="position: absolute;top: 2%;right: 1%;">
    <i class='bx bx-log-out-circle'></i>
</a>

<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>

<script>
  function previewImage(input) {
      let preview = document.getElementById('preview');
      let imagePreviewDiv = document.getElementById('imagePreview');

      if (input.files && input.files[0]) {
          let reader = new FileReader();

          reader.onload = function (e) {
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

  function cropper_img(){
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

        document.querySelector('#currentX').value = event.detail.x ;
        document.querySelector('#currentY').value = event.detail.y ;
        document.querySelector('#currentWidth').value = event.detail.width ;
        document.querySelector('#currentHeight').value = event.detail.height ;
      },
    });
  }
</script>

@endsection