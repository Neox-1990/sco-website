@extends('master.master')

@section('main')
<div class="row">
  <div class="col-12" style="padding-bottom:2rem;">
    <div class="mb-3 d-flex flex-wrap" id="results_controlbox_rounds">
      <a href="{{url('/results')}}" class="btn btn-primary">Championship</a>
      @foreach ($rounds as $round)
        <a href="{{url('/results/'.$round->id)}}" class="btn btn-outline-primary ml-3 mt-1">Round {{$round->number}}</a>
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
    @endif

  </div>
</div>
@endsection
