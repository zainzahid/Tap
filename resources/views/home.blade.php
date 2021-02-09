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
@endsection
