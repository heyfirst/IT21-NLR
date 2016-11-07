
@extends('layouts.default')

@section('content')
  <div class="container booking">
    <div class="panel">
      <div class="panel-body">
        <div class="row">
          <div class="col-xs-12">
            <h3>ROUND {{$section['section_id']}} : <span>{{ date('D d ,F', strtotime($section['date'])) }}</span></h3>
            <h4 class="time">START <span>{{ date('g:i A', strtotime($section['start_time'])) }}</span></h4>
            <h4 class="time">END <span>{{ date('g:i A', strtotime($section['end_time'])) }}</span></h4>
            <hr>
          </div>
        </div>
        <div class="rack-list">
          @foreach ($section['rack'] as $key => $rack)
            <div class="row rack">
              <div class="col-xs-3"><h4><i class="fa fa-server" aria-hidden="true"></i>RACK NO.{{ $key }}</h4></div>
              <div class="col-xs-3">
                <button class="btn btn-block {{ ($rack['seat'] == 1 )? "btn-danger" : "btn-default" }}">
                  {{ ($rack['seat'] == 1 )? $rack['std_id'] : "ว่าง" }}
                </button>
              </div>
              <div class="col-xs-3">
                <button class="btn btn-block {{ ($rack['seat'] == 2 )? "btn-danger" : "btn-default" }}">
                  {{ ($rack['seat'] == 2 )? $rack['std_id'] : "ว่าง" }}
                </button>
              </div>
              <div class="col-xs-3">
                <button class="btn btn-block {{ ($rack['seat'] == 3 )? "btn-danger" : "btn-default" }}">
                  {{ ($rack['seat'] == 3 )? $rack['std_id'] : "ว่าง" }}
                </button>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
@endsection
