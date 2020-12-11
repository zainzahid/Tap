@extends('layouts.app')

@section('content')

<div class="container">
    <form action="{{ route('twilio-number') }}" method='post'>
        @csrf

        <div class="form-group row">
            <label class="col-md-4 col-form-label text-md-right">Add Twilio Number</label>
            <div class="col-md-6">
                <input class="form-control @error('number') is-invalid @enderror" type='text' name='number' />
                @error('number')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-8 offset-md-4">
                <button class="btn btn-primary" type='submit'>Add</button>
            </div>
        </div>
    </form>

    <div class="mt-4 row">
        <div class="col-md-3"></div>
        <table class="col-md-7 table table-striped table-bordered table-responsive-sm">
            <thead>
            <tr>
                <th>#</th>
                <th>Twilio Number</th>
            </tr>
            </thead>
            <tbody>
                @foreach($twilionumbers as $key => $data)
                    <tr id="tr" class="tr{{$data->id}}">
                        <td> {{$key+1}}</td>
                        <td>{{$data->number}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
