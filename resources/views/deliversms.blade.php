@extends('layouts.app')

@section('content')

<div class="container">
    <table class="table table-striped table-bordered datatable table-responsive-sm" id="dataTable">
        <thead>
          <tr>
            <th>#</th>
            <th>Number</th>
            <th>Twilio Number</th>
            <th>Message</th>
            <th>Date</th>
          </tr>
        </thead>
        <tbody>
            @foreach($deliveredMessages as $key => $data)
                <tr id="tr" class="tr{{$data->id}}">
                    <td> {{$key+1}}</td>
                    <td>{{$data->sms_number}}</td>
                    <td>{{$data->twilio_num}}</td>
                    <td>{{$data->message}}</td>
                    <td>{{$data->date_time}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection

