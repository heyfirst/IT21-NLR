@extends('layouts.default')

@section('content')
  <div class="container dashboard">
    <div class="row">
      {{-- Dashboard --}}
      <div class="col-sm-3">
        <div class="panel">
          <div class="panel-body text-right">
            <h2>Dashboard</h2>
            <h5 class="subtitle">Network Lab Reservation</h5>
          </div>
        </div>
      </div>
      {{-- จำนวน Section --}}
      <div class="col-sm-3">
        <div class="panel">
          <div class="panel-body text-right">
            <h2>10</h2>
            <h5 class="subtitle">Sections</h5>
          </div>
        </div>
      </div>
      {{-- จำนวน User --}}
      <div class="col-sm-3">
        <div class="panel">
          <div class="panel-body text-right">
            <h2>10</h2>
            <h5 class="subtitle">Users</h5>
          </div>
        </div>
      </div>
      {{-- จำนวนการ Enroll --}}
      <div class="col-sm-3">
        <div class="panel">
          <div class="panel-body text-right">
            <h2>10</h2>
            <h5 class="subtitle">Enrolls</h5>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
