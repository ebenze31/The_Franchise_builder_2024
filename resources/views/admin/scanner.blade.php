@extends('layouts.theme_admin')

@section('content')

<!-- Button trigger modal -->
<button id="btn_Modal_cf_slip" type="button" class="d-none" data-toggle="modal" data-target="#Modal_cf_slip">
    <!--  -->
</button>

<!-- Modal -->
<div class="modal fade" id="Modal_cf_slip" tabindex="-1" aria-labelledby="Label_Modal_cf_slip" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="Label_Modal_cf_slip">โปรดตรวจสอบข้อมูลอีกครั้ง</h5>
                <button id="btn_close_Modal_cf_slip" type="button" class="close btn" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div id="content_Modal_cf_slip" class="col-12 text-center">
                        <!-- DATA -->
                    </div>
                    <div class="col-12 text-center mt-4 mb-0">
                        <p>เจ้าหน้าที่ผู้ยืนยัน : {{ Auth::user()->name }}</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button id="btn_change_status" style="width: 40%;" type="button" class="btn btn-success">ยืนยัน</button>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="row">
        	<div class="col-12 text-center">
				<h1>QR Code Scanner</h1>
				<video style="width:100%;" id="qr-video"></video>
        	</div>
		</div>
	</div>
</div>


<script src="https://cdn.jsdelivr.net/npm/jsqr/dist/jsQR.js"></script>

<script>
	window.onload = function () {
    const video = document.getElementById('qr-video');
    const canvas = document.createElement('canvas');
    const context = canvas.getContext('2d');

    navigator.mediaDevices.getUserMedia({ video: { facingMode: 'environment' } })
        .then(function(stream) {
            video.srcObject = stream;
            video.play();

            scanQRCode();
        });

    function scanQRCode() {
        if (video.readyState === video.HAVE_ENOUGH_DATA) {
            canvas.height = video.videoHeight;
            canvas.width = video.videoWidth;
            context.drawImage(video, 0, 0, canvas.width, canvas.height);
            const imageData = context.getImageData(0, 0, canvas.width, canvas.height);
            const code = jsQR(imageData.data, imageData.width, imageData.height);

            if (code) {
                // console.log(code.data);
                alert(code.data);

                if(code.data.split('=')[1]){
                	let text_account = code.data.split('=')[1];
                	console.log(text_account);

                	document.querySelector('#btn_Modal_cf_slip').click();
                }
                return;
            }
        }

        requestAnimationFrame(scanQRCode);
    }
};

</script>

@endsection