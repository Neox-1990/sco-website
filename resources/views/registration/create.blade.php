@extends('master.master')

@section('main')

<div class="row">
  <div class="col-sm-12 col-lg-6">
    <h1>Registration</h1>
    @if ($sco_settings['registration'] == 'closed')
      <p class="text-danger">Registration is closed, come back later.</p>
    @endif
    @include('master.formerrors')
    <form class="" action="/register" method="post">
      {{csrf_field()}}
      <div class="form-group">
        <label for="email">Email:</label>
        <input class="form-control" type="email" name="email" value="{{request()->old('email')}}" required {{$sco_settings['registration']=='closed'?'disabled':''}}>
      </div>
      <div class="form-group">
        <label for="name">Name:</label>
        <input class="form-control" type="text" name="name" value="{{request()->old('name')}}" required {{$sco_settings['registration']=='closed'?'disabled':''}}>
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input class="form-control" type="password" name="password" value="" required {{$sco_settings['registration']=='closed'?'disabled':''}}>
      </div>
      <div class="form-group">
        <label for="password_confirmation">Confirm Password:</label>
        <input class="form-control" type="password" name="password_confirmation" value="" required {{$sco_settings['registration']=='closed'?'disabled':''}}>
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary" name="button" {{$sco_settings['registration']=='closed'?'disabled':''}}>Register</button>
      </div>
    </form>
    
  </div>
</div>

@endsection
