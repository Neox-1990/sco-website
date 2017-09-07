@extends('admin.master.master')

@section('content')
  <h1>Settings</h1>
  @include('master.formerrors')
  <hr>
  <div class="card dashbord-modul">
    <div class="card-header">
      <h3>Registration</h3>
    </div>
    <div class="card-body">
      <form class="" action="{{url('admin/settings')}}" method="post">
        {{csrf_field()}}
        <div class="form-group">
          <div class="form-check">
            <label class="form-check-label">
              <input type="radio" class="form-check-input" name="registration" id="registration1" value="open" {{$setup['registration']=='open'?'checked':''}}>
              Open
            </label>
          </div>
          <div class="form-check">
            <label class="form-check-label">
              <input type="radio" class="form-check-input" name="registration" id="registration2" value="closed" {{$setup['registration']=='closed'?'checked':''}}>
              Closed
            </label>
          </div>
        </div>
        <div class="form-group">
          <input class="btn btn-primary form-control" type="submit" name="simpleSubmit" value="Set">
        </div>
      </form>
    </div>
  </div>
  <div class="card dashbord-modul">
    <div class="card-header">
      <h3>Facebookpage ID</h3>
    </div>
    <div class="card-body">
      <form class="" action="{{url('admin/settings')}}" method="post">
        {{csrf_field()}}
        <div class="form-group">
          <label for="facebook_pageid">Facebook Page ID <small><a href="https://findmyfbid.com/" targer="_blank">(helper)</a></small></label>
          <input id="facebook_pageid" class="form-control" type="text" name="facebookpageid" value="{{old('facebookpageid')!=null?old('facebookpageid'):$setup['facebookpageid']}}">
        </div>
        <div class="form-group">
          <input class="btn btn-primary form-control" type="submit" name="simpleSubmit" value="Set">
        </div>
      </form>
    </div>
  </div>
  <div class="card dashbord-modul">
    <div class="card-header">
      <h3>Twitter modul</h3>
    </div>
    <div class="card-body">
      <form class="" action="{{url('admin/settings')}}" method="post">
        {{csrf_field()}}
        <div class="form-group">
          <label for="twitter_account">Twitter Account URL</label>
          <input id="twitter_account" class="form-control" type="text" name="twitteraccount" value="{{old('twitteraccount')!=null?old('twitteraccount'):$setup['twitteraccount']}}">
        </div>
        <div class="form-group">
          <input class="btn btn-primary form-control" type="submit" name="simpleSubmit" value="Set">
        </div>
      </form>
    </div>
  </div>
  <div class="card dashbord-modul">
    <div class="card-header">
      <h3>Confirmed carchange deadline</h3>
    </div>
    <div class="card-body">
      <form class="" action="{{url('admin/settings')}}" method="post">
        {{csrf_field()}}
        <div class="form-group">
          <label for="ccdeadline">Deadline</label>
          <input id="ccdeadline" class="form-control" type="datetime-local" name="confirmed_carchange" value="{{old('confirmed_carchange')!=null?old('confirmed_carchange'):$setup['confirmed_carchange']}}">
        </div>
        <div class="form-group">
          <input class="btn btn-primary form-control" type="submit" name="simpleSubmit" value="Set">
        </div>
      </form>
    </div>
  </div>
  <div class="card dashbord-modul">
    <div class="card-header">
      <h3>Facebookentries on Homepage</h3>
    </div>
    <div class="card-body">
      <form class="" action="{{url('admin/settings')}}" method="post">
        {{csrf_field()}}
        <div class="form-group">
          <label for="facebook_entries">amount of Facebookentries</label>
          <input id="facebook_entries" class="form-control" type="text" name="facebookentries" value="{{old('facebookentries')!=null?old('facebookentries'):$setup['facebookentries']}}">
        </div>
        <div class="form-group">
          <input class="btn btn-primary form-control" type="submit" name="simpleSubmit" value="Set">
        </div>
      </form>
    </div>
  </div>
@endsection
