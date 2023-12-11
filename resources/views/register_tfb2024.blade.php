@extends('layouts.theme_login')

@section('content')

<style>
  
  label{
    color: #7D7D7D;
  }

  #image-preview-container {
      width: 250px;
      height: 250px;
      overflow: hidden;
      position: relative;
  }

  #image-preview {
      width: 250px;
      height: 250px;
      object-fit: cover;
      cursor: move;
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

        <input type="text" class="form-control" id="currentX" name="currentX" value="" readonly>
        <input type="text" class="form-control" id="currentY" name="currentY" value="" readonly>

        <div class="col-12 col-md-6">
            <label for="photo" class="form-label">รูปโปรไฟล์</label>
            <input class="form-control" name="photo" type="file" id="photo" accept="image/*">
            <div id="image-preview-container" class="mt-3">
                <img id="image-preview" src="{{ isset(Auth::user()->photo) ? Auth::user()->photo : ''}}" alt="Preview">
                <span></span>
            </div>
        </div>




        <br><br><br><br><br>
        <div class="col-12 col-md-6">
          <label for="pay_slip" class="form-label">หลักฐานการชำระเงิน</label>
          <input class="form-control" name="pay_slip" type="file" id="pay_slip" value="{{ isset(Auth::user()->pay_slip) ? Auth::user()->pay_slip : ''}}"  accept="image/*">
        </div>

        <div class="col-12 mt-3">
          <button type="submit" class="btn btn-primary px-5">Register</button>
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


<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
    var $imagePreview = $('#image-preview');
    var $imageContainer = $('#image-preview-container');
    var startTouchX = 0;
    var startTouchY = 0;

    $imagePreview.on('load', function () {
        $imageContainer.width(250).height(250);
    });

    $('#photo').on('change', function (e) {
        var file = e.target.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $imagePreview.attr('src', e.target.result);
            };
            reader.readAsDataURL(file);
        }
    });

    $imageContainer.on('touchstart', function (e) {
        var touch = e.touches[0];
        startTouchX = touch.clientX;
        startTouchY = touch.clientY;
    });

    $imageContainer.on('touchmove', function (e) {
        e.preventDefault();

        var touch = e.touches[0];
        var offsetX = touch.clientX - startTouchX;
        var offsetY = touch.clientY - startTouchY;

        var currentPos = $imagePreview.css('object-position').split(' ');
        var currentX = parseFloat(currentPos[0]);
        var currentY = parseFloat(currentPos[1]);

        var newX = currentX + (offsetX / $imageContainer.width()) * 100;
        var newY = currentY + (offsetY / $imageContainer.height()) * 100;

        // จะปรับตำแหน่งให้ติดขอบสูงสุดหรือต่ำที่สุดได้ที่นี่
        newX = Math.min(100, Math.max(0, newX));
        newY = Math.min(100, Math.max(0, newY));

        $imagePreview.css('object-position', newX + '% ' + newY + '%');

        startTouchX = touch.clientX;
        startTouchY = touch.clientY;

        document.querySelector('#currentX').value = '' ;
        document.querySelector('#currentY').value = '' ;

    });

});


</script>



@endsection