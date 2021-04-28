{{-- \resources\views\users\index.blade.php --}}
@extends('layouts.app')

@section('title', '| Users')

@section('content')

<div class="container col-lg-8 col-lg-offset-1">
    <h1><i class="fa fa-users"></i> User Administration</h1>
    <hr>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">

            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Registered On</th>
                    <th>Email Verif.</th>
                    <th>User Role</th>
                    <th>Operations</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($users as $user)
                <tr>

                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone_no }}</td>
                    <td> 
                        {{ \Illuminate\Support\Str::limit($user->address, 8, '..') }}
                    </td>
                    <td>{{ $user->created_at->format('F d, Y h:ia') }}</td>
                    <td>
                        @if($user->email_verified_at)         
                            <i class="fa fa-check" style="color: #44bd32" aria-hidden="true"></i>        
                        @else
                            <i class="fa fa-times" style="color: #c23616" aria-hidden="true"></i>          
                        @endif
                    </td>
                    <td>{{  $user->roles()->pluck('name')->implode(' ') }}</td>{{-- Retrieve array of roles associated to a user and convert to string --}}
                    <td>
                    <div style="display: flex">
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info pull-left mr-2" style="margin-right: 3px;">Edit</a>

                        {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id] ]) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </div>



                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>

    <a href="{{ route('users.create') }}" class="btn btn-success">Add User</a>

</div>

@endsection
