@extends('layouts.app')

@section('content')
    <div class="card-body">
        <form action='' method='post'>
                @csrf
                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger" role="alert">
                            {{ $error }}
                        </div>
                    @endforeach
                @endif

                @if( session( 'success' ) )
                    <div class="alert alert-primary" role="alert">
                        {{ session( 'success' ) }}
                    </div>
                @endif

                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right">Twilio number</label>
                    <div class="col-md-6">
                        <select class="form-control" name="twilio_num" id="exampleFormControlSelect1">
                            @foreach ($twilionumbers as $number)
                                <option value="{{$number}}">{{$number}}</option>
                            @endforeach
                          </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right">Phone number</label>
                    <div class="col-md-6">
                        <input class="form-control" type='text' name='number' />
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right">Message</label>
                    <div class="col-md-6">
                        <textarea class="form-control" name='message'></textarea>
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button class="btn btn-primary" type='submit'>Send!</button>
                    </div>
                </div>

        </form>
    </div>
@endsection
