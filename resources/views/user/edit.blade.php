@extends('master.master')

@section('main')

<div class="row">
  <div class="col-12">
    <h1>User Settings</h1>
    <hr>
    @include('master.formerrors')
  </div>
  <div class="col-sm-12 col-lg-4">
    <div class="card mb-3">
      <div class="card-block">
        <h3>Change Password</h3>
        <hr>
        <form action="{{url('/user')}}" method="post">
          {{csrf_field()}}
          <div class="form-group">
            <label for="oldPassword">current password:</label>
            <input class="form-control" type="password" name="oldPassword" id="oldPassword">
          </div>
          <div class="form-group">
            <label for="password">new password:</label>
            <input class="form-control" type="password" name="password" id="password">
          </div>
          <div class="form-group">
            <label for="password_confirmation">confirm new password:</label>
            <input class="form-control" type="password" name="password_confirmation" id="password_confirmation">
          </div>
          <div class="form-group">
            <input class="form-control btn btn-primary" type="submit" name="changePassword" value="change password">
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="col-sm-12 col-lg-4">
    <div class="card mb-3">
      <div class="card-block">
        <h3>Change Name</h3>
        <hr>
        <form action="{{url('/user')}}" method="post">
          {{csrf_field()}}
          <div class="form-group">
            <label for="name">name:</label>
            <input class="form-control" type="text" name="name" id="name" value="{{old('name')!==null?old('name'):$user->name}}">
          </div>
          <div class="form-group">
            <label for="password">password:</label>
            <input class="form-control" type="password" name="password" id="password">
          </div>
          <div class="form-group">
            <input class="form-control btn btn-primary" type="submit" name="changeName" value="change name">
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="col-sm-12 col-lg-4">
    <div class="card mb-3">
      <div class="card-block">
        <h3>Change Email</h3>
        <hr>
        <form action="{{url('/user')}}" method="post">
          {{csrf_field()}}
          <div class="form-group">
            <label for="email">email:</label>
            <input class="form-control" type="text" name="email" id="email" value="{{old('email')!==null?old('email'):$user->email}}">
          </div>
          <div class="form-group">
            <label for="password">password:</label>
            <input class="form-control" type="password" name="password" id="password">
          </div>
          <div class="form-group">
            <input class="form-control btn btn-primary" type="submit" name="changeEmail" value="change email">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
