@extends('admin.master.master')

@section('content')
  <h1>Edit Team {{$team['name']}}</h1>
  <hr>
  <h3>Teamdata</h3>
  <form class="" action="{{url('/admin/teams/'.$team['id'])}}" method="post">
    {{csrf_field()}}
    <div class="form-group">
      <label for="team_name">Name</label>
      <input type="text" class="form-control" name="teamname" value="{{$team['name']}}" id="team_name">
    </div>
    <div class="form-group">
      <label for="team_irid">iRacing Teamid</label>
      <input type="text" class="form-control" name="teamiracingid" value="{{$team['ir_teamid']}}" id="team_irid">
    </div>
    <div class="form-group">
      <label for="team_number">Number</label>
      <input type="text" class="form-control" name="teamnumber" value="{{$team['number']}}" id="team_number">
    </div>
    <div class="form-group">
      <label for="team_car">Car</label>
      <select class="form-control" name="teamcar" id="team_car">
        @foreach ($cars as $key => $value)
          <option value="{{$key}}" {{$key==$team['car']?'selected':''}}>{{$value}}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group">
      <input class="btn btn-primary" type="submit" name="teamdataupdate" value="update">
    </div>
  </form>
  <h3 class="mt-5">Drivers</h3>
  <table class="table">
    <thead>
      <tr>
        <th>name</th>
        <th>iracing ID</th>
        <th>irating</th>
        <th>safetyrating</th>
        <th>action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($drivers as $driver)
        <tr>
          <td><a href="{{url('/admin/users/'.$driver['id'])}}">{{$driver['name']}}</a></td>
          <td><a href="http://members.iracing.com/membersite/member/CareerStats.do?custid={{$driver['iracing_id']}}">{{$driver['iracing_id']}}</a></td>
          <td>{{$driver['irating']}}</td>
          <td>{{$driver['safetyrating']}}</td>
          <td><form class="" action="{{url('/admin/teams/'.$team['id'])}}" method="post">
            {{csrf_field()}}
            <input type="hidden" name="driverid" value="{{$driver['id']}}">
            <input class="btn btn-danger" type="submit" name="driverremove" value="remove">
          </form></td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection
