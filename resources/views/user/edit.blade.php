@extends('master.master')

@section('main')

<div class="row mx-0">
  <div class="col-12 px-0">
    <h1>User Settings</h1>
    <hr>
    @include('master.formerrors')
  </div>
  <div class="col-sm-12 col-lg-4 px-0">
    <div class="card mb-3">
      <div class="card-body">
        <h3>Change Password</h3>
        <hr>
        <form class="sco-forms d-flex flex-column justify-content-between align-items-stretch" action="{{url('/user')}}" method="post">
          {{csrf_field()}}
          <div class="mt-3 d-flex flex-column justify-content-between align-items-stretch">
            <input type="password" name="oldPassword" id="oldPassword">
            <label for="oldPassword">current password</label>
          </div>
          <div class="d-flex flex-column justify-content-between align-items-stretch">
            <input type="password" name="password" id="password">
            <label for="password">new password</label>
          </div>
          <div class="d-flex flex-column justify-content-between align-items-stretch">
            <input type="password" name="password_confirmation" id="password_confirmation">
            <label for="password_confirmation">confirm new password</label>
          </div>
          <div class="mt-2">
            <input class="btn btn-success btn-block btn-lg" type="submit" name="changePassword" value="change password">
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="col-sm-12 col-lg-4 px-0">
    <div class="card mb-3">
      <div class="card-body">
        <h3>Change Name</h3>
        <hr>
        <form class="sco-forms d-flex flex-column justify-content-between align-items-stretch" action="{{url('/user')}}" method="post">
          {{csrf_field()}}
          <div class="mt-3 d-flex flex-column justify-content-between align-items-stretch">
            <input type="text" name="name" id="name" value="{{old('name')!==null?old('name'):$user->name}}">
            <label for="name">name</label>
          </div>
          <div class="d-flex flex-column justify-content-between align-items-stretch">
            <input type="password" name="password" id="password">
            <label for="password">password</label>
          </div>
          <div class="mt-2">
            <input class="btn btn-success btn-block btn-lg" type="submit" name="changeName" value="change name">
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="col-sm-12 col-lg-4 px-0">
    <div class="card mb-3">
      <div class="card-body">
        <h3>Change Email</h3>
        <hr>
        <form class="sco-forms d-flex flex-column justify-content-between align-items-stretch" action="{{url('/user')}}" method="post">
          {{csrf_field()}}
          <div class="mt-3 d-flex flex-column justify-content-between align-items-stretch">
            <input type="text" name="email" id="email" value="{{old('email')!==null?old('email'):$user->email}}">
            <label for="email">email</label>
          </div>
          <div class="d-flex flex-column justify-content-between align-items-stretch">
            <input type="password" name="password" id="password">
            <label for="password">password</label>
          </div>
          <div class="mt-2">
            <input class="btn btn-success btn-block btn-lg" type="submit" name="changeEmail" value="change email">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
