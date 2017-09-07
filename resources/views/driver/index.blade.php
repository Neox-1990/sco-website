@extends('master.master')

@section('main')
<div class="row">
  <div class="col-12" style="padding-bottom:2rem;">
    <h1>All known SCO drivers</h1>
    <hr>
    @if (count($drivers))
      <table class="table">
        <thead>
          <tr>
            <th class=" sco-table-sort" data-sort-content="text" data-sort-dir="asc">Name</th>
            <th class=" sco-table-sort" data-sort-content="numeric" data-sort-dir="asc">iRacing ID</th>
            <th class=" sco-table-sort" data-sort-content="numeric" data-sort-dir="asc">iRating</th>
            <th class=" sco-table-sort" data-sort-content="text" data-sort-dir="asc">Safetyrating</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($drivers as $driver)
            <tr>
              <td><a href="{{url('driver/'.$driver['id'])}}">{{$driver['name']}}</a></td>
              <td><a href="http://members.iracing.com/membersite/member/CareerStats.do?custid={{$driver['iracing_id']}}" target="_blank">{{$driver['iracing_id']}}</a></td>
              <td>{{$driver['irating']}}</td>
              <td>{{$driver['safetyrating']}}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    @else
      <p>no result</p>
    @endif
  </div>
</div>
@endsection
