@extends('master.master')

@section('main')
<div class="row">
  <div class="col-12" style="padding-bottom:2rem;">
    <h1>Driver searchresult</h1>
    <p>for "{{$search}}"</p>
    <hr>
    @if (count($drivers))
      <table class="table">
        <tr>
          <th>Name</th>
          <th>iRacing ID</th>
          <th>iRating</th>
          <th>Safetyrating</th>
        </tr>
        @foreach ($drivers as $driver)
          <tr>
            <td><a href="{{url('driver/'.$driver['id'])}}">{{$driver['name']}}</a></td>
            <td><a href="http://members.iracing.com/membersite/member/CareerStats.do?custid={{$driver['iracing_id']}}" target="_blank">{{$driver['iracing_id']}}</a></td>
            <td>{{$driver['irating']}}</td>
            <td>{{$driver['safetyrating']}}</td>
          </tr>
        @endforeach
      </table>
    @else
      <p>no result</p>
    @endif
  </div>
</div>
@endsection
