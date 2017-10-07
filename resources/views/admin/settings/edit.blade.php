@extends('admin.master.master')

@section('content')
  <h1>Settings</h1>
  @include('master.formerrors')
  <hr>
  <div class="d-flex align-items-stretch flex-wrap">
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
    <div class="card dashbord-modul">
      <div class="card-header">
        <h3>Show session password</h3>
      </div>
      <div class="card-body">
        <form class="" action="{{url('admin/settings')}}" method="post">
          {{csrf_field()}}
          <div class="form-group">
            <div class="form-check">
              <label class="form-check-label">
                <input type="radio" class="form-check-input" name="session_password_active" id="show_pass1" value="1" {{$setup['session_password_active']=='1'?'checked':''}}>
                show
              </label>
            </div>
            <div class="form-check">
              <label class="form-check-label">
                <input type="radio" class="form-check-input" name="session_password_active" id="show_pass2" value="0" {{$setup['session_password_active']=='0'?'checked':''}}>
                hide
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
        <h3>Session Password</h3>
      </div>
      <div class="card-body">
        <form class="" action="{{url('admin/settings')}}" method="post">
          {{csrf_field()}}
          <div class="form-group">
            <label for="sessionpassword">password</label>
            <input id="sessionpassword" class="form-control" type="text" name="session_password" value="{{old('session_password')!=null?old('session_password'):$setup['session_password']}}">
          </div>
          <div class="form-group">
            <input class="btn btn-primary form-control" type="submit" name="simpleSubmit" value="Set">
          </div>
        </form>
      </div>
    </div>
    <div class="card dashbord-modul">
      <div class="card-header">
        <h3>Confirmed Team Mangers</h3>
      </div>
      <div class="card-body">
        <form class="">
          {{csrf_field()}}
          <div class="form-group">
            <label>Email list for bcc</label>
          </div>
          <div class="form-group">
            <a class="btn btn-primary form-control" href="{{url('/admin/settings/emails')}}">show</a>
          </div>
        </form>
      </div>
    </div>
    <div class="card dashbord-modul">
      <div class="card-header">
        <h3>Show Youtube Header</h3>
      </div>
      <div class="card-body">
        <form class="" action="{{url('admin/settings')}}" method="post">
          {{csrf_field()}}
          <div class="form-group">
            <div class="form-check">
              <label class="form-check-label">
                <input type="radio" class="form-check-input" name="show_youtube_header" id="show_youtube_header" value="1" {{$setup['show_youtube_header']=='1'?'checked':''}}>
                show
              </label>
            </div>
            <div class="form-check">
              <label class="form-check-label">
                <input type="radio" class="form-check-input" name="show_youtube_header" id="show_youtube_header" value="0" {{$setup['show_youtube_header']=='0'?'checked':''}}>
                hide
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
        <h3>Youtube Header Video ID</h3>
      </div>
      <div class="card-body">
        <form class="" action="{{url('admin/settings')}}" method="post">
          {{csrf_field()}}
          <div class="form-group">
            <label for="youtube_header_videoid">ID (watch?v=xxx)</label>
            <input id="youtube_header_videoid" class="form-control" type="text" name="youtube_header_videoid" value="{{old('youtube_header_videoid')!=null?old('youtube_header_videoid'):$setup['youtube_header_videoid']}}">
          </div>
          <div class="form-group">
            <input class="btn btn-primary form-control" type="submit" name="simpleSubmit" value="Set">
          </div>
        </form>
      </div>
    </div>
  </div>

@endsection
