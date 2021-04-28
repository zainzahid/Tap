{{-- \resources\views\users\create.blade.php --}}
@extends('layouts.app')

@section('title', '| Add User')

@section('content')

<div class='container col-lg-4 col-lg-offset-4'>

    <h1><i class='fa fa-user-plus'></i> Add User</h1>
    <hr>

    {{ Form::open(array('url' => 'users')) }}

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
        {{ Form::text('name', '', array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('email', 'Email') }}
        {{ Form::email('email', '', array('class' => 'form-control')) }}
    </div>


    <div class="form-group">
        {{ Form::label('phone_no', 'Phone No') }}
        {{ Form::number('phone_no', '', array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('address', 'Address') }}
        {{ Form::textarea('address', '', array('class' => 'form-control','rows' => 3)) }}
    </div>
    
    <div class="form-group">
        {{ Form::label('balance', 'Balance') }}
        {{ Form::number('balance', 5, array('class' => 'form-control')) }}
    </div>

    <div class='form-group'>
        @foreach ($roles as $role)
            {{ Form::radio('roles[]',  $role->id ) }}
            {{ Form::label($role->name, ucfirst($role->name)) }}<br>

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

    {{ Form::submit('Add', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}

</div>

@endsection
