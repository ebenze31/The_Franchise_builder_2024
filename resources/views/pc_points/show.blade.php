@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Pc_point {{ $pc_point->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/pc_points') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/pc_points/' . $pc_point->id . '/edit') }}" title="Edit Pc_point"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('pc_points' . '/' . $pc_point->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Pc_point" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $pc_point->id }}</td>
                                    </tr>
                                    <tr><th> Week </th><td> {{ $pc_point->week }} </td></tr><tr><th> Pc Point </th><td> {{ $pc_point->pc_point }} </td></tr><tr><th> New Code </th><td> {{ $pc_point->new_code }} </td></tr><tr><th> User Id </th><td> {{ $pc_point->user_id }} </td></tr><tr><th> Group Id </th><td> {{ $pc_point->group_id }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
