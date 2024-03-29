@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Cancel_player {{ $cancel_player->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/cancel_player') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/cancel_player/' . $cancel_player->id . '/edit') }}" title="Edit Cancel_player"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('cancel_player' . '/' . $cancel_player->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Cancel_player" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $cancel_player->id }}</td>
                                    </tr>
                                    <tr><th> User Id </th><td> {{ $cancel_player->user_id }} </td></tr><tr><th> Shirt Size </th><td> {{ $cancel_player->shirt_size }} </td></tr><tr><th> Time Get Shirt </th><td> {{ $cancel_player->time_get_shirt }} </td></tr><tr><th> Time Joined </th><td> {{ $cancel_player->time_joined }} </td></tr><tr><th> Return Shirt </th><td> {{ $cancel_player->return_shirt }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
