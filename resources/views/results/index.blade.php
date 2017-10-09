@extends('master.master')

@section('main')
<div class="row">
  <div class="col-12" style="padding-bottom:2rem;">
    @foreach ($resultsSorted as $class => $results)
      <h2>{{$class}}</h2>
      <table class="table">
        <tr>
          <th>Pos</th>
          <th>Team</th>
          <th>Points</th>
        </tr>
        @foreach ($results as $key => $result)
          <tr>
            <td>{{$key+1}}</td>
            <td><a href="{{url('teams/'.$result->team->id)}}">{{$result->team->name}}</a></td>
            <td>{{floor($result->points)}}</td>
          </tr>
        @endforeach
      </table>
    @endforeach

  </div>
</div>
@endsection
