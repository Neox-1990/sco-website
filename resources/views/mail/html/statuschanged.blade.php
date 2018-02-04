@extends('mail.mastermail')

@section('body')
  <h1>Dear {{$input['user']['name']}}</h1>
  <p>The status of your team <strong><a href="{{url('teams/'.$input['team']['id'])}}">{{$input['team']['name']}}</a></strong> has been changed.</p>
  <p>The new status is: <strong>{{config('constants.status_names')[$input['team']['status']]}}</strong>.</p>
  @if($input['team']['status']==3)
    <p>Use the following link to pay the entryfee: <a href="https://www.paypal.me/sportscaropen/8usd">Paypal.me</a> </p>
  @endif
  <p>Kind regards, <br>Your SCO Administration</p>
@endsection
