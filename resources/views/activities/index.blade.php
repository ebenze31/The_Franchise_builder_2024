@extends('layouts.theme_admin')

@section('content')
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
                            <div class="col-12 col-md-6">
                                <div class="card radius-10 border shadow-none btn" data-bs-toggle="collapse" data-bs-target="#flush-{{ $item->id }}">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div>
                                                <h4 class="mb-0">{{ $item->name_Activities }}</h4>
                                                <p class="mb-0 text-secondary"></p>
                                            </div>
                                            <div class="widgets-icons ms-auto">
                                                <img src="{{ url('storage')}}/{{ $item->icon }}" style="width:90%;">
                                            </div>
                                        </div>
                                    </div>
                                    <div id="flush-{{ $item->id }}" class="collapse" data-bs-parent="#accordionActivities" style="padding: 10px;">
                                        <div class="row">
                                            <hr>
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
                                        </div>
                                        <br>
                                        <div class="float-end">
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
                            @endforeach

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
