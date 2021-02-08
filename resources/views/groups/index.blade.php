@extends('layouts.app')

@section('title', '| Groups')

@section('content')

<div class="container col-lg-6 col-lg-offset-1">
    <h1><i class="fa fa-users"></i> Groups</h1>
    <hr>

    <div style="display: flex;justify-content: flex-end">
        <a href="{{ route('groups.create') }}" class="btn btn-success mb-2">Add Group</a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">

            <thead>
                <tr>
                    <th>Name</th>
                    <th>Date/Time Added</th>
                    <th>Operations</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($groups as $group)
                <tr>

                    <td>{{ $group->group_name }}</td>
                    <td>{{ $group->created_at->format('F d, Y h:ia') }}</td>
                    <td>
                        
                    <div style="display: flex">
                        {{-- <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info pull-left mr-2" style="margin-right: 3px;">Edit</a> --}}
                        
                        {!! Form::open(['method' => 'DELETE', 'route' => ['groups.destroy', $group->id] ]) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}

                    </div>



                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>

</div>

@endsection
