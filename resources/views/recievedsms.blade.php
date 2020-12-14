@extends('layouts.app')

@section('content')

<div class="container">
    <table class="table table-striped table-bordered datatable table-responsive-sm" id="dataTable">
        <thead>
          <tr>
            <th>#</th>
            <th>Sender</th>
            <th>Message</th>
            <th>Twilio Number</th>
            <th>Date</th>
          </tr>
        </thead>
        <tbody>
            @foreach($recievedMessages as $key => $data)
                <tr id="tr" class="tr{{$data->id}}">
                    <td> {{$key+1}}</td>
                    <td>{{$data->sender}}</td>
                    <td>{{$data->body}}</td>
                    <td>{{$data->twilio_num}}</td>
                    <td>{{$data->date_time}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection

