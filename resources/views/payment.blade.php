@extends('layouts.app')

{{-- @section('title', '| Users') --}}

@section('content')

<div class="container col-lg-6 col-lg-offset-1">
    <h1><i class="fa fa-credit-card" aria-hidden="true"></i> Purchase Balance</h1>
    <hr>

    @if( session( 'message' ) )
        <div class="alert alert-success" role="alert">
            {{ session( 'message' ) }}
        </div>
    @endif

    <h3 class="mb-2">Balance: {{Auth::user()->balance}}</h3>

    <a href="{{ route('payment', 10) }}" class="btn btn-success">Pay $10</a>
    <a href="{{ route('payment', 50) }}" class="btn btn-success">Pay $50</a>
    <a href="{{ route('payment', 100) }}" class="btn btn-success">Pay $100</a>

    {{-- <a href="{{ route('users.create') }}" class="btn btn-success">Add User</a> --}}

</div>

@endsection
