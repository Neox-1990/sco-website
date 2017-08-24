@extends('admin.master.master')

@section('content')
  <h1>Settings</h1>
  <hr>
  <div class="card dashbord-modul">
    <div class="card-header">
      <h3>Registration</h3>
    </div>
    <div class="card-block">
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
    <div class="card-block">
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
    <div class="card-block">
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
@endsection
