@extends('layouts.app')

{{-- @section('title', '| Users') --}}

@section('content')

<div class="container col-lg-6 col-lg-offset-1">
    <h1><i class="fa fa-users"></i>Purchase Balance</h1>
    <hr>

    <a href="{{ route('payment', 10) }}" class="btn btn-success">Pay $10 from Paypal</a>
    <a href="{{ route('payment', 50) }}" class="btn btn-success">Pay $50 from Paypal</a>
    <a href="{{ route('payment', 100) }}" class="btn btn-success">Pay $100 from Paypal</a>

    {{-- <a href="{{ route('users.create') }}" class="btn btn-success">Add User</a> --}}

</div>

@endsection
