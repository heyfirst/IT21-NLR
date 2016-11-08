
@extends('layouts.default')

@section('content')
  <div class="container booking" data-section-id="{{$section['section_id']}}">
    <div class="panel">
      <div class="panel-body">
        <div class="row">
          <div class="col-sm-12">
            <h3>ROUND {{$section['section_id']}} : <span>{{ date('D d ,F', strtotime($section['date'])) }}</span></h3>
            <h4 class="time">START <span>{{ date('g:i A', strtotime($section['start_time'])) }}</span></h4>
            <h4 class="time">END <span>{{ date('g:i A', strtotime($section['end_time'])) }}</span></h4>
            <hr>
          </div>
        </div>
        <div class="rack-list">
          @foreach ($section['rack'] as $key => $rack)
            <div class="row rack" data-rack="{{ $key }}">
              <div class="col-sm-3"><h4><i class="fa fa-server" aria-hidden="true"></i>RACK NO.{{ $key }}</h4></div>
              <div class="col-sm-3">
                @if ($rack[1]['name'] == $user['name'])
                  <button class="seat btn btn-block {{ (isset($rack[1]) && $rack[1]['seat'])? "btn-success my-booking" : "btn-default free" }}" data-seat="1">
                    {{ (isset($rack[1]) && $rack[1]['seat'] == 1 )? $rack[1]['name'] : "ว่าง" }}
                  </button>
                @else
                  <button class="seat btn btn-block {{ (isset($rack[1]) && $rack[1]['seat'])? "btn-danger" : "btn-default free" }}" data-seat="1">
                    {{ (isset($rack[1]) && $rack[1]['seat'] == 1 )? $rack[1]['name'] : "ว่าง" }}
                  </button>
                @endif
              </div>
              <div class="col-sm-3">
                @if ($rack[2]['name'] == $user['name'])
                  <button class="seat btn btn-block {{ (isset($rack[2]) && $rack[2]['seat'])? "btn-success my-booking" : "btn-default free" }}" data-seat="2">
                    {{ (isset($rack[2]) && $rack[2]['seat'] == 2 )? $rack[2]['name'] : "ว่าง" }}
                  </button>
                @else
                  <button class="seat btn btn-block {{ (isset($rack[2]) && $rack[2]['seat'])? "btn-danger" : "btn-default free" }}" data-seat="2">
                    {{ (isset($rack[2]) && $rack[2]['seat'] == 2 )? $rack[2]['name'] : "ว่าง" }}
                  </button>
                @endif
              </div>
              <div class="col-sm-3">
                @if ($rack[3]['name'] == $user['name'])
                  <button class="seat btn btn-block {{ (isset($rack[3]) && $rack[3]['seat'])? "btn-success my-booking" : "btn-default free" }}" data-seat="3">
                    {{ (isset($rack[3]) && $rack[3]['seat'] == 3 )? $rack[3]['name'] : "ว่าง" }}
                  </button>
                @else
                  <button class="seat btn btn-block {{ (isset($rack[3]) && $rack[3]['seat'])? "btn-danger" : "btn-default free" }}" data-seat="3">
                    {{ (isset($rack[3]) && $rack[3]['seat'] == 3 )? $rack[3]['name'] : "ว่าง" }}
                  </button>
                @endif
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
@endsection
