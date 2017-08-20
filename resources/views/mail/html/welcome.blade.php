@extends('mail.mastermail')

@section('body')
  <h1>Welcome {{$user->name}},</h1>
  <p>thank you for your registration on the SCO site. You can now manage your teams in the 'MY TEAMS' menu.
    Please be sure we can reach you on this email address, since we going to send status updates of your teams, server passwords and other important information to this mail. 
    If you have any questions feel free to <a href="mailto:info@sco.coresimracing.com">contact us</a>.</p>
  <p>Kind regards <br>The SCO team</p>
@endsection
