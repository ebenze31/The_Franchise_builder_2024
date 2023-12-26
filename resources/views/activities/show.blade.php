@extends('layouts.theme_admin')

@section('content')
<div class="container-fluid">
    <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Activity {{ $activity->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/activities') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/activities/' . $activity->id . '/edit') }}" title="Edit Activity"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('activities' . '/' . $activity->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Activity" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $activity->id }}</td>
                                    </tr>
                                    <tr><th> Name Activities </th><td> {{ $activity->name_Activities }} </td></tr><tr><th> Detail </th><td> {{ $activity->detail }} </td></tr><tr><th> Icon </th><td> {{ $activity->icon }} </td></tr><tr><th> Member </th><td> {{ $activity->member }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
