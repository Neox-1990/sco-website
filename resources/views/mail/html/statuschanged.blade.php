@extends('mail.mastermail')

@section('body')
  <h1>Dear {{$input['user']['name']}}</h1>
  <p>The status of your team <strong><a href="{{url('teams/'.$input['team']['id'])}}">{{$input['team']['name']}}</a></strong> has been changed.</p>
  <p>The new status is: <strong>{{config('constants.status_names')[$input['team']['status']]}}</strong>.</p>
  <p>Kind regards, <br>Your SCO Administration</p>
@endsection
