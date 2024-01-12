@extends('layouts.theme_admin')

@section('content')
<div class="container-fluid">
    <div class="col">
        <div class="card border-top border-0 border-4 border-primary">
            <div class="card-body p-5">
                <div class="card-title d-flex align-items-center">
                    <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
                    </div>
                    <h5 class="mb-0 text-primary">เพิ่มข่าวใหม่</h5>
                </div>
                <hr>
              
                <form method="POST" action="{{ url('/news/' . $news->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}

                            @include ('news.form', ['formMode' => 'edit'])

                        </form>

            </div>
        </div>
    </div>
</div>


@endsection