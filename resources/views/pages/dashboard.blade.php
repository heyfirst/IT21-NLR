@extends('layouts.default')

@section('content')
  <div class="container dashboard">
    <div class="col-sm-10 col-sm-offset-1">
      {{-- Row 1 --}}
      <div class="row">
        {{-- จำนวน Section --}}
        <div class="col-sm-4">
          <div class="panel panel-info">
            <div class="panel-heading">SECTIONs</div>
            <div class="panel-body text-right">
              <h2>10</h2>
            </div>
          </div>
        </div>
        {{-- จำนวน User --}}
        <div class="col-sm-4">
          <div class="panel panel-info">
            <div class="panel-heading">USERs</div>
            <div class="panel-body text-right">
              <h2>10</h2>
            </div>
          </div>
        </div>
        {{-- จำนวนการ Enroll --}}
        <div class="col-sm-4">
          <div class="panel panel-info">
            <div class="panel-heading">ENROLLs</div>
            <div class="panel-body text-right">
              <h2>10</h2>
            </div>
          </div>
        </div>
      </div>
      {{-- Row 2 --}}
      <div class="row">
        <div class="col-sm-8">
          <div class="panel panel-info">
            <div class="panel-heading">Enroll Peak Time</div>
              <ul id="myTab1" class="nav nav-tabs nav-justified">
                <li class="active"><a href="#timeline-noon" data-toggle="tab">Noon</a></li>
                <li><a href="#timeline-night" data-toggle="tab">Night</a></li>
              </ul>
              <div id="myTabContent" class="tab-content">
              <div class="tab-pane fade active in" id="timeline-noon">
                <canvas id="timeline-chart-noon" width="400" height="250"></canvas>
              </div>
              <div class="tab-pane fade" id="timeline-night">
                <canvas id="timeline-chart-night" width="400" height="250"></canvas>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="panel panel-info">
            <div class="panel-heading">Top Enroll User</div>
            <ul class="list-group">
              <li class="list-group-item">Cras justo odio<span class="badge badge-warning pull-right">1st</span></li>
              <li class="list-group-item">Dapibus ac facilisis in<span class="badge badge-info pull-right">2nd</span></li>
              <li class="list-group-item">Morbi leo risus<span class="badge badge-primary pull-right">3rd</span></li>
              <li class="list-group-item">Porta ac consectetur ac</li>
              <li class="list-group-item">Vestibulum at eros</li>
              <li class="list-group-item">Vestibulum at eros</li>
              <li class="list-group-item">Vestibulum at eros</li>
              <li class="list-group-item">Vestibulum at eros</li>
              <li class="list-group-item">Vestibulum at eros</li>
              <li class="list-group-item">Vestibulum at eros</li>
            </ul>
          </div>
        </div>
      </div>
      {{-- Row 3 --}}
      <div class="row">
        <div class="col-xs-8">
          <div class="panel panel-info">
            <div class="panel-heading">Enroll Peak Time</div>
            <div class="panel-body">

            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="panel panel-info">
            <div class="panel-heading">Bottom Enroll User</div>
            <ul class="list-group">
              <li class="list-group-item">Cras justo odio<span class="badge badge-warning pull-right">1st</span></li>
              <li class="list-group-item">Dapibus ac facilisis in<span class="badge badge-info pull-right">2nd</span></li>
              <li class="list-group-item">Morbi leo risus<span class="badge badge-primary pull-right">3rd</span></li>
              <li class="list-group-item">Porta ac consectetur ac</li>
              <li class="list-group-item">Vestibulum at eros</li>
              <li class="list-group-item">Vestibulum at eros</li>
              <li class="list-group-item">Vestibulum at eros</li>
              <li class="list-group-item">Vestibulum at eros</li>
              <li class="list-group-item">Vestibulum at eros</li>
              <li class="list-group-item">Vestibulum at eros</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript" src="/vendor/Chart.min.js"></script>
@endsection
