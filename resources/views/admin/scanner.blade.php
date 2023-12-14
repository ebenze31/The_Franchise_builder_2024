@extends('layouts.theme_admin')

@section('content')

<div class="card">
    <div class="card-body">
        <div class="row">
        	<div class="col-12 text-center">
				<h1>QR Code Scanner</h1>
				<video style="width:100%;" id="qr-video"></video>
        	</div>
        	<br>
			<p>QR Code Result: <span id="qr-result">None</span></p>
		</div>
	</div>
</div>


<script src="https://cdn.jsdelivr.net/npm/jsqr/dist/jsQR.js"></script>

<script>
	window.onload = function () {
    const video = document.getElementById('qr-video');
    const qrResult = document.getElementById('qr-result');
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
                qrResult.textContent = code.data;
                return;
            }
        }

        requestAnimationFrame(scanQRCode);
    }
};

</script>

@endsection