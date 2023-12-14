@extends('layouts.theme_login')

@section('content')
<style>
    .header-login h6 {
        color: #fff;
        text-align: center;
        margin-top: 10px;
    }

    .detail-login p {
        text-indent: 15px;
    }

    .form-login {
        margin-top: 40px;
    }
    .label-form{
        font-size: 16px;
    }
    #header-text-login{
        margin-top: 22%;
        width: 80% !important;
    }
    .forgot-password{
        text-align: center;
        width: 100%;
        display: flex;
        justify-content: center;
        margin-top: 10px;

        >a{
            color: #fff;
            font-size: 11px;
        }
    }


    .btn-login{
        background-color: #005cd3;
        color: #fff;
        padding:  10px 35px;
    }
    .input-login ,.input-login:focus{
        background-color: #2a3c68;
        color: #30DAE5;
        border: none;
        padding: 9px;

    }
    input:-webkit-autofill,
    input:-webkit-autofill:hover,
    input:-webkit-autofill:focus,
    input:-webkit-autofill:active {
        color: #30DAE5;
        transition: background-color 5000s ease-in-out 0s;
        -webkit-text-fill-color: #30DAE5;
    }
    .header-terms{
        color:#00377F;
        font-weight: bold;
    }
    .detail-terms{
        color:#00377F;
        text-indent: 15px;
        font-size: 11px;
    }

    .checkbox-accept{
        accent-color: #00377F;
        width: 20px; 
        height: 20px; 
    }.text-checkbox-accept{
        color:#00377F;
        font-size: 11px;
    }.modal-border{
        border-radius: 10px;
    }

    @media (width > 767px) {
        #header-text-login {
            width: 40% !important;
        }
        .form-group{
            margin-top: 10px;
        }.btn-login{
            float: right;
        }
    }

    @media (width > 991px) {
        #header-text-login {
           margin-top: 15%;
        }
        .form-group{
            margin-top: 10px;
        }.btn-login{
            float: right;
        }
    }

    @media (width >= 1200px) {
        #header-text-login {
           margin-top: 12%;
        }
        .form-group{
            margin-top: 10px;
        }.btn-login{
            float: right;
        }
    }
</style>
<div class="container">
    <div class="header-login">
        <h6>
            <b>Hi there, welcome!</b>
        </h6>
    </div>
    <div class="detail-login">
        <p class="mb-1">กรุณากรอกหมายเลขรหัสเอเจนท์ (Agent Code) ที่ช่องแรกและ ใช้วันเดือนปีเกิด (ค.ศ. 4 ตัว) ของคุณ เพื่อเป็นรหัสผ่าน เช่น เกิดวันที่ 1 เดือนกันยายน ปี ค.ศ. 1984 รหัสผ่านของคุณจึงเป็น 01091984</p>
        <p>Enter your Agent Code in the first field and use your date of birth (4-digit year) as your password in the second field. E.g. You were born on
            Sep 1st, 1984, your password is 01091984.</p>
    </div>

    <div class="form-login">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group row">
                <label for="account" class="col-md-4 col-form-label text-md-right label-form">{{ __('Username') }}</label>

                <div class="col-md-6">
                    <input id="account" type="account" class="form-control @error('account') is-invalid @enderror input-login" name="account" value="{{ old('account') }}" required autocomplete="account" autofocus>
                    @error('account')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right label-form mt-2">{{ __('Password') }}</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror input-login" name="password" required autocomplete="current-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="w-100 forgot-password">
                <a href="" class=" w-100"><u>Forgot Password</u></a>
            </div>

            <div class="form-group mb-0 d-flex justify-content-center w-100 mt-3 ">
                <div class="col-md-8">
                    <button type="submit" class="btn btn-login">
                        {{ __('Login') }}
                    </button>
                </div>
            </div>
        </form>
        
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="ModalTerms" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog modal-dialog-centered p-5" role="document">
    <div class="modal-content modal-border">
      <div class="modal-body px-4">
        <h5 class="modal-title text-center pb-2 header-terms" id="exampleModalLabel">Terms & condition</h5>
        <p class="detail-terms">AZAY จะทำการเก็บรวบรวม ใช้ หรือเปิดเผยรหัส เอเจนท์ (Agent code) และวันเดือนปีเกิดของท่านต่อ บริษัท Box Exhibit เพื่อการเข้าร่วมและจัดกิจกรรม THE FRANCHISE BUILDER 2024</p>
        <p class="detail-terms"> AZAY will process your Agent code and date of birth for the purpose relating to organizing THE FRANCHISE BUILDER 2024</p>
        <div class="d-flex justify-content-center align-items-center mt-4">
            <input type="checkbox" name="" id="acceptTerms" class="checkbox-accept" onclick="setCookie()">
            <span class="text-checkbox-accept ms-2 f"> 
                <label for="acceptTerms"> 
                    I agree with the Terms and Conditions
                </label>
            </span>
            <button type="button" class="btn btn-secondary d-none" id="btn-colse-modal" data-dismiss="modal">Close</button>

        </div>
      </div>
     
    </div>
  </div>
</div>
<!-- JS code -->

<!--JS below-->

<script>
    // ตรวจสอบว่ามีการโหลด cookie หรือไม่
    
    document.addEventListener('DOMContentLoaded', (event) => {
        checkCookie();
        
    });

function checkCookie() {

  var isChecked = getCookie("Terms & condition");
  if (isChecked === "") {
        // ถ้ามี cookie แล้วให้ตรวจสอบ checkbox
        
        $('#ModalTerms').modal('show');
    } 
}

// สร้าง cookie เมื่อ checkbox ถูกติ๊ก
function setCookie() {
  var checkbox = document.getElementById("acceptTerms");
  if (checkbox.checked) {
    document.cookie = "Terms & condition=true; expires=Fri, 31 Dec 9999 23:59:59 GMT; path=/";
    document.getElementById("btn-colse-modal").click();
  } else {
    document.cookie = "Terms & condition=; expires=Thu, 01 Jan 1970 00:00:00 GMT; path=/";

  }
}

// ดึงค่าของ cookie
function getCookie(name) {
  var nameEQ = name + "=";
  var ca = document.cookie.split(';');
  for(var i = 0; i < ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) === ' ') c = c.substring(1, c.length);
    if (c.indexOf(nameEQ) === 0) return c.substring(nameEQ.length, c.length);
  }
  return "";
}

</script>

<!-- 
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="account" class="col-md-4 col-form-label text-md-right">{{ __('Account') }}</label>

                            <div class="col-md-6">
                                <input id="account" type="account" class="form-control @error('account') is-invalid @enderror" name="account" value="{{ old('account') }}" required autocomplete="account" autofocus>

                                @error('account')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->
@endsection