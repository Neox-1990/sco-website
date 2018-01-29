@extends('master.master')

@section('main')
<div class="row">
  <div class="col-12" style="padding-bottom:2rem;">
    <h1>{{$driver['name']}}</h1>
    <table class="table">
      <tr>
        <td>iRacing ID</td>
        <td><a href="http://members.iracing.com/membersite/member/CareerStats.do?custid={{$driver['iracing_id']}}" target="_blank">{{$driver['iracing_id']}}</a></td>
      </tr>
      <tr>
        <td>iRating</td>
        <td>{{$driver['irating']}}</td>
      </tr>
      <tr>
        <td>Safetyrating</td>
        <td>{{$driver['safetyrating']}}</td>
      </tr>
    </table>
    <h2>Current Team</h2>

    @if ($team_current)
      <table class="table">
        <tr>
          <td><a href="{{url('/teams/'.$team_current['id'])}}">{{$team_current['name']}} #{{$team_current['number']}}</a></td>
          <td>{{config('constants.car_names')[$team_current['car']]}}</td>
          <td class="text-{{$team_current['status']==0?'danger':($team_current['status']==1?'warning':($team_current['status']==2?'success':'info'))}}">{{config('constants.status_names')[$team_current['status']]}}</td>
        </tr>
      </table>
    @else
      <p>not part of a team in the current season</p>
    @endif

    <h2>Past/Former Teams</h2>
    @if (count($teams_old))
      <table class="table">
        <tr>
          <th>Teamname</th>
          <th>Car</th>
          <th>Season</th>
        </tr>
        @foreach ($teams_old as $team)
          <tr>
            <td><a href="{{url('teams/'.$team['id'])}}">{{$team['name']}} #{{$team['number']}}</a></td>
            <td>{{config('constants.car_names')[$team['car']]}}</td>
            <td>{{$team['season_id']}}</td>
          </tr>
        @endforeach
      </table>
    @else
      <p>no former or past teams</p>
    @endif
  </div>
</div>
@endsection
