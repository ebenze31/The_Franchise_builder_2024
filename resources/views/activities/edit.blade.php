@extends('layouts.theme_admin')

@section('content')
<div class="container-fluid">
    <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <!-- <div class="card-header">Edit Activity #{{ $activity->id }}</div> -->
                    <h3 class="card-header">
                        แก้ไขกิจกรรม : {{ $activity->name_Activities }}
                    </h3>
                    <div class="card-body">
                        <!-- <a href="{{ url('/activities') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br /> -->

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ url('/activities/' . $activity->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}

                            @include ('activities.form', ['formMode' => 'edit'])

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
