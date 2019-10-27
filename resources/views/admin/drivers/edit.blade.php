@extends('admin.master.master')

@section('content')
  <h1>Edit {{$driver['name']}}</h1>
  <hr>
  <form class="" action="{{url('admin/drivers/'.$driver['id'])}}" method="post">
    {{ csrf_field() }}
    <div class="form-group">
      <label for="driver_name">Name</label>
      <input id="driver_name" class="form-control" type="text" name="drivername" value="{{$driver['name']}}">
    </div>
    <div class="form-group">
      <label for="driver_irid"><a target="_blank" href="http://members.iracing.com/membersite/member/CareerStats.do?custid={{$driver['iracing_id']}}">iRacing ID</a></label>
      <input id="driver_irid" class="form-control" type="text" name="driveririd" value="{{$driver['iracing_id']}}">
    </div>
    <div class="form-group">
      <label for="driver_irating">iRating</label>
      <input id="driver_irating" class="form-control" type="text" name="driverirating" value="{{$driver['irating']}}">
    </div>
    <div class="form-group">
      <label for="driver_safetyrating">Safetyrating</label>
      <input id="driver_safetyrating" class="form-control" type="text" name="driversafetyrating" value="{{$driver['safetyrating']}}">
    </div>
    <div class="form-group">
      <label for="driver_location">Location</label>
      <input id="driver_location" class="form-control" type="text" name="driverlocation" value="{{$driver['location']}}">
    </div>
    <div class="form-group">
      <input class="btn btn-primary" type="submit" name="editdriver" value="edit">
    </div>
  </form>
@endsection
