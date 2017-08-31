@extends('master.master')

@section('main')

<div class="row">
  <div class="col-sm-12 col-lg-6">
    <h1>Login</h1>
    <form class="" action="/login" method="post">
      {{csrf_field()}}
      @include('master.formerrors')
      <div class="form-group">
        <label for="email">Email:</label>
        <input class="form-control" type="email" name="email" value="{{request()->old('email')}}" required>
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input class="form-control" type="password" name="password" value="" required>
      </div>
      <div class="form-group">
        <button class="btn btn-primary" type="submit" name="login">Login</button>
      </div>
    </form>
    <p>Forgot your password? <a href="mailto:info@sco.coresimracing.com">Contact us!</a></p>
  </div>
</div>

@endsection
