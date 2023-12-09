@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Group {{ $group->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/groups') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/groups/' . $group->id . '/edit') }}" title="Edit Group"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('groups' . '/' . $group->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Group" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $group->id }}</td>
                                    </tr>
                                    <tr><th> Name Group </th><td> {{ $group->name_group }} </td></tr><tr><th> Member </th><td> {{ $group->member }} </td></tr><tr><th> Host </th><td> {{ $group->host }} </td></tr><tr><th> Logo </th><td> {{ $group->logo }} </td></tr><tr><th> Group Line Id </th><td> {{ $group->group_line_id }} </td></tr><tr><th> Key Invite </th><td> {{ $group->key_invite }} </td></tr><tr><th> Status </th><td> {{ $group->status }} </td></tr><tr><th> Rank Last Week </th><td> {{ $group->rank_last_week }} </td></tr><tr><th> Request Join </th><td> {{ $group->request_join }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
