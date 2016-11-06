@extends('layouts.default')

@section('content')
  <div class="col-xs-12 col-sm-4 col-sm-offset-4">
    <h1 class="text-center">Network Lab</h1>

    {!! Form::open(['action' => 'LoginController@postLogin','method' => 'post']) !!}
      <div class="form-group">
        <label for="">Student ID</label>
        <input type="text" name="std_id" class="form-control" value="">
      </div>
      <div class="form-group">
        <label for="">Password</label>
        <input type="password" name="pwd" class="form-control" value="">
      </div>
      <button type="button" class="btn btn-block btn-primary" name="button">Login</button>
    {!! Form::close() !!}

  </div>
@endsection
