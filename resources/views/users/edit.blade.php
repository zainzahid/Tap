{{-- \resources\views\users\edit.blade.php --}}

@extends('layouts.app')

@section('title', '| Edit User')

@section('content')

<div class='container col-lg-4 col-lg-offset-4'>

    <h1><i class='fa fa-user-plus'></i> Edit {{$user->name}}</h1>
    <hr>

    {{ Form::model($user, array('route' => array('users.update', $user->id), 'method' => 'PUT')) }}{{-- Form model binding to automatically populate our fields with user data --}}

    {{-- Errors --}}
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('email', 'Email') }}
        {{ Form::email('email', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('phone_no', 'Phone No') }}
        {{ Form::number('phone_no', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('address', 'Address') }}
        {{ Form::textarea('address', null, array('class' => 'form-control','rows' => 3)) }}
    </div>

    <div class="form-group">
        {{ Form::label('balance', 'Balance') }}
        {{ Form::number('balance', null, array('class' => 'form-control')) }}
    </div>

    <h5><b>Give Role</b></h5>

    <div class='form-group'>
        @foreach ($roles as $role)

            {{-- {{ Form::radio('roles[]',  $role->id, $user->roles->pluck('id')[0] ) }}
            {{ Form::label($role->name, ucfirst($role->name)) }}<br> --}}
             {{-- <?php dd($user->roles->pluck('id')[0]); ?> --}}


            <input type="radio" class="flat" name="roles[]"  value="{{$role->id}}"
                          {{ $user->roles->pluck('id')[0] == $role->id ? 'checked' : '' }} >
            {{ Form::label($role->name, ucfirst($role->name)) }}<br>

        @endforeach
    </div>

    <h5><b>Give Permission</b></h5>

    <div class='form-group'>
        @foreach ($permissions as $permission)
            {{ Form::checkbox('permissions[]',  $permission->id, $user->permissions ) }}
            {{ Form::label($permission->name, ucfirst($permission->name)) }}<br>

        @endforeach
    </div>

    <div class="form-group">
        {{ Form::label('password', 'Password') }}<br>
        {{ Form::password('password', array('class' => 'form-control')) }}

    </div>

    <div class="form-group">
        {{ Form::label('password', 'Confirm Password') }}<br>
        {{ Form::password('password_confirmation', array('class' => 'form-control')) }}

    </div>

    {{ Form::submit('Update', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}

</div>

@endsection
