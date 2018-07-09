@extends('master.master')

@section('main')
<div class="row">
  <div class="col-12" style="padding-bottom:2rem;">
    <h1>Team searchresult</h1>
    <p>for "{{$search}}"</p>
    <hr>
    <h3>Current season</h3>
    @if (count($currentTeams))
      <table class="table">
        <tr>
          <th>Name</th>
          <th>Manager</th>
          <th>Car</th>
          <th>Status</th>
          <th>Season</th>
        </tr>
        @foreach ($currentTeams as $team)
          <tr>
            <td><a href="{{url('teams/'.$team['id'])}}">{{$team['name']}}</a></td>
            <td>{{$team['user']['name']}}</td>
            <td>{{config('constants.car_names')[$team['car']]}}</td>
            <td><span class="text-{{config('constants.status_colors')[$team['status']]}}">{{config('constants.status_names')[$team['status']]}}</span></td>
            <td>{{$team['season']['name']}}</td>
          </tr>
        @endforeach
      </table>
    @else
      <p>no teams in the curent season</p>
    @endif
    <hr>
    <h3>Past or deleted teams</h3>
    @if (count($oldTeams))
      <table class="table">
        <tr>
          <th>Name</th>
          <th>Manager</th>
          <th>Car</th>
          <th>Status</th>
          <th>Season</th>
        </tr>
        @foreach ($oldTeams as $team)
          <tr>
            <td><a href="{{url('teams/'.$team['id'])}}">{{$team['name']}}</a>
              @if ($team['deleted_at'] != null)
                <span class="text-muted" title="deleted team">*</span>
              @endif
            </td>
            <td>{{$team['user']['name']}}</td>
            <td>{{config('constants.car_names')[$team['car']]}}</td>
            <td><span class="text-{{config('constants.status_colors')[$team['status']]}}">{{config('constants.status_names')[$team['status']]}}</span></td>
            <td>{{$team['season']['name']}}</td>
          </tr>
        @endforeach
      </table>
    @else
      <p>no past or deleted teams</p>
    @endif
  </div>
</div>
@endsection
