@extends('layouts.theme_admin')

@section('content')
<style>
    .news-title{
        white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
  width: 100%;
    }
</style>
<div class="container-fluid">
    <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <h3 class="card-header row">
                        <div class="col-6">
                            ข่าวทั้งหมด
                        </div>
                       
                    </h3>
                    <div class="card-body">

                        <div class="row mt-3 mb-3 p-2" id="accordionActivities">

                            @foreach($news as $item)

                            <div class="col-12 col-md-6  d-flex align-items-stretch">
                                <div class="card radius-10 border shadow-none btn p-2">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">  
                                            <!-- <div >
                                                <img src="{{ url('storage')}}/{{ $item->photo_content }}" style="width:200px;">
                                            </div> -->
                                            <div class="ms-4 news-title">
                                                <h4 class="mb-0 ">{{ $item->title }}</h4>
                                                <p class="mb-0 text-secondary"></p>
                                            </div>
                                          
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-12 col-md-3 mt-2 mb-2">
                                                <div class="d-flex justify-content-center w-100">
                                                    <img src="{{ url('storage')}}/{{ $item->photo_cover }}" class="qr-profile" alt="รูปภาพ QR Code" style="width:100%;">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-9  mt-2 mb-2 text-start ">
                                                <span class="float-start">{{ $item->detail }}</span>
                                            </div>
                                            <div class="col-12 mt-2 mb-2">
                                                <div class="float-end">
                                                    <a href="{{ url('/news/' . $item->id) }}" title="Edit Activity" target="bank">
                                                        <button class="btn btn-info btn-sm">
                                                            <i class="fa-solid fa-memo-circle-info"></i> 
                                                            รายละเอียด
                                                        </button>
                                                    </a>

                                                    <a href="{{ url('/news/' . $item->id . '/edit') }}" title="Edit Activity"><button class="btn btn-warning btn-sm"><i class="fa-solid fa-pen-to-square"></i> Edit</button></a>

                                                    <form method="POST" action="{{ url('/news' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                        {{ method_field('DELETE') }}
                                                        {{ csrf_field() }}
                                                        <button type="submit" class="btn btn-danger btn-sm" title="Delete Activity" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa-solid fa-delete-right"></i> Delete</button>
                                                    </form>
                                                </div>
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
@endsection
