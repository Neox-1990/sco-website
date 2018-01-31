@extends('master.master')

@section('main')

<div class="row">
  <div class="col-12">
    <h1>Event Archive</h1>
    <table class="table">
      <thead>
        <tr>
          <th>Season / Event</th>
          <th>Start</th>
          <th>End</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($seasons as $season)
          <tr>
            <td><a href="{{url('archive/'.$season['id'])}}">{{$season['name']}}</a></td>
            <td>{{$season['start']}}</td>
            <td>{{$season['end']}}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

@endsection
