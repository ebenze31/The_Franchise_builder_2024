@extends('layouts.theme_user')

@section('content')
<style>
    #header-text-login{
        width:45% !important;
    }.news-card{
        border-radius: 10px;
        background-color: #fff;
    } .cover-img{
        width: 100%;
        aspect-ratio: 350 /185 ;
        object-fit: cover;
    }.news-detail{
        color: #07285A;
        text-indent: 40px;
        margin-bottom: 10px;
    }.video-news{
        width: 100%;
    }.divvideo{
        display: flex;
        justify-content: center;
        padding: 50px 0;
        position: relative;
        padding-bottom: 56.25%; /* 16:9 */
        padding-top: 25px;
        height: 0;
    }.ytp-gradient-top {
        display: none !important;
    }.videoWrapper {
        position: relative;
        padding-bottom: 56.25%; /* 16:9 */
        padding-top: 25px;
        height: 0;
    }
    .videoWrapper iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }.btn-back{
        color: #f8f9fa;
    }.div-btn-back{
        position: absolute;
        top: 0;
        left: 10px;
        z-index: 9999;
        width: 200px;
    }.news-detail{
        line-height: 19px;

    }
</style>
<div class="div-btn-back">
            <button type="button" class="btn btn-sm btn-back  mt-3" onclick="goBack();">
               <i class="fa-solid fa-chevron-left"></i>
            </button>
            <!-- <a href="{{ url('/news/index') }}" class="btn btn-sm btn-back  mt-3" >
               <i class="fa-solid fa-chevron-left"></i>
            </a> -->
        </div>
    <div class="container p-0">
        <div class="row">
            <!-- @include('admin.sidebar') -->

            <div class="col-12" >
                <div class="card news-card ">
                    <div class="card-body">
                        @if(!empty($news->photo_content))
                            <img src="{{ url('storage')}}/{{ $news->photo_content }}" class="cover-img" alt="รูปภาพปก">
                        @else
                            <img src="{{ url('/img/other/new-post.png') }}" class="cover-img" alt="รูปภาพปก">
                        @endif

                        @if(!empty($news->title))
                        <p style="font-size: 16px;font-weight: bold;text-indent: 15px;color: #07285A;-webkit-letter-spacing: -1px !important; letter-spacing:-1px !important; -moz-letter-spacing:-1px !important;-khtml-letter-spacing:-1px !important;" class="mt-2">
                            {{$news->title}}
                        </p>
                        <br>
                        @endif
                        @if(!empty($news->detail))
                        <p class="news-detail">{{$news->detail}}</p>
                        @endif

                        <!-- <div class="divvideo"> -->
                            <!-- <iframe id="asd" style="height: auto;"
                                src="https://www.youtube.com/embed/{{ $news->link }}"
                                title="YouTube video player"
                                frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowfullscreen>
                            </iframe> -->
                        <!-- </div> -->
                        @if(!empty($news->link))
                        <div class="videoWrapper mt-4">
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/{{ $news->link }}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                        </div>
                        @endif
                        <!-- <a href="{{ url('/news') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/news/' . $news->id . '/edit') }}" title="Edit News"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('news' . '/' . $news->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete News" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $news->id }}</td>
                                    </tr>
                                    <tr><th> Title </th><td> {{ $news->title }} </td></tr><tr><th> Detail </th><td> {{ $news->detail }} </td></tr><tr><th> Photo Content </th><td> {{ $news->photo_content }} </td></tr><tr><th> Photo Cover </th><td> {{ $news->photo_cover }} </td></tr><tr><th> Link </th><td> {{ $news->link }} </td></tr><tr><th> User Id </th><td> {{ $news->user_id }} </td></tr>
                                </tbody>
                            </table>
                        </div> -->

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
