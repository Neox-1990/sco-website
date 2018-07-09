<?php
use Carbon\Carbon;

?>

@extends('master.master')

@section('main')

<div class="row">
  <div class="col-12">
    <div class="p-3">
      <h1>{{$season->name}}</h1>
      <h5><small class="text-muted ml-2">{{(new Carbon($season->start))->format('d/m/Y')}} - {{(new Carbon($season->end))->format('d/m/Y')}}</small></h5>
    </div>
    <ul class="nav nav-tabs round-tabs nav-justified">
      @foreach ($all as $roundElement)
        <li class="nav-item nav-item-fullwidth">
          <a class="nav-link {{$roundElement->id==$round->id?'active':''}}" href="{{url('/rounds/'.$roundElement->id)}}">R<span class="d-none d-md-inline">ound</span> {{$roundElement->number}}</a>
        </li>
      @endforeach
    </ul>
    <div class="jumbotron round-frame">
      <h2>{{$title[0]}}</h2>
      <h5 class="ml-5">{{$title[1][0]}} <small class="text-muted ml-2">{{$title[1][1]}}</small></h5>
      <h6 class="ml-5 text-muted">Time: {{$title[2]}}</h6>
      <hr>
      <table class="table table-bordered table-striped table-hover" id="round-sessions-table">
        @if (!is_null($times['fp1']))
          <tr>
            <th>Free practice 1</th>
            <td><i class="fas fa-calendar-alt mr-3" aria-hidden="true"></i> {{$times['fp1']->format('l jS \\of F Y H:i:s-e')}}</td>
            <td><i class="fas fa-stopwatch mr-3" aria-hidden="true"></i> {{$round->fp1_minutes}} min</td>
          </tr>
        @endif
        @if (!is_null($times['fp2']))
          <tr>
            <th>Free practice 2</th>
            <td><i class="fas fa-calendar-alt mr-3" aria-hidden="true"></i> {{$times['fp2']->format('l jS \\of F Y H:i:s-e')}}</td>
            <td><i class="fas fa-stopwatch mr-3" aria-hidden="true"></i> {{$round->fp2_minutes}} min</td>
          </tr>
        @endif
        @if (!is_null($times['fp3']))
          <tr>
            <th>Free practice 3</th>
            <td><i class="fas fa-calendar-alt mr-3" aria-hidden="true"></i> {{$times['fp3']->format('l jS \\of F Y H:i:s-e')}}</td>
            <td><i class="fas fa-stopwatch mr-3" aria-hidden="true"></i> {{$round->fp3_minutes}} min</td>
          </tr>
        @endif
        <tr>
          <th>Warm up</th>
          <td><i class="fas fa-calendar-alt mr-3" aria-hidden="true"></i> {{$times['wup']->format('l jS \\of F Y H:i:s-e')}}</td>
          <td><i class="fas fa-stopwatch mr-3" aria-hidden="true"></i> {{$round->warmup_minutes}} min</td>
        </tr>
        <tr>
          <th>Qualifying</th>
          <td><i class="fas fa-calendar-alt mr-3" aria-hidden="true"></i> {{$times['q']->format('l jS \\of F Y H:i:s-e')}}</td>
          <td><i class="fas fa-stopwatch mr-3" aria-hidden="true"></i> {{$round->qual_minutes}} min</td>
        </tr>
        <tr>
          <th>Race</th>
          <td><i class="fas fa-calendar-alt mr-3" aria-hidden="true"></i> {{$times['r']->format('l jS \\of F Y H:i:s-e')}}</td>
          @if (!empty($round->race_minutes))
            <td><i class="fas fa-stopwatch mr-3" aria-hidden="true"></i> {{$round->race_minutes}} min</td>
          @else
            <td><i class="fas fa-circle-notch mr-3" aria-hidden="true"></i> {{$round->race_laps}} laps</td>
          @endif
        </tr>
      </table>
    </div>
  </div>
</div>

@endsection
