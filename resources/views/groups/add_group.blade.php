@extends('layouts.theme_admin')

@section('content')

<style>
    
    .loader {
        display: flex;
        /* align-items: center;*/
        /* justify-content: center;*/
        flex-direction: row;
    }

    .slider {
        overflow: hidden;
        background-color: white;
        margin: 0 15px;
        height: 40px;
        width: 20px;
        border-radius: 30px;
        box-shadow: 15px 15px 20px rgba(0, 0, 0, 0.1), -15px -15px 30px #fff,
        inset -5px -5px 10px rgba(0, 0, 255, 0.1),
        inset 5px 5px 10px rgba(0, 0, 0, 0.1);
        position: relative;
    }

    .slider::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        height: 20px;
        width: 20px;
        border-radius: 100%;
        box-shadow: inset 0px 0px 0px rgba(0, 0, 0, 0.3), 0px 420px 0 400px #2697f3,
        inset 0px 0px 0px rgba(0, 0, 0, 0.1);
        animation: animate_2 2.5s ease-in-out infinite;
        animation-delay: calc(-0.5s * var(--i));
    }

    @keyframes animate_2 {
        0% {
            transform: translateY(250px);
            filter: hue-rotate(0deg);
        }

        50% {
            transform: translateY(0);
        }

        100% {
            transform: translateY(250px);
            filter: hue-rotate(180deg);
        }
    }

    .loading-container {
        display: flex;
    }

    .loading-spinner {
        border: 4px solid rgba(0, 0, 0, 0.1);
        border-left-color: #000;
        animation: spin 1s linear infinite;
        border-radius: 50%;
        width: 40px;
        height: 40px;
        margin-right: 20px;
        margin-top: 50px;
        margin-bottom: 50px;
    }


    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    @keyframes drawCheck {
        0% {
            transform: scale(0);
        }

        100% {
            transform: scale(1);
        }
    }

    .checkmark {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        display: block;
        stroke-width: 2;
        stroke: #29cc39;
        stroke-miterlimit: 10;
        margin: 10% auto;
        box-shadow: inset 0px 0px 0px #ffffff;
        animation: fill 0.9s ease-in-out .4s forwards, scale .3s ease-in-out .9s both
    }

    .checkmark__check {
        transform-origin: 50% 50%;
        stroke-dasharray: 48;
        stroke-dashoffset: 48;
        animation: stroke 0.8s cubic-bezier(0.65, 0, 0.45, 1) 0.8s forwards
    }

    @keyframes stroke {
        100% {
            stroke-dashoffset: 0
        }
    }

    @keyframes scale {

        0%,
        100% {
            transform: none
        }

        50% {
            transform: scale3d(1.1, 1.1, 1)
        }
    }

    @keyframes fill {
        100% {
            box-shadow: inset 0px 0px 0px 60px #fff
        }
    }

    .radius-20 {
        border-radius: 20px;
    }

</style>

<div class="card">
    <div class="card-body">

        <h4 class="mb-0 text-uppercase">เพิ่มจำนวนบ้าน</h4>
        <hr class="mt-3 mb-3">

        <div class="row">
            <div class="col-12 col-md-6">
                <label for="amount_add" class="form-label">
                    ระบุจำนวนที่ต้องการเพิ่ม
                    <span class="text-danger">(เดิมมีอยู่ <span id="count_group">{{ $count_group }}</span> หลัง)</span>
                </label>
                <input type="number" min="0" class="form-control" id="amount_add" oninput="document.querySelector('#div_success_spin').classList.add('d-none');" style="width: 100%;">
            </div>
            <div class="col-12 col-md-6">
                <button class="btn btn-success px-5" onclick="add_group()" style="margin-top: 30px;">
                    ยืนยัน
                </button>
            </div>
            <div class="col-12 mt-3">

                <hr>
                <div id="div_loader_add_group" class="col-12 mt-5 d-none">
                    <section class="loader">
                        <div class="slider" style="--i:0"></div>
                        <div class="slider" style="--i:1"></div>
                        <div class="slider" style="--i:2"></div>
                        <div class="slider" style="--i:3"></div>
                        <div class="slider" style="--i:4"></div>
                        <span class="text-success" style="margin-top: 25px;">กำลังประมวลผล..</span>
                    </section>
                </div>
                <div  class="loading-container" class="col-12 mt-5">
                    <div id="div_success_spin" class="contrainerCheckmark d-none">
                        <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                            <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none" />
                            <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" />
                        </svg>
                        <center>
                            <h5 class="mt-3">เสร็จสิ้น</h5>
                        </center>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>


<script>

    function add_group(){

        document.querySelector('#div_loader_add_group').classList.remove('d-none');
        let amount_add = document.querySelector('#amount_add').value ;

        fetch("{{ url('/') }}/api/create_group" + "/" + amount_add )
            .then(response => response.text())
            .then(result => {
                // console.log(result);
                if (result) {
                    document.querySelector('#count_group').innerHTML = result ;
                    document.querySelector('#div_loader_add_group').classList.add('d-none');
                    document.querySelector('#div_success_spin').classList.remove('d-none');
                }

            });

    }

</script>

@endsection
