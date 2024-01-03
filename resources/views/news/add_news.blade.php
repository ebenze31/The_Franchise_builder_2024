@extends('layouts.theme_admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
        	<form method="POST" action="{{ url('/news') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                {{ csrf_field() }}

                @include ('news.form', ['formMode' => 'create'])

            </form>
        </div>
    </div>
</div>

@endsection