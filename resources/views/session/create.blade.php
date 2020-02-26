@extends('master.master')

@section('main')

<div class="row mx-0">
  <div class="col-12">
    <h1>Login</h1>
    <div class="mt-3">
      <form class="sco-forms d-flex flex-column justify-content-between align-items-stretch" action="{{url('/login')}}" method="post">
        {{csrf_field()}}
        @include('master.formerrors')
        <div class="mt-3 d-flex flex-column justify-content-between align-items-stretch">
          <input type="email" name="email" value="{{request()->old('email')}}" required>
          <label for="email">Email:</label>
        </div>
        <div class="mt-3 d-flex flex-column justify-content-between align-items-stretch">
          <input type="password" name="password" value="" required>
          <label for="password">Password:</label>
        </div>
        <div class="d-flex flex-row justify-content-center align-items-center">
          <input type="checkbox" id="rememberme" name="rememberme" value="yes" {{request()->old('rememberme') == 'yes' ? 'checked' : ''}}>
          <label for="rememberme" class="ml-3"><abbr title="stay logged in on this device">Remember me</abbr></label>
        </div>
        <div class="mt-4">
          <button class="btn btn-success btn-lg btn-block" type="submit" name="login">Login</button>
        </div>
      </form>
      <p class="mt-3 mx-3 mx-md-5">Forgot your password? <a href="mailto:info@sportscaropen.eu">Contact us!</a></p>
    </div>
  </div>
</div>

@endsection
