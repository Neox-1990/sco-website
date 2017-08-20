@extends('master.master')

@section('main')

<div class="row">
  <div class="col-sm-12 col-lg-6">
    <h1>Registration</h1>
    @include('master.formerrors')
    <form class="" action="/register" method="post">
      {{csrf_field()}}
      <div class="form-group">
        <label for="email">Email:</label>
        <input class="form-control" type="email" name="email" value="{{request()->old('email')}}" required>
      </div>
      <div class="form-group">
        <label for="name">Name:</label>
        <input class="form-control" type="text" name="name" value="{{request()->old('name')}}" required>
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input class="form-control" type="password" name="password" value="" required>
      </div>
      <div class="form-group">
        <label for="password_confirmation">Confirm Password:</label>
        <input class="form-control" type="password" name="password_confirmation" value="" required>
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary" name="button">Register</button>
      </div>
    </form>
  </div>
</div>

@endsection
