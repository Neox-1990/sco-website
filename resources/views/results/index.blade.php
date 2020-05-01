@extends('master.master')

@section('main')
<div class="row mx-0">
  <div class="col-12" style="padding-bottom:2rem;">
    <a href="{{url('/results')}}" class="btn btn-primary m-2">{{$rounds->count()>1 ? 'Championship' : 'Event'}}</a>
    <div class="mb-3 d-flex flex-wrap justify-content-start align-items-stretch" id="results_controlbox_rounds">
      @foreach ($rounds as $round)
        <a href="{{url('/results/'.$round->id)}}" class="btn btn-outline-primary m-2">{{$rounds->count()>1 ? 'Round '.$round->number : 'Race'}}</a>
      @endforeach
    </div>
    <div class="mb-3 d-flex flex-wrap" id="results_controlbox_class">
      @foreach ($resultsSorted as $class => $results)
        <button data-class="{{$class}}" data-season="{{config('constants.current_season')}}" class="btn class-btn-background-{{$class!=$first?'outline-'.$class:$class}}{{config('constants.current_season')}} m-2 {{$class}}-toggle">{{$class}}</button>
      @endforeach
      @php
      /*
      <button data-class="cleanx" data-season="{{config('constants.current_season')}}" class="btn class-btn-background-outline-cleanx{{config('constants.current_season')}} m-2 cleanx-toggle">Clean X</button>
      */
      @endphp
    </div>
    @if ($resultsSorted[$first]->isEmpty())
      <p>No results yet.</p>
    @else
      @foreach ($resultsSorted as $class => $results)
        <table id="{{$class}}-result" class="table table-hover result-table {{$class!=$first?'d-none':''}}">
          <tr>
            <th class="text-center">Pos</th>
            <th>Team</th>
            @foreach ($rounds as $round)
              <th class="text-center small-result d-none d-sm-table-cell">R{{$round->number}}</th>
            @endforeach
            <th class="text-center">Pts</th>
          </tr>
          @foreach ($results as $key => $result)
            <tr>
              <td class="text-center">{{$key+1}}</td>
              <td><a href="{{url('teams/'.$result->team->id)}}" class="{{$result->team->trashed()?'text-muted':''}}">{{$result->team->name}}</a></td>
              @foreach ($rounds as $round)
                <td class="small-result text-center d-none d-sm-table-cell {{$result->team->trashed()?'text-muted':''}}">{{$teamResults[$result->team->id][$round->number]}}</td>
              @endforeach
              <td class="text-center">{{floor($result->points)}}</td>
            </tr>
          @endforeach
        </table>
      @endforeach

      <table id="cleanx-result" class="table table-hover result-table d-none">
        <tr>
          <th class="text-center">Pos</th>
          <th class="text-center">#</th>
          <th>Team</th>
          <th class="text-center">Pts</th>
        </tr>
        @foreach ($incsSorted as $key => $team)
          <tr>
            <td class="text-center">{{$key+1}}</td>
            <td class="text-center">{{$team->team->number}}</td>
            <td><a href="{{url('teams/'.$team->team->id)}}">{{$team->team->name}}</a></td>
            <td class="text-center">{{$team->laps - $team->incs}}</td>
          </tr>
        @endforeach
      </table>

    @endif

  </div>
</div>
@endsection
