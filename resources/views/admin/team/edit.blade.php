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
      <label for="team_manager">Manager</label>
      <select class="form-control" name="teammanager" id="team_manager">
        @foreach ($managers as $manager)
        <option value="{{$manager->id}}" {{$manager->id == $team->user_id ? 'selected' : ''}}>{{$manager->name}} ({{$manager->id}}) - {{$manager->email}}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group">
      <label for="team_number">Number</label>
      <input type="text" class="form-control" name="teamnumber" value="{{$team['number']}}" id="team_number">
    </div>
    <div class="form-group">
      <label for="website">Website</label>
      <input type="text" class="form-control" name="website" value="{{$team['website']}}" id="website">
    </div>
    <div class="form-group">
      <label for="twitter">Twitter</label>
      <input type="text" class="form-control" name="twitter" value="{{$team['twitter']}}" id="twitter">
    </div>
    <div class="form-group">
      <label for="facebook">Facebook</label>
      <input type="text" class="form-control" name="facebook" value="{{$team['facebook']}}" id="facebook">
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
          <td><a href="{{url('/admin/drivers/'.$driver['id'])}}">{{$driver['name']}}</a></td>
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
        <tr>
          <td colspan="5">
            <form class="form-inline" action="{{url('/admin/teams/'.$team['id'])}}" method="post">
              {{csrf_field()}}
              <div class="form-group">
                <select class="form-control" name="driverid_add">
                  @foreach ($alldrivers as $driver)
                  <option value="{{$driver->id}}">{{$driver->name}} ({{$driver->iracing_id}})</option>
                  @endforeach
                </select>
                <input class="btn btn-primary" type="submit" name="driveradd" value="add">                
              </div>
            </form>
          </td>
        </tr>
    </tbody>
  </table>
@endsection
