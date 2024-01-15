@extends('layouts.theme_user')

@section('content')

    <style>
        
        .cover-img{
            width: 100%;
            aspect-ratio: 350 /185 ;
            border-radius: 8px;
            object-fit: cover;
        }.news-title{
            text-indent: 15px;
            margin-top: 5px;
            color: #07285A;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            width: 100%;
            font-size: 16px;
            font-weight: bold;
            -webkit-letter-spacing: 5px !important;  
            letter-spacing:5px !important; 
            -moz-letter-spacing:5px !important;
            -khtml-letter-spacing:5px !important;
        }
        .news-detail{
            color: #07285A;
            font-size: 14px;
            margin-top: 10px;
            text-indent: 40px;
            margin-bottom: 10px;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
            line-height: 19px;
        }.news-create{
            color: #07285A;
            text-align: end;
            
        }.news-card{
            border-radius: 10px;
            background-color: #fff;
        }#header-text-login{
            width:45% !important;
        }
        .new-header{
            width: 100%;
            text-align: center;
            background-color: rgb(255, 255, 255 ,.5);
            color: #07285A;
            padding:  5px 0;
            font-weight: bold;
        }.content-section{
            padding: 0;
        }
    </style>
    <h4 class=" new-header">News</h4>
    <div class="container ">
        <div class="row px-3 pt-2">
            <!-- @include('admin.sidebar') -->

            @php
                $arr_read_not_read = explode(",", Auth::user()->read_not_read);
            @endphp
            
            @foreach($news as $item)
            <a href="{{ url('/news/' . $item->id) }}" id="a_news_id_{{ $item->id }}_blade" class="d-none"></a>
            <div class="p-0 m-0" style="position: relative;" onclick="click_view_news('{{ Auth::user()->id }}' , '{{ $item->id }}' , 'blade');">                
                @if(in_array($item->id, $arr_read_not_read))
                    <span class="btn btn-sm btn-danger" style="position: absolute;right: 4%;top: 4%;z-index: 9999;font-size: 8px;">
                        New
                    </span>
                @endif

                <div class="card news-card p-2">
                    @if(!empty($item->photo_cover))
                    <img src="{{ url('storage')}}/{{ $item->photo_cover }}" class="cover-img" alt="รูปภาพปก">
                    @else
                    <img src="{{ url('/img/other/news-post.png') }}" class="cover-img" alt="รูปภาพปก">
                    @endif
                    @if(!empty($item->title))
                        <p class="news-title mt-2" style="-webkit-letter-spacing: -1px !important; letter-spacing:-1px !important; -moz-letter-spacing:-1px !important;-khtml-letter-spacing:-1px !important;">{{ $item->title }}</p>
                    @endif

                    @if(!empty($item->detail))
                    <p class="news-detail">{{ $item->detail }}</p>
                    @endif
                    <p class="float-end news-create">{{ date("d/m/Y" , strtotime($item->created_at)) }} </p>
                </div>
            </div>

            
            @endforeach
            <!-- <div class="col-md-9">
                <div class="card">
                    <div class="card-header">News</div>
                    <div class="card-body">
                        <a href="{{ url('/news/create') }}" class="btn btn-success btn-sm" title="Add New News">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        <form method="GET" action="{{ url('/news') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Detail</th>
                                        <th>Photo Content</th>
                                        <th>Photo Cover</th>
                                        <th>Link</th>
                                        <th>User Id</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($news as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->title }}</td>
                                        <td>{{ $item->detail }}</td>
                                        <td>{{ $item->photo_content }}</td>
                                        <td>{{ $item->photo_cover }}</td>
                                        <td>{{ $item->link }}</td>
                                        <td>{{ $item->user_id }}</td>
                                        <td>
                                            <a href="{{ url('/news/' . $item->id) }}" title="View News"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/news/' . $item->id . '/edit') }}" title="Edit News"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            <form method="POST" action="{{ url('/news' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete News" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $news->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div> -->
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            // console.log("START");
            change_menu_bar('news');
        });


    </script>
@endsection
