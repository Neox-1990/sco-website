@extends('master.master')

@section('main')
<div class="row mx-0">
  <div class="col-12" style="padding-bottom:2rem;">
    <h1>Your Teams </h1>
    <p>for {{$season['name']}}</p>
    @if (boolval($sco_settings['freeze_teams']))
      <p class="text-danger">Teams are frozen!</p>
    @endif
    @if (boolval($sco_settings['freeze_teams']))
      <span class="btn btn-secondary" title="Teams are frozen. You can't add a team right now">+ Create New Team</span>
    @else
      <a href="{{url('myteams/create')}}" class="btn btn-primary">+ Create New Team</a>
    @endif
    @foreach ($teams as $team)
      <hr>
      <div class="card">
        <div class="card-header">
          <h2>{{$team->name}} # {{$team->number}}
          <div class="btn-group ml-5">
            @if (boolval($sco_settings['freeze_teams']))
              <span class="btn btn-outline-secondary" title="Teams are frozen. You can't edit your team right now">Edit</span>
              <span class="btn btn-outline-secondary" title="Teams are frozen. You can't delete your team right now">Withdraw / Delete</span>
            @else
              <a href="{{url('/myteams/edit/'.$team->id)}}" class="btn btn-outline-success">Edit</a>
              <a href="{{url('/myteams/delete/'.$team->id)}}" class="btn btn-outline-danger">Withdraw / Delete</a>
            @endif
          </div>
          </h2>
          <table class="table">
            <tr>
              <td>Car: {{config('constants.car_names')[$team->car]}}</td>
              <td>iRacing Team ID: {{$team->ir_teamid}}</td>
              <td>Status: <span class="text-{{config('constants.status_colors')[$team['status']]}}">{{config('constants.status_names')[$team['status']]}}</span></td>
            </tr>
            <tr>
              <td colspan="3">
                @if(!empty($team->website))
                  <a class="mr-3" href="{{$team->website}}"><i class="fas fa-globe"></i></a>
                @endif
                @if(!empty($team->twitter))
                  <a class="mr-3" href="{{$team->twitter}}"><i class="fab fa-twitter"></i></a>
                @endif
                @if(!empty($team->facebook))
                  <a class="mr-3" href="{{$team->facebook}}"><i class="fab fa-facebook"></i></a>
                @endif
                @if(!empty($team->instagram))
                  <a class="mr-3" href="{{$team->instagram}}"><i class="fab fa-instagram"></i></a>
                @endif
              </td>
            </tr>
          </table>
        </div>
        <div class="card-body">
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
