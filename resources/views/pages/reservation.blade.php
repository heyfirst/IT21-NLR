
@extends('layouts.default')

@section('content')
  <div class="container reservation">
    <div class="row">
      {{-- START ROUND --}}
      @foreach ($sections as $section)
      <div class="col-sm-4">
        <h4>{{ date('D d ,F', strtotime($section['date'])) }}</h4>
        <div class="panel {{ ($section['status'] == 1) ? "closed":""}}">
          @if ($section['remain'] != 0 && $section['status'] == 0)
            <span class="badge {{ ($section['remain'] > 18)?"badge-info":"badge-warning" }}">
              เหลือ {{ $section['remain'] }} ที่
            </span>
          @elseif($section['remain'] == 0 && $section['status'] == 0)
            <span class="badge bade-danger">
              เต็ม
            </span>
          @else
            <span class="badge">
              ปิด
            </span>
          @endif
          <div class="panel-body">
            <div class="row">
              <div class="col-xs-6 text-right">
                <h3>ROUND {{ $section['section_id'] }}</h3>
                <h4 class="time">START <span>{{ date('g:i A', strtotime($section['start_time'])) }}</span></h4>
                <h4 class="time">END <span>{{ date('g:i A', strtotime($section['end_time'])) }}</span></h4>
                @if ($section['status'] == 1)
                  <button class="btn btn-block" disabled>CLOSED</a>
                @else
                  <a href={{ url('/booking/'.$section['section_id']) }} class="btn btn-info btn-block">BOOKING</a>
                @endif
              </div>
              <div class="col-xs-6">
                @foreach ($section['enroll'] as $key => $enroll)
                <div class="progress progress-striped active">
                  <div class="progress-bar {{ ($enroll>0 && $enroll<40) ? "progress-bar-primary":"" }}{{ ($enroll>40 && $enroll<80) ? "progress-bar-warning":"" }}{{ ($enroll>80 && $enroll<110) ? "progress-bar-danger":"" }}"
                    role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width: {{ $enroll }}%;">
                  </div>
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
