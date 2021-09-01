@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{-- {{ __('You are logged in!') }} <i class="fa fa-mobile" aria-hidden="true"></i> --}}

                    <div id="root">
                        <div class="container">
                          <div class="row align-items-stretch">

                            @role('user')
                            <div class="c-dashboardInfo col-lg-3 col-md-6">
                              <div class="wrap">
                                <h4 class="heading heading5 hind-font medium-font-weight c-dashboardInfo__title">Total Balance<svg
                                    class="MuiSvgIcon-root-19" focusable="false" viewBox="0 0 24 24" aria-hidden="true" role="presentation">
                                    <path fill="none" d="M0 0h24v24H0z"></path>
                                    <path
                                      d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z">
                                    </path>
                                  </svg></h4><span class="hind-font caption-12 c-dashboardInfo__count">{{ $dbStats['balance'] }}.0</span>
                              </div>
                            </div>
                            @endrole

                            <div class="c-dashboardInfo col-lg-3 col-md-6">
                              <div class="wrap">
                                <h4 class="heading heading5 hind-font medium-font-weight c-dashboardInfo__title">Delivered Messages<svg
                                    class="MuiSvgIcon-root-19" focusable="false" viewBox="0 0 24 24" aria-hidden="true" role="presentation">
                                    <path fill="none" d="M0 0h24v24H0z"></path>
                                    <path
                                      d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z">
                                    </path>
                                  </svg></h4><span class="hind-font caption-12 c-dashboardInfo__count">{{ $dbStats['delivered_messages'] }}</span>
                                  {{-- <span class="hind-font caption-12 c-dashboardInfo__subInfo">Last month: €30</span> --}}
                              </div>
                            </div>

                            <div class="c-dashboardInfo col-lg-3 col-md-6">
                              <div class="wrap">
                                <h4 class="heading heading5 hind-font medium-font-weight c-dashboardInfo__title">Pending Messages<svg
                                    class="MuiSvgIcon-root-19" focusable="false" viewBox="0 0 24 24" aria-hidden="true" role="presentation">
                                    <path fill="none" d="M0 0h24v24H0z"></path>
                                    <path
                                      d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z">
                                    </path>
                                  </svg></h4><span class="hind-font caption-12 c-dashboardInfo__count">{{ $dbStats['pending_messages'] }}</span>
                              </div>
                            </div>

                            <div class="c-dashboardInfo col-lg-3 col-md-6">
                              <div class="wrap">
                                <h4 class="heading heading5 hind-font medium-font-weight c-dashboardInfo__title">Recieved Messages<svg
                                    class="MuiSvgIcon-root-19" focusable="false" viewBox="0 0 24 24" aria-hidden="true" role="presentation">
                                    <path fill="none" d="M0 0h24v24H0z"></path>
                                    <path
                                      d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z">
                                    </path>
                                  </svg></h4><span class="hind-font caption-12 c-dashboardInfo__count">{{ $dbStats['recieved_messages'] }}</span>
                              </div>
                            </div>

                            @role('admin')
                            <div class="c-dashboardInfo col-lg-3 col-md-6">
                                <div class="wrap">
                                  <h4 class="heading heading5 hind-font medium-font-weight c-dashboardInfo__title">Total Users<svg
                                      class="MuiSvgIcon-root-19" focusable="false" viewBox="0 0 24 24" aria-hidden="true" role="presentation">
                                      <path fill="none" d="M0 0h24v24H0z"></path>
                                      <path
                                        d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z">
                                      </path>
                                    </svg></h4><span class="hind-font caption-12 c-dashboardInfo__count">{{ $dbStats['total_users'] }}</span>
                                </div>
                            </div>
                            @endrole

                          </div>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
  <br><br>

  <div class="row justify-content-center">
    <div class="col-md-9" style="display: flex;justify-content: flex-end">
      <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Month') }}</label>
      <input style="width: 20%" id="name" type="month" class="form-control name="name" autofocus>
    </div>
  </div>

  <canvas id="myChart" style="text-align: center; margin: auto" width="900" height="400"></canvas>

  <br><br>

  <div class="row justify-content-center">
    <div class="col-md-9">
      <table class="table table-striped table-bordered datatable table-responsive-sm" id="dataTable">
        <thead>
          <tr>
            <th>#</th>
            <th>Sent Messages</th>
            <th>Recieved Messages</th>
            <th>Pending Messages</th>
            <th>Date</th>
          </tr>
        </thead>
        <tbody>
            @foreach($user_data as $key => $data)
                <tr id="tr" class="tr{{$key}}">
                    <td> {{$key+1}}</td>
                    <td>{{$data['sent_messages']}}</td>
                    <td>{{$data['received_messages']}}</td>
                    <td>{{$data['pending_messages']}}</td>
                    <td>{{$data['Date']}}</td>
                </tr>
            @endforeach
        </tbody>
      </table>
    </div>
  </div>

</div>

<!-- ______________Chart.JS ____________________-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.2.0/chart.min.js" integrity="sha512-VMsZqo0ar06BMtg0tPsdgRADvl0kDHpTbugCBBrL55KmucH6hP9zWdLIWY//OTfMnzz6xWQRxQqsUFefwHuHyg==" crossorigin="anonymous"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script> --}}
<script>
     let userData = @php echo $userData; @endphp;
     console.log('userData', userData);

     let dateLabels=[];
     let recievedDataset = [];
     let sentDataset = [];
     let pendingDataset = [];

     userData.forEach(data => {
       dateLabels.push(data.Date);
       recievedDataset.push(data.received_messages);
       sentDataset.push(data.sent_messages);
       pendingDataset.push(data.pending_messages);
     });
     console.log('dateLabels', dateLabels)
     console.log('recievedDataset', recievedDataset)
     console.log('sentDataset', sentDataset)
     console.log('pendingDataset', pendingDataset)

     var ctx = document.getElementById("myChart");
    var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: dateLabels,
        datasets: [{
          label: 'Recieved',
          data: recievedDataset,
          backgroundColor: [
            'rgba(255, 99, 132, 0.2)'
          ],
          // borderColor: [
          //   'rgba(255,99,132,1)'
          // ],
          // borderWidth: 1
        },{
          label: 'Sent',
          data: sentDataset,
          backgroundColor: [
            'rgba(54, 162, 235, 0.2)'
          ],
          // borderColor: [
          //   'rgba(54, 162, 235, 1)'
          // ],
          // borderWidth: 1
        }, {
          label: 'Pending',
          data: pendingDataset,
          backgroundColor: [
            'rgba(255, 206, 86, 0.2)'
          ],
          borderColor: [
            'rgba(255, 206, 86, 1)'

          ],
          borderWidth: 1
        }]
      },
      options: {
        responsive: true,
        scales: {
          xAxes: [{
            ticks: {
              maxRotation: 90,
              minRotation: 80
            },
            gridLines: {
              offsetGridLines: true // à rajouter
            }
          },
          {
            position: "top",
            ticks: {
              maxRotation: 90,
              minRotation: 80
            },
            gridLines: {
              offsetGridLines: true // et matcher pareil ici
            }
          }],
          yAxes: [{
            ticks: {
              beginAtZero: true
            }
          }]
        }
      }
    });
</script>



@endsection
