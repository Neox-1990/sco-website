@extends('admin.master.master')

@section('content')
  <h1>Edit Manager</h1>
  @include('master.formerrors')
  <hr>
  <div class="card dashbord-modul">
    <div class="card-body">
      <form class="" action="{{url('admin/manager/'.$user->id)}}" method="post">
        {{csrf_field()}}
        <div class="form-group">
          <label for="managername">Name</label>
          <input class="form-control" id="managername" type="text" name="manager_name" value="{{old('manager_name')!==null?old('manager_name'):$user->name}}">
        </div>
        <div class="form-group">
          <input class="btn btn-primary" type="submit" name="managerNameChange" value="change name">
        </div>
      </form>
    </div>
  </div>
  <div class="card dashbord-modul">
    <div class="card-body">
      <form class="" action="{{url('admin/manager/'.$user->id)}}" method="post">
        {{csrf_field()}}
        <div class="form-group">
          <label for="manageremail">Email</label>
          <input class="form-control" id="manageremail" type="text" name="manager_email" value="{{old('manager_email')!==null?old('manager_email'):$user->email}}">
        </div>
        <div class="form-group">
          <input class="btn btn-primary" type="submit" name="managerEmailChange" value="change email">
        </div>
      </form>
    </div>
  </div>
  <div class="card dashbord-modul">
    <div class="card-body">
      <form class="" action="{{url('admin/manager/'.$user->id)}}" method="post">
        {{csrf_field()}}
        <div class="form-group">
          <label for="managerpass">new passwort</label>
          <input class="form-control" id="managerpass" type="text" name="manager_pass" value="{{old('manager_pass')!==null?old('manager_pass'):''}}">
        </div>
        <div class="form-group">
          <input class="btn btn-primary" type="submit" name="managerSetPass" value="set new password">
        </div>
      </form>
    </div>
  </div>
  <div class="card dashbord-modul">
    <div class="card-body">
      <form class="" action="{{url('admin/manager/'.$user->id)}}" method="post">
        {{csrf_field()}}
        <div class="form-group">
          <input class="btn btn-danger" type="submit" name="managerDelete" value="Delete Manager">
        </div>
      </form>
    </div>
  </div>
@endsection
