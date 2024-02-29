<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.js" integrity="sha512-9KkIqdfN7ipEW6B6k+Aq20PV31bjODg4AA52W+tYtAE0jE0kMx49bjJ3FgvS56wzmyfMUHbQ4Km2b7l9+Y/+Eg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.css" integrity="sha512-bs9fAcCAeaDfA4A+NiShWR886eClUcBtqhipoY5DM60Y1V3BbVQlabthUBal5bq8Z8nnxxiyb1wfGX2n76N1Mw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.js" integrity="sha512-Zt7blzhYHCLHjU0c+e4ldn5kGAbwLKTSOTERgqSNyTB50wWSI21z0q6bn/dEIuqf6HiFzKJ6cfj2osRhklb4Og==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.css" integrity="sha512-hvNR0F/e2J7zPPfLC9auFe3/SE0yG4aJCOd/qxew74NN7eyiSKjr7xJJMu1Jy2wf7FXITpWS1E/RY8yzuXN7VA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>
    .cropper-container{
        margin-top: 10px;
    }.container_upload_preview{
      position: relative;
      width: 100%;
      height: 250px;
      border-radius: 10px; 
        -moz-border-radius:10px;
        -khtml-border-radius:10px;
    }.container_upload{
      background-color: #bcbcbc;
      width: 100%;
      height: 250px;
      border-radius: 10px; 
        -moz-border-radius:10px;
        -khtml-border-radius:10px;
      position: relative;
      overflow: hidden;
    }
    .container_upload img{
   object-fit: contain;

    }
    
    .upload_section{
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      color: #fff;
      font-size: 22px;
      display: flex;
      justify-content: center;
    }
</style>

<div class="row">

<div class="col-12 col-md-6">
  <div class="form-group {{ $errors->has('title') ? 'has-error' : ''}} col-12 mb-3 mt-3">
      <label for="title" class="control-label">{{ 'Title' }}</label>
      <input class="form-control" name="title" type="text" id="title" value="{{ isset($news->title) ? $news->title : ''}}" >
      {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
  </div>
  <div class="form-group {{ $errors->has('detail') ? 'has-error' : ''}} col-12 mb-3">
      <label for="detail" class="control-label">{{ 'Detail' }}</label>
      <input class="form-control" name="detail" type="text" id="detail" value="{{ isset($news->detail) ? $news->detail : ''}}" >
      {!! $errors->first('detail', '<p class="help-block">:message</p>') !!}
  </div>
  <div class="form-group {{ $errors->has('link_content') ? 'has-error' : ''}} col-12 mb-3">
      <label for="link_content" class="control-label">{{ 'Link content' }}</label>
      <input class="form-control" name="link_content" type="text" id="link_content" value="{{ isset($news->link_content) ? $news->link_content : ''}}" >
      {!! $errors->first('link_content', '<p class="help-block">:message</p>') !!}
  </div>
  <div class="form-group {{ $errors->has('link') ? 'has-error' : ''}} col-12 mb-3">
    <label for="link" class="control-label">{{ 'Link video' }}</label>
    <input class="form-control"  onchange="extractYouTubeID(this.value)" value=""> 
    {!! $errors->first('link', '<p class="help-block">:message</p>') !!}
  </div>
  <div class="col-12 mt-2">
    <iframe  id="iframe_yt" class="d-none" width="100%" height="360"
          src=""
          title="YouTube video player"
          frameborder="0"
          allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
          allowfullscreen>
      </iframe>
  </div>
</div>
<div class="col-md-6 col-12">
  <div class="form-group {{ $errors->has('photo_cover') ? 'has-error' : ''}} col-12 mt-3">
      <label for="photo_cover" class="control-label">{{ 'Photo Cover' }}</label>
      <input class="form-control d-none" name="photo_cover" type="file" id="photo_cover" value="{{ isset($news->photo_cover) ? $news->photo_cover : ''}}" accept="image/*" onchange="previewImage(this)">
      <!-- <img id="preview_photo_cover" src="{{ url('/') }}" alt="ภาพพรีวิว" class="mt-5 d-none" style="max-width:100%; max-height:250px;"> -->
      
      
      
      <label id="upload_photo_cover" for="photo_cover" class="container_upload">
          @if(!empty($news->photo_cover))
          <div class="d-flex justify-content-center w-100 ">
            <img src="{{ url('storage')}}/{{ $news->photo_cover }}" alt="รูปภาพปก">
          </div>
          @else
          <div class="upload_section">
            <div class="text-center">
              <i class="fa-solid fa-cloud-arrow-up"></i>
              <p>Upload img</p>
            </div>
          </div>
          @endif
      </label>


      <div id="container_photo_cover" class="container_upload_preview d-none">
        <label for="photo_cover" class="btn btn-success" style="top: 10px; right: 10px;position: absolute; z-index: 999999999999999999;">เลือกใหม่</label>
        <img id="preview_photo_cover" src="{{ url('/') }}" alt="ภาพพรีวิว" class="mt-5 d-none" style="max-width:50px; max-height:50px !important;">
      </div>  
      {!! $errors->first('photo_cover', '<p class="help-block">:message</p>') !!}
  </div>
  <div class="form-group {{ $errors->has('photo_content') ? 'has-error' : ''}} col-12 mt-3">
      <label for="photo_content" class="control-label">{{ 'Photo Content' }}</label>
      <input class="form-control  d-none" name="photo_content" type="file" id="photo_content" value="{{ isset($news->photo_content) ? $news->photo_content : ''}}"  accept="image/*" onchange="previewImage(this)">
      <!-- <label for="photo_content" class="control-label"><img src="{{ url('img/icon/upload.png') }}" alt="" style="width: 100%;"></label> -->
      <br>
      <label id="upload_photo_content" for="photo_content" class="container_upload">
          @if(!empty($news->photo_content))
            <div class="d-flex justify-content-center w-100 ">
              <img src="{{ url('storage')}}/{{ $news->photo_content }}" alt="รูปภาพปก">
            </div>
          @else
            <div class="upload_section">
              <div class="text-center">
                <i class="fa-solid fa-cloud-arrow-up"></i>
                <p>Upload img</p>
              </div>
            </div>
          @endif
      </label>
      <div id="container_photo_content" class="container_upload_preview d-none">
        <label for="photo_content" class="btn btn-success" style="top: 10px; right: 10px;position: absolute; z-index: 999999999999999999;">เลือกใหม่</label>
        <img id="preview_photo_content" src="{{ url('/') }}" alt="ภาพพรีวิว" class="mt-5 d-none" style="max-width:50px; max-height:50px !important;">
      </div>  

      {!! $errors->first('photo_content', '<p class="help-block">:message</p>') !!}
  </div>
</div>



<div class="form-group d-none {{ $errors->has('user_id') ? 'has-error' : ''}} col-md-6">
    <label for="user_id" class="control-label">{{ 'User Id' }}</label>
    <input class="form-control" name="user_id" type="number" id="user_id" value="{{ Auth::user()->id}}" >
    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="col-md-12">

</div>
</div>
<div class="form-group mt-5">
    <input class="btn btn-primary px-5 float-end" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>

<!-- <input class="form-control d-noe" name="photo" type="file" id="photo" typeEdit="first-profile" accept="image/*" onchange="previewImage(this)"required> -->

<input type="text" class="form-control d-none" id="name" name="name" value="{{ isset(Auth::user()->name) ? Auth::user()->name : ''}}" readonly>
  <input type="text" class="d-none" id="user_id" name="user_id" value="{{ Auth::user()->id }}" readonly>
  <input type="text" class="d-none" id="link" name="link" value="{{ isset($news->link) ? $news->link : ''}}" readonly>
  <input type="text" class="d-none" id="photo_content_X" name="photo_content_X" value="" readonly>
  <input type="text" class="d-none" id="photo_content_Y" name="photo_content_Y" value="" readonly>
  <input type="text" class="d-none" id="photo_content_Width" name="photo_content_Width" value="" readonly>
  <input type="text" class="d-none" id="photo_content_Height" name="photo_content_Height" value="" readonly>



  <input type="text" class="d-none" id="photo_cover_X" name="photo_cover_X" value="" readonly>
  <input type="text" class="d-none" id="photo_cover_Y" name="photo_cover_Y" value="" readonly>
  <input type="text" class="d-none" id="photo_cover_Width" name="photo_cover_Width" value="" readonly>
  <input type="text" class="d-none" id="photo_cover_Height" name="photo_cover_Height" value="" readonly>


<script>
 document.addEventListener('DOMContentLoaded', (event) => {
        // console.log("START");
        let link_YT = document.querySelector('#link').value
        let iframe_yt = document.getElementById('iframe_yt')

        if (link_YT) {
          iframe_yt.classList.remove('d-none');
          iframe_yt.src = "https://www.youtube.com/embed/"+link_YT;
        }
    });
  function previewImage(input) {
    console.log(input.name);
    let preview = document.getElementById('preview_' + input.name);
    let container_preview = document.getElementById('container_' + input.name);
    let upload_preview = document.getElementById('upload_' + input.name);
    // let btn_select_new_img = document.querySelector('#btn_select_new_img');
    // console.log('asd');
    if (input.files && input.files[0]) {
      let reader = new FileReader();

      reader.onload = function(e) {
        // edit_first_profile.classList.add('d-none');
        // btn_select_new_img.classList.remove('d-none');
        preview.src = e.target.result;
        preview.classList.remove('d-none');
        container_preview.classList.remove('d-none');
        upload_preview.classList.add('d-none');
        // Initialize or update cropper
        if (preview.cropper) {
          preview.cropper.destroy();
        }
        cropper_img(preview ,input);
      };

      reader.readAsDataURL(input.files[0]);
    } else {
      preview.src = '#';
      preview.classList.add('d-none');
      container_preview.classList.add('d-none');
      upload_preview.classList.remove('d-none');

      if (preview.cropper) {
        preview.cropper.destroy();
      }
    }
  }

  function cropper_img(imageElement ,dataInput) {
    new Cropper(imageElement, {
      aspectRatio: 16 / 9,
      viewMode: 2,
      crop(event) {
        // console.log("x >> " + event.detail.x);
        // console.log("y >> " + event.detail.y);
        console.log("y >> " + dataInput.name);
        // console.log("width >> " + event.detail.width);
        // console.log("height >> " + event.detail.height);
        // console.log("rotate >> " + event.detail.rotate);
        // console.log("scaleX >> " + event.detail.scaleX);
        // console.log("scaleY >> " + event.detail.scaleY);
        document.getElementById(dataInput.name + '_X').value = event.detail.x;
        document.getElementById(dataInput.name + '_Y').value = event.detail.y;
        document.getElementById(dataInput.name + '_Width').value = event.detail.width;
        document.getElementById(dataInput.name + '_Height').value = event.detail.height;
      },
    });
  }

</script>

    

<script>
    function extractYouTubeID(url) {
    const regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|shorts\/)([^#\&\?]*).*/;
    const match = url.match(regExp);

    let iframe_yt = document.getElementById('iframe_yt')
    let link = document.getElementById('link')

    if (match && match[2].length == 11) {
        iframe_yt.classList.remove('d-none');
        iframe_yt.src = "https://www.youtube.com/embed/"+match[2];
        link.value = match[2];

        return match[2];
    } else {
        let preview = document.getElementById('iframe_yt').classList.add('d-none');
        link.value = "";

        return 'Invalid URL';
    }
}

// ตัวอย่างการใช้งาน

</script>