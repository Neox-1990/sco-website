@extends('master.master')

@section('additionalHeader')
<link rel="stylesheet" href="{{asset('css/flags/css/flag-icon.min.css')}}">
@endsection

@section('main')
<div class="row mx-0">
  <div class="col-12" style="padding-bottom:2rem;">
    <h1 {{$team['deleted_at']!=null?'class=text-muted':''}}>{{$team['name']}}<span class="ml-5">
      @if(!empty($team['website']))
      <a class="mr-3" href="{{$team['website']}}"><i class="fas fa-globe fa-xs"></i></a>
      @endif
      @if(!empty($team['twitter']))
      <a class="mr-3" href="{{$team['twitter']}}"><i class="fab fa-twitter fa-xs"></i></a>
      @endif
      @if(!empty($team['facebook']))
      <a class="mr-3" href="{{$team['facebook']}}"><i class="fab fa-facebook fa-xs"></i></a>
      @endif
    </span></h1>
    @if ($team['deleted_at'] !== null)
      <p class="text-muted">deleted team</p>
    @endif
    <table class="table">
      <tr>
        <td colspan="2">#{{$team['number']}}</td>
      </tr>
      <tr>
        <td>Car</td>
        <td><span class="badge badge-pill badge-{{$className.$season['id']}} badge-normal">{{config('constants.car_names')[$team['car']]}}</span></td>
      </tr>
      <tr>
        <td>Manager</td>
        <td>{{$team['user']['name']}}</td>
      </tr>
      <tr>
        <td>Status</td>
        <td><span  class="text-{{config('constants.status_colors')[$team['status']]}}">{{config('constants.status_names')[$team['status']]}}</span></td>
      </tr>
      <tr>
        <td>Season</td>
        <td>{{$season['name']}}</td>
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
          <td><span class="mr-3 flag-icon flag-icon-{{strtolower($driver->location)}}"></span><a href="http://members.iracing.com/membersite/member/CareerStats.do?custid={{$driver['iracing_id']}}" target="_blank">{{$driver['name']}}</a></td>
          <td>{{$driver['irating']}}</td>
          <td>{{$driver['safetyrating']}}</td>
        </tr>
      @endforeach
    </table>
  </div>
</div>
@endsection
