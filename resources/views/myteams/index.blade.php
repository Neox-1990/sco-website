@extends('master.master')

@section('main')
<div class="row">
  <div class="col-12" style="padding-bottom:2rem;">
    <h1>Your Teams</h1>

    <a href="{{url('myteams/create')}}" class="btn btn-primary">+ Create New Team</a>
    @foreach ($teams as $team)
      <hr>
      <div class="card">
        <div class="card-header">
          <h2>{{$team->name}} # {{$team->number}}
          <div class="btn-group ml-5">
            <a href="{{url('/myteams/edit/'.$team->id)}}" class="btn btn-outline-success">Edit</a>
            <a href="{{url('/myteams/delete/'.$team->id)}}" class="btn btn-outline-danger">Delete</a>
          </div>
          </h2>
          <table class="table">
            <tr>
              <td>Car: {{config('constants.car_names')[$team->car]}}</td>
              <td>iRacing Team ID: {{$team->ir_teamid}}</td>
              <td>Status: <span class="text-{{$team['status']==0?'danger':($team['status']==1?'warning':'success')}}">{{config('constants.status_names')[$team['status']]}}</span></td>
            </tr>
          </table>
        </div>
        <div class="card-block">
          <h3>Drivers</h3>
          <table class="table">
            <tr>
              <th>Name</th>
              <th>SR</th>
              <th>IR</th>
            </tr>
            @foreach ($team->drivers as $driver)
              <tr>
                <td><a href="http://members.iracing.com/membersite/member/CareerStats.do?custid={{$driver->iracing_id}}" target="_blank">{{$driver->name}}</a></td>
                <td>{{strtoupper($driver->safetyrating)}}</td>
                <td>{{$driver->irating}}</td>
              </tr>
            @endforeach
          </table>

        </div>
      </div>
    @endforeach
  </div>
</div>
@endsection
