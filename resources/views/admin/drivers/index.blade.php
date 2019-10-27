@extends('admin.master.master')

@section('content')
  <h1>Drivers</h1>
  <hr>
  <p><a href="{{url('/admin/drivers/')}}">Current Season</a></p>
  <p><a href="{{url('/admin/drivers/all/')}}">All Drivers</a></p>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>action</th>
        <th class="sco-table-sort" data-sort-content="numeric" data-sort-dir="asc">id</th>
        <th class="sco-table-sort" data-sort-content="text" data-sort-dir="asc">name</th>
        <th class="sco-table-sort" data-sort-content="numeric" data-sort-dir="asc">iracing id</th>
        <th class="sco-table-sort" data-sort-content="numeric" data-sort-dir="asc">irating</th>
        <th class="sco-table-sort" data-sort-content="text" data-sort-dir="asc">safetyrating</th>
        <th class="sco-table-sort" data-sort-content="text" data-sort-dir="asc">location</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($drivers as $driver)
        <tr>
          <td><a href="{{url('admin/drivers/'.$driver['id'])}}" class="btn btn-primary">edit</a></td>
          <td>{{$driver['id']}}</td>
          <td>{{$driver['name']}}</td>
          <td><a href="http://members.iracing.com/membersite/member/CareerStats.do?custid={{$driver['iracing_id']}}">{{$driver['iracing_id']}}</a></td>
          <td>{{$driver['irating']}}</td>
          <td>{{$driver['safetyrating']}}</td>
          <td>{{$driver['location']}}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection
