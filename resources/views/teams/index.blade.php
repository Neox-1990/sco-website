@extends('master.master')

@section('main')
<div class="row">
  <div class="col-12" style="padding-bottom:2rem;">
    <h1>Teams</h1>
    @include('master.formerrors')
    <form action="{{url('teams/')}}" method="post" class="mb-3">
      {{csrf_field()}}
      <div class="input-group">
        <span class="input-group-addon search-group-title" id="basic-addon1">search team</span>
        <button type="submit" id="team-search-button" class="input-group-addon btn btn-primary" name="search"><i class="fa fa-search" aria-hidden="true"></i></button>
        <input type="text" class="form-control" placeholder="by iRacing Team ID or name" aria-describedby="basic-addon1" name="searchinput">
      </div>
    </form>
    <form action="{{url('driver/')}}" method="post">
      {{csrf_field()}}
      <div class="input-group">
        <span class="input-group-addon search-group-title" id="basic-addon2">search driver</span>
        <button type="submit" id="driver-search-button" class="input-group-addon btn btn-primary" name="search"><i class="fa fa-search" aria-hidden="true"></i></button>
        <input type="text" class="form-control" placeholder="by iRacing ID or name" aria-describedby="basic-addon1" name="searchinput">
      </div>
    </form>
    @foreach ($teams as $classname => $class)
      <div class="team-overview-class">
        <h2><span class="badge badge-pill badge-default badge-{{$classname}}">{{$classname}}</span></h2>
        <div class="table-responsive">
          <table class="table table-hover table-bordered">
            <thead class="thead-default">
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Car</th>
                <th>Manager</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($class['confirmed'] as $team)
                <tr>
                  <td>{{$team['number']}}</td>
                  <td><a href="/teams/{{$team['id']}}">{{$team['name']}}</a></td>
                  <td>{{config('constants.car_names')[$team['car']]}}</td>
                  <td>{{$team['user']['name']}}</td>
                  <td class="text-success">{{config('constants.status_names')[$team['status']]}}</td>
                </tr>
              @endforeach
              @foreach ($class['waiting'] as $team)
                <tr>
                  <td>{{$team['number']}}</td>
                  <td><a href="/teams/{{$team['id']}}">{{$team['name']}}</a></td>
                  <td>{{config('constants.car_names')[$team['car']]}}</td>
                  <td>{{$team['user']['name']}}</td>
                  <td class="text-warning">{{config('constants.status_names')[$team['status']]}}</td>
                </tr>
              @endforeach
              @foreach ($class['pending'] as $team)
                <tr>
                  <td>{{$team['number']}}</td>
                  <td><a href="/teams/{{$team['id']}}">{{$team['name']}}</a></td>
                  <td>{{config('constants.car_names')[$team['car']]}}</td>
                  <td>{{$team['user']['name']}}</td>
                  <td class="text-danger">{{config('constants.status_names')[$team['status']]}}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    @endforeach
  </div>
</div>
@endsection
