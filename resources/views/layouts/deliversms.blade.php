@foreach($petani as $key => $data)
    <tr>    
      <th>{{$data->id}}</th>
      <th>{{$data->sms_number}}</th>
      <th>{{$data->twilio_num}}</th>
      <th>{{$data->message}}</th>
    </tr>
@endforeach