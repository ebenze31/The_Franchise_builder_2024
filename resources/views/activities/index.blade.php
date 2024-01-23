@extends('layouts.theme_admin')

@section('content')

<style>
    
    .switch {
      --circle-dim: 1.4em;
      font-size: 14px;
      position: relative;
      display: inline-block;
      width: 3.5em;
      height: 2em;
    }

    /* Hide default HTML checkbox */
    .switch input {
      opacity: 0;
      width: 0;
      height: 0;
    }

    /* The slider */
    .slider {
      position: absolute;
      cursor: pointer;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: #f5aeae;
      transition: .4s;
      border-radius: 30px;
    }

    .slider-card {
      position: absolute;
      content: "";
      height: var(--circle-dim);
      width: var(--circle-dim);
      border-radius: 20px;
      left: 0.3em;
      bottom: 0.3em;
      transition: .4s;
      pointer-events: none;
    }

    .slider-card-face {
      position: absolute;
      inset: 0;
      backface-visibility: hidden;
      perspective: 1000px;
      border-radius: 50%;
      transition: .4s transform;
    }

    .slider-card-front {
      background-color: #DC3535;
    }

    .slider-card-back {
      background-color: #379237;
      transform: rotateY(180deg);
    }

    input:checked ~ .slider-card .slider-card-back {
      transform: rotateY(0);
    }

    input:checked ~ .slider-card .slider-card-front {
      transform: rotateY(-180deg);
    }

    input:checked ~ .slider-card {
      transform: translateX(1.5em);
    }

    input:checked ~ .slider {
      background-color: #9ed99c;
    }

</style>

<!-- ICON ACTIVE -->
<style>
    .switch-holder {
  display: flex;
  padding: 5px 10px;
  border-radius: 10px;
  box-shadow: -8px -8px 15px rgba(255, 255, 255, .7),
        10px 10px 10px rgba(0, 0, 0, .2),
        inset 8px 8px 15px rgba(255, 255, 255, .7),
        inset 10px 10px 10px rgba(0, 0, 0, .2);
  justify-content: space-between;
  align-items: center;
}

.switch-label {
  padding: 0 10px 0 10px
}

.switch-label i {
  margin-right: 5px;
}

.switch-toggle {
  height: 30px;
}

.switch-toggle input[type="checkbox"] {
  position: absolute;
  opacity: 0;
  z-index: -2;
}

.switch-toggle input[type="checkbox"]+label {
  position: relative;
  display: inline-block;
  width: 80px;
  height: 30px;
  border-radius: 20px;
  margin: 0;
  cursor: pointer;
  box-shadow: inset -8px -8px 15px rgba(255, 255, 255, .6),
        inset 10px 10px 10px rgba(0, 0, 0, .25);
}

.switch-toggle input[type="checkbox"]+label::before {
  position: absolute;
  content: 'OFF';
  font-size: 13px;
  text-align: center;
  line-height: 25px;
  top: 3px;
  left: 4px;
  width: 45px;
  height: 25px;
  border-radius: 20px;
  background-color: #eeeeee;
  box-shadow: -3px -3px 5px rgba(255, 255, 255, .5),
        3px 3px 5px rgba(0, 0, 0, .25);
  transition: .3s ease-in-out;
}

.switch-toggle input[type="checkbox"]:checked+label::before {
  left: 36%;
  content: 'ON';
  color: #fff;
  background-color: #00b33c;
  box-shadow: -3px -3px 5px rgba(255, 255, 255, .5),
        3px 3px 5px #00b33c;
}
</style>

<div class="container-fluid">
    <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <h3 class="card-header row">
                        <div class="col-6">
                            กิจกรรมทั้งหมด
                        </div>
                        <div class="col-6">
                            <form method="GET" action="{{ url('/activities') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search" style="width: 60%;float:right;">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                                    <span class="input-group-append">
                                        <button class="btn btn-secondary" type="submit">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </div>
                            </form>
                        </div>
                    </h3>
                    <div class="card-body">

                        <div class="row mt-3 mb-3" id="accordionActivities">

                            @foreach($activities as $item)

                            <div class="col-6 card radius-10 border shadow-none btn">
                                <div class="card-body">

                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <img src="{{ url('storage')}}/{{ $item->icon }}" style="width:60px;height: 60px;">
                                            <h4 class="mb-0 mx-3">{{ $item->name_Activities }}</h4>
                                        </div>

                                        @php
                                            $check_active = '';
                                            if($item->status == "Active"){
                                                $check_active = 'checked';
                                            }
                                        @endphp
                                        <div class="">
                                            <div class="switch-holder">
                                                <div class="switch-toggle">
                                                    <input type="checkbox" id="active_{{ $item->id }}" {{ $check_active }} onclick="change_active('{{ $item->id }}')">
                                                    <label for="active_{{ $item->id }}"></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <hr>
                                    <div class="row">
                                        <div class="col-12 col-md-4 mt-2 mb-2">
                                            <div class="d-flex justify-content-center w-100">
                                                <img src="{{ url('img/qr_Activities')}}/{{ $item->qr_code }}" class="qr-profile" alt="รูปภาพ QR Code" style="width:80%;">
                                            </div>
                                            <a href="{{ url('img/qr_Activities')}}/{{ $item->qr_code }}" class="btn btn-sm btn-primary" download>
                                                Download
                                            </a>
                                        </div>
                                        <div class="col-12 col-md-8 mt-2 mb-2 text-start">
                                            <span class="float-start">{{ $item->detail }}</span>
                                        </div>
                                        <hr class="mt-2 mb-2">

                                        @php
                                            $check_show_staff = '';
                                            if($item->show_staff == "Yes"){
                                                $check_show_staff = 'checked';
                                            }
                                        @endphp

                                        <div class="col-12 mt-2 mb-2">
                                            <div class="float-start">
                                                Show Staff
                                                <br>
                                                <label class="switch">
                                                    <input id="switch_id_{{ $item->id }}" {{ $check_show_staff }} type="checkbox" onclick="change_show_staff('{{ $item->id }}')">
                                                    <div class="slider"></div>
                                                    <div class="slider-card">
                                                        <div class="slider-card-face slider-card-front"></div>
                                                        <div class="slider-card-face slider-card-back"></div>
                                                    </div>
                                                </label>
                                            </div>
                                            <div class="float-end mt-3">
                                                <a href="{{ url('/activities/' . $item->id) }}" title="Edit Activity"><button class="btn btn-info btn-sm"><i class="fa-solid fa-memo-circle-info"></i> รายละเอียด</button></a>

                                                <a href="{{ url('/activities/' . $item->id . '/edit') }}" title="Edit Activity"><button class="btn btn-warning btn-sm"><i class="fa-solid fa-pen-to-square"></i> Edit</button></a>

                                                <form method="POST" action="{{ url('/activities' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete Activity" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa-solid fa-delete-right"></i> Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @endforeach

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        
        function change_show_staff(id){
            // console.log(id);

            let switch_id = document.querySelector('#switch_id_'+ id);
                // console.log(switch_id.checked);

            let status ;
            if(switch_id.checked){
                status = "Yes";
            }else{
                status = "No";
            }

            fetch("{{ url('/') }}/api/change_show_staff" + "/" + id + "/" + status)
                .then(response => response.text())
                .then(result => {
                // console.log(result);
            });
        }

        function change_active(id){
            // console.log(id);

            let active = document.querySelector('#active_'+ id);

            let status ;
            if(active.checked){
                status = "Yes";
            }else{
                status = "No";
            }
            
            // console.log(status);

            fetch("{{ url('/') }}/api/change_active" + "/" + id + "/" + status)
                .then(response => response.text())
                .then(result => {
                // console.log(result);
            });

        }

    </script>

@endsection
