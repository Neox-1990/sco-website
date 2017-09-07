@extends('admin.master.master')

@section('content')
  <h1>Drivers</h1>
  <hr>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>action</th>
        <th class="sco-table-sort" data-sort-content="text" data-sort-dir="asc">name</th>
        <th class="sco-table-sort" data-sort-content="numeric" data-sort-dir="asc">iracing id</th>
        <th class="sco-table-sort" data-sort-content="numeric" data-sort-dir="asc">irating</th>
        <th class="sco-table-sort" data-sort-content="text" data-sort-dir="asc">safetyrating</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($drivers as $driver)
        <tr>
          <td><a href="{{url('admin/drivers/'.$driver['id'])}}" class="btn btn-primary">edit</a></td>
          <td>{{$driver['name']}}</td>
          <td><a href="http://members.iracing.com/membersite/member/CareerStats.do?custid={{$driver['iracing_id']}}">{{$driver['iracing_id']}}</a></td>
          <td>{{$driver['irating']}}</td>
          <td>{{$driver['safetyrating']}}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection