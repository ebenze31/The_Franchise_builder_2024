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
    }.news-detail{
        color: #07285A;
        text-indent: 40px;
        margin-bottom: 10px;
    }.video-news{
        width: 100%;
    }.divvideo{
        padding: 50px;
    }
</style>
    <div class="container p-0">
        <div class="row">
            <!-- @include('admin.sidebar') -->

            <div class="col-12" >
                <div class="card news-card ">
                    <div class="card-body">
                        @if(!empty($news->photo_cover))
                            <img src="{{ url('storage')}}/{{ $news->photo_content }}" class="cover-img" alt="รูปภาพปก">
                        @else
                            <img src="{{ url('/img/other/news-cover.png') }}" class="cover-img" alt="รูปภาพปก">
                        @endif
                        <h4 class="text-center mt-2">
                            {{$news->title}}
                        </h4>

                        <p class="news-detail">{{$news->detail}}</p>

                        <div class="divvideo">
                            <video src="{{ $news->link }}" class="video-news" controls></video>
                        </div>
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
