@extends('master.master')

@section('main')
<div class="row">
  <div class="col-12" style="padding-bottom:2rem;">
    <h1>{{$team['name']}}</h1>
    <table class="table">
      <tr>
        <td colspan="2">#{{$team['number']}}</td>
      </tr>
      <tr>
        <td>Car</td>
        <td><span class="mr-5 badge badge-pill badge-default badge-{{$className}}">{{$className}}</span>{{config('constants.car_names')[$team['car']]}}</td>
      </tr>
      <tr>
        <td>Manager</td>
        <td>{{$team['user']['name']}}</td>
      </tr>
      <tr>
        <td>Status</td>
        <td class="text-{{$team['status']==0?'danger':($team['status']==1?'warning':'confirmed')}}">{{config('constants.status_names')[$team['status']]}}</td>
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
