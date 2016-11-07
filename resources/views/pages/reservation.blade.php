
@extends('layouts.default')

@section('content')
  <div class="container reservation">
    <div class="row">
      {{-- START ROUND --}}
      @foreach ($sections as $section)
      <div class="col-xs-4">
        <h4>{{ date('D d ,F', strtotime($section['date'])) }}</h4>
        <div class="panel">
          <span class="badge badge-info">เหลือ {{ $section['remain'] }} ที่</span>
          <div class="panel-body">
            <div class="row">
              <div class="col-xs-6 text-right">
                <h3>ROUND {{ $section['section_id'] }}</h3>
                <h4 class="time">START <span>{{ date('g:i A', strtotime($section['start_time'])) }}</span></h4>
                <h4 class="time">END <span>{{ date('g:i A', strtotime($section['end_time'])) }}</span></h4>
                <a href={{ url('/booking/'.$section['section_id']) }} class="btn btn-info btn-block">BOOKING</a>
              </div>
              <div class="col-xs-6">
                @foreach ($section['enroll'] as $key => $enroll)
                <div class="progress progress-striped active">
                  <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width: {{ $enroll }}%;"></div>
                </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
      @endforeach
      {{-- END ROUND --}}
    </div>
  </div>
@endsection
