@extends('master.master')

@section('main')
<div class="row">
  <div class="col-12" style="padding-bottom:2rem;">
    <h1>{{$season['name']}}</h1>
    <hr>
    <div class="mb-3 d-flex flex-wrap" id="results_controlbox_rounds">
      <a href="{{url('/archive/'.$season['id'])}}" class="btn btn-primary">Championship</a>
      @foreach ($rounds as $round)
        <a href="{{url('/archive/'.$season['id'].'/'.$round->id)}}" class="btn btn-outline-primary ml-3 mt-1">Round {{$round->number}}</a>
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
    @endif

  </div>
</div>
@endsection
