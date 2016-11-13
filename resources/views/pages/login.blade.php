@extends('layouts.default')

@section('content')
  <div class="container login">
    <div class="row">
      <h1 class="text-center">Network Lab Reservation</h1>
      <div class="col-sm-12 col-sm-4 col-sm-offset-4">
        <a href="/signin-facebook" class="btn btn-block btn-primary btn-facebook" name="button"><i class="fa fa-facebook"></i> Login With Facebook</a>
        <a href="/signin-google" class="btn btn-block btn-danger btn-facebook" name="button"><i class="fa fa-google"></i> Login With Google</a>
      </div>
    </div>
  </div>
@endsection
