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
        }
        .news-detail{
            color: #07285A;
            text-indent: 40px;
            margin-bottom: 10px;
        }.news-create{
            color: #07285A;
            text-align: end;
            
        }.news-card{
            border-radius: 10px;
            background-color: #fff;
        }#header-text-login{
            width:45% !important;
        }
    </style>
    <div class="container">
        <div class="row">
            <!-- @include('admin.sidebar') -->

            <h3 class="text-white">News</h3>
            @foreach($news as $item)
            <a href="{{ url('/news/' . $item->id) }}" class="p-0 m-0">
                <div class="card news-card p-2">
                @if(!empty($item->photo_cover))
                <img src="{{ url('storage')}}/{{ $item->photo_cover }}" class="cover-img" alt="รูปภาพปก">
                @else
                <img src="{{ url('/img/other/news-cover.png') }}" class="cover-img" alt="รูปภาพปก">
                @endif
                <h4 class="news-title">{{ $item->title }}</h4>
                <p class="news-detail">{{ $item->detail }}</p>
                <p class="float-end news-create">{{ date("d/m/Y" , strtotime($item->created_at)) }} </p>
            </div>
            </a>
            
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
