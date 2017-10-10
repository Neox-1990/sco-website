@extends('master.master')

@section('main')
<div class="row">
  <div class="col-12" style="padding-bottom:2rem;">
    <div class="mb-3 d-flex flex-wrap" id="results_controlbox_rounds">
      <a href="{{url('/results')}}" class="btn btn-outline-primary">Championship</a>
      @foreach ($rounds as $roundX)
        <a href="{{url('/results/'.$roundX->id)}}" class="btn btn-{{$roundX->id==$round->id?'primary':'outline-primary'}} ml-3 mt-1">Round {{$roundX->number}}</a>
      @endforeach
    </div>
    <div class="mb-3 d-flex flex-wrap" id="results_controlbox_class">
      @foreach ($resultsSorted as $class => $results)
        <button data-class="{{$class}}" class="btn btn-{{$class!=$first?'outline-'.$class:$class}} mr-3 mt-1 {{$class}}-toggle">{{$class}}</button>
      @endforeach
    </div>
    @if ($resultsSorted[$first]->isEmpty())
      <p>No results yet.</p>
    @else
      @foreach ($resultsSorted as $class => $results)
        <table id="{{$class}}-result" class="table result-table {{$class!=$first?'d-none':''}}">
          <tr>
            <th>Pos</th>
            <th>Team</th>
            <th>Laps</th>
            <th>Inc</th>
            <th>Out</th>
            <th>Points</th>
          </tr>
          @foreach ($results as $key => $result)
            <tr>
              <td>{{$result->position}}</td>
              <td><a href="{{url('teams/'.$result->team->id)}}">{{$result->team->name}}</a></td>
              <td>{{$result->laps}}</td>
              <td>{{$result->incs}}</td>
              <td>{{config('constants.out_status')[$result->finish_status]}}</td>
              <td>{{floor($result->points)}}</td>
            </tr>
          @endforeach
        </table>
      @endforeach
    @endif

  </div>
</div>
@endsection
