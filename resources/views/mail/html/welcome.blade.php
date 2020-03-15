@extends('mail.mastermail')

@section('body')
  <h1>Welcome {{$user->name}}</h1>
  <p>Thank you for your registration on the SCO website.
    You can now create and manage your teams on the 'MY TEAMS' page.
    As you're a team manager now, we're going to inform you about your teams' status updates, session passwords, race briefings and other important information via e-mail.
    Should you have any questions, then feel free to <a href="mailto:info@sportscaropen.eu">contact us</a>.</p>
  <p>Kind regards, <br>Your SCO Administration</p>
@endsection
