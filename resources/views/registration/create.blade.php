@extends('master.master')

@section('main')

<div class="row mx-0">
  <div class="col-12">
    <h1>Registration</h1>
    <p>With this registration you confirm that you have read and accepted our <a href="{{url('/privacy')}}">privacy declaration</a>.</p>
    @if ($sco_settings['registration'] == '0')
      <p class="text-danger">Registration is closed, come back later.</p>
    @endif
    @include('master.formerrors')
    <form class="sco-forms d-flex flex-column justify-content-between align-items-stretch" action="/register" method="post">
      {{csrf_field()}}
      <div class="mt-3 d-flex flex-column justify-content-between align-items-stretch">
        <input type="email" name="email" value="{{request()->old('email')}}" required {{$sco_settings['registration']=='0'?'disabled':''}}>
        <label for="email">Email</label>
      </div>
      <div class="d-flex flex-column justify-content-between align-items-stretch">
        <input type="text" name="name" value="{{request()->old('name')}}" required {{$sco_settings['registration']=='0'?'disabled':''}}>
        <label for="name">Name</label>
      </div>
      <div class="d-flex flex-column justify-content-between align-items-stretch">
        <input type="password" name="password" value="" required {{$sco_settings['registration']=='0'?'disabled':''}}>
        <label for="password">Password</label>
      </div>
      <div class="d-flex flex-column justify-content-between align-items-stretch">
        <input type="password" name="password_confirmation" value="" required {{$sco_settings['registration']=='0'?'disabled':''}}>
        <label for="password_confirmation">Confirm Password</label>
      </div>
      <div class="mt-2">
        <button type="submit" class="btn btn-success btn-block btn-lg" name="button" {{$sco_settings['registration']=='0'?'disabled':''}}>Register</button>
      </div>
    </form>

  </div>
</div>

@endsection
