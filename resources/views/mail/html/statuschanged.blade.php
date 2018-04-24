@extends('mail.mastermail')

@section('body')
  <h1>Dear {{$input['user']['name']}}</h1>
  <p>The status of your team <strong><a href="{{url('teams/'.$input['team']['id'])}}">{{$input['team']['name']}}</a></strong> has been changed.</p>
  <p>The new status is: <strong>{{config('constants.status_names')[$input['team']['status']]}}</strong>.</p>
  @if($input['team']['status']==3)
    <p>To get your Team confirmed, you now have to pay the entryfee of 5 $ via Paypal. You can use the following link to pay the entryfee: <a href="https://www.paypal.me/sportscaropen/5usd">Paypal.me</a>. If it doesnt work, you can send the fee to info@sco.coresimracing.com. Be sure to choose the 'Send money to friends and family' option. This way we receive the whole amount without any transaction costs by Paypal.</p>
  @endif
  <p>Kind regards, <br>Your SCO Administration</p>
@endsection
