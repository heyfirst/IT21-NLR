@extends('layouts.default')

@section('content')
  <div class="container dashboard">
    <div class="col-sm-10 col-sm-offset-1">
      {{-- Row 1 --}}
      <div class="row">
        {{-- จำนวน section--}}
          {{ $sectionCount }}
        <div class="col-sm-4">
          <div class="panel panel-info">
            <div class="panel-heading">SECTIONs</div>
            <div class="panel-body text-right">
              <h2>10</h2>
            </div>
          </div>
        </div>
        {{-- จำนวน user--}}
        {{ $userCount }}
        <div class="col-sm-4">
          <div class="panel panel-info">
            <div class="panel-heading">USERs</div>
            <div class="panel-body text-right">
              <h2>10</h2>
            </div>
          </div>
        </div>
        {{-- จำนวน enroll --}}
        {{ $enrollCount }}
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
            <div class="panel-heading">Peak Section</div>
            <div class="panel-body">
              <div class="row">
                <div class="col-xs-4 text-right">
                  <h3>ROUND {{ $section['section_id'] }}</h3>
                  <h4 class="time">START <span>{{ date('g:i A', strtotime($section['start_time'])) }}</span></h4>
                  <h4 class="time">END <span>{{ date('g:i A', strtotime($section['end_time'])) }}</span></h4>
                  <a href={{ url('/booking/'.$section['section_id']) }} class="btn btn-info btn-block">SEE SECTION</a>
                </div>
                <div class="col-xs-3">
                  @foreach ($section['enroll'] as $key => $enroll)
                  <div class="progress progress-striped active">
                    <div class="progress-bar {{ ($enroll>0 && $enroll<40) ? "progress-bar-primary":"" }}{{ ($enroll>40 && $enroll<80) ? "progress-bar-warning":"" }}{{ ($enroll>80 && $enroll<110) ? "progress-bar-danger":"" }}"
                      role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width: {{$enroll}}%;">
                    </div>
                  </div>
                  @endforeach
                </div>
                <div class="col-xs-5">
                  <h3>เต็มภายในเวลา 00:00:00</h3>
                  <h4 class="time">ตั้งแต่เวลา <span>{{ date('g:i A', strtotime($section['start_time'])) }}</span></h4>
                  <h4 class="time">ถึงเวลา <span>{{ date('g:i A', strtotime($section['end_time'])) }}</span></h4>
                </div>
              </div>
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
