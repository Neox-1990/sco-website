@extends('master.master')

@section('main')
<div class="row">
  <div class="col-12" style="padding-bottom:2rem;">
    <h1 {{$team['deleted_at']!=null?'class=text-muted':''}}>{{$team['name']}}</h1>
    @if ($team['deleted_at'] !== null)
      <p class="text-muted">deleted team</p>
    @endif
    <table class="table">
      <tr>
        <td colspan="2">#{{$team['number']}}</td>
      </tr>
      <tr>
        <td>Car</td>
        <td><span class="badge badge-pill badge-{{$className}} badge-normal">{{config('constants.car_names')[$team['car']]}}</span></td>
      </tr>
      <tr>
        <td>Manager</td>
        <td>{{$team['user']['name']}}</td>
      </tr>
      <tr>
        <td>Status</td>
        <td class="text-{{$team['status']==0?'danger':($team['status']==1?'warning':($team['status']==2?'success':'info'))}}">{{config('constants.status_names')[$team['status']]}}</td>
      </tr>
      <tr>
        <td>Season</td>
        <td>{{$team['season_id']}}</td>
      </tr>
    </table>
    <h2>Drivers</h2>
    <table class="table">
      <tr>
        <th>Name</th>
        <th>iRating</th>
        <th>Safetyrating</th>
      </tr>
      @foreach ($team['drivers'] as $driver)
        <tr>
          <td><a href="http://members.iracing.com/membersite/member/CareerStats.do?custid={{$driver['iracing_id']}}" target="_blank">{{$driver['name']}}</a></td>
          <td>{{$driver['irating']}}</td>
          <td>{{$driver['safetyrating']}}</td>
        </tr>
      @endforeach
    </table>
  </div>
</div>
@endsection
