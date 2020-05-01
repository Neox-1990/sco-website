@extends('master.master')

@section('main')
<div class="row mx-0">
  <div class="col-12" style="padding-bottom:2rem;">
    <h1>{{$season['name']}}</h1>
    <hr>
    <a href="{{url('/archive/'.$season['id'])}}" class="btn btn-outline-primary m-2">{{$rounds->count()>1 ? 'Championship' : 'Event'}}</a>
    <div class="mb-3 d-flex flex-wrap justify-content-start align-items-stretch" id="results_controlbox_rounds">
      @foreach ($rounds as $roundX)
        <a href="{{url('/archive/'.$season['id'].'/'.$roundX->id)}}" class="btn btn-{{$roundX->id==$round->id?'primary':'outline-primary'}} m-2">{{$rounds->count()>1 ? 'Round '.$round->number : 'Race'}}</a>
      @endforeach
    </div>
    <div class="mb-3 d-flex flex-wrap" id="results_controlbox_class">
      @foreach ($resultsSorted as $class => $results)
        <button data-class="{{$class}}" data-season="{{$season['id']}}" class="btn class-btn-background-{{$class!=$first?'outline-'.$class:$class}}{{$season['id']}} m-2 {{$class}}-toggle">{{$class}}</button>
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
            <th class="text-center">Laps</th>
            <th class="text-center">Inc</th>
            <th class="text-center">Out</th>
            <th class="text-center">Pts</th>
          </tr>
          @foreach ($results as $key => $result)
            <tr>
              <td class="text-center">{{$result->position}}</td>
              <td><a href="{{url('teams/'.$result->team->id)}}" class="{{$result->team->trashed()?'text-muted':''}}">{{$result->team->name}}</a></td>
              <td class="text-center">{{$result->laps}}</td>
              <td class="text-center">{{$result->incs}}</td>
              <td class="text-center">{{config('constants.out_status')[$result->finish_status]}}</td>
              <td class="text-center">{{floor($result->points)}}</td>
            </tr>
          @endforeach
        </table>
      @endforeach
    @endif

  </div>
</div>
@endsection
