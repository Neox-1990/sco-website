<?php
use Carbon\Carbon;

?>

@extends('master.master')

@section('main')

<div class="row mx-0">
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
      @if (is_null($times['r_i']))
        <h5 class="ml-0 ml-md-3 ml-lg-5">{{$title[1][0]}} <small class="text-muted ml-2">{{$title[1][1]}}</small></h5>
        <h6 class="ml-0 ml-md-3 ml-lg-5 text-muted">Time: {{$title[2]}}</h6>
      @else
        <h5 class="ml-0 ml-md-3 ml-lg-5">{{$title[1][0]}}</h5>
        <h6 class="ml-0 ml-md-3 ml-lg-5 text-muted">Layout: {{$title[1][1]}}</h6>
      @endif
      <hr>
      <table class="table table-bordered table-striped table-hover" id="round-sessions-table">
        @if (!is_null($times['fp1']))
          <tr>
            <th>F<span class="d-none d-md-inline">ree </span>P<span class="d-none d-md-inline">ractice</span> 1</th>
            <td>
              <p><i class="fas fa-calendar-alt mr-3" aria-hidden="true" data-toggle="popover" title="Real Life Date & Time"></i><span class="d-none d-lg-inline">{{$times['fp1']->format('l jS \\of F Y H:i (e)')}}</span><span class="d-inline d-lg-none">{{$times['fp1']->format('Y-m-d H:i')}}</span></p>
              @if (!is_null($times['fp1_i']))
                <p><i class="fas fa-cloud-sun mr-3" data-toggle="popover" title="Insim Date & Time"></i><span>{{$times['fp1_i']->format('Y-m-d H:i')}}</span></p>
              @endif
            </td>
            <td><i class="fas fa-stopwatch mr-3 d-none d-md-inline" aria-hidden="true"></i>{{$round->fp1_minutes}} min</td>
          </tr>
        @endif
        @if (!is_null($times['fp2']))
          <tr>
            <th>F<span class="d-none d-md-inline">ree </span>P<span class="d-none d-md-inline">ractice</span> 2</th>
            <td>
              <p><i class="fas fa-calendar-alt mr-3" aria-hidden="true" data-toggle="popover" title="Real Life Date & Time"></i><span class="d-none d-lg-inline">{{$times['fp2']->format('l jS \\of F Y H:i (e)')}}</span><span class="d-inline d-lg-none">{{$times['fp2']->format('Y-m-d H:i')}}</span></p>
              @if (!is_null($times['fp2_i']))
                <p><i class="fas fa-cloud-sun mr-3" data-toggle="popover" title="Insim Date & Time"></i><span>{{$times['fp2_i']->format('Y-m-d H:i')}}</span></p>
              @endif
            </td>
            <td><i class="fas fa-stopwatch mr-3 d-none d-md-inline" aria-hidden="true"></i>{{$round->fp2_minutes}} min</td>
          </tr>
        @endif
        @if (!is_null($times['fp3']))
          <tr>
            <th>F<span class="d-none d-md-inline">ree </span>P<span class="d-none d-md-inline">ractice</span> 3</th>
            <td>
              <p><i class="fas fa-calendar-alt mr-3" aria-hidden="true" data-toggle="popover" title="Real Life Date & Time"></i><span class="d-none d-lg-inline">{{$times['fp3']->format('l jS \\of F Y H:i (e)')}}</span><span class="d-inline d-lg-none">{{$times['fp3']->format('Y-m-d H:i')}}</span></p>
              @if (!is_null($times['fp3_i']))
                <p><i class="fas fa-cloud-sun mr-3" data-toggle="popover" title="Insim Date & Time"></i><span>{{$times['fp3_i']->format('Y-m-d H:i')}}</span></p>
              @endif
            </td>
            <td><i class="fas fa-stopwatch mr-3 d-none d-md-inline" aria-hidden="true"></i>{{$round->fp3_minutes}} min</td>
          </tr>
        @endif
        <tr>
          <th>W<span class="d-none d-md-inline">arm </span>U<span class="d-none d-md-inline">p</span></th>
          <td>
            <p><i class="fas fa-calendar-alt mr-3" aria-hidden="true" data-toggle="popover" title="Real Life Date & Time"></i><span class="d-none d-lg-inline">{{$times['wup']->format('l jS \\of F Y H:i (e)')}}</span><span class="d-inline d-lg-none">{{$times['wup']->format('Y-m-d H:i')}}</span></p>
            @if (!is_null($times['wup_i']))
              <p><i class="fas fa-cloud-sun mr-3" data-toggle="popover" title="Insim Date & Time"></i><span>{{$times['wup_i']->format('Y-m-d H:i')}}</span></p>
            @endif
          </td>
          <td><i class="fas fa-stopwatch mr-3 d-none d-md-inline" aria-hidden="true"></i>{{$round->warmup_minutes}} min</td>
        </tr>
        <tr>
          <th>Qual<span class="d-none d-md-inline">ifying</span></th>
          <td>
            <p><i class="fas fa-calendar-alt mr-3" aria-hidden="true" data-toggle="popover" title="Real Life Date & Time"></i><span class="d-none d-lg-inline">{{$times['q']->format('l jS \\of F Y H:i (e)')}}</span><span class="d-inline d-lg-none">{{$times['q']->format('Y-m-d H:i')}}</span></p>
            @if (!is_null($times['q_i']))
              <p><i class="fas fa-cloud-sun mr-3" data-toggle="popover" title="Insim Date & Time"></i><span>{{$times['q_i']->format('Y-m-d H:i')}}</span></p>
            @endif
          </td>
          <td><i class="fas fa-stopwatch mr-3 d-none d-md-inline" aria-hidden="true"></i>{{$round->qual_minutes}} min</td>
        </tr>
        <tr>
          <th>Race</th>
          <td>
            <p><i class="fas fa-calendar-alt mr-3" aria-hidden="true" data-toggle="popover" title="Real Life Date & Time"></i><span class="d-none d-lg-inline">{{$times['r']->format('l jS \\of F Y H:i (e)')}}</span><span class="d-inline d-lg-none">{{$times['r']->format('Y-m-d H:i')}}</span></p>
            @if (!is_null($times['r_i']))
              <p><i class="fas fa-cloud-sun mr-3" data-toggle="popover" title="Insim Date & Time"></i><span>{{$times['r_i']->format('Y-m-d H:i')}}</span></p>
            @endif
          </td>
          @if (!empty($round->race_minutes))
            <td><i class="fas fa-stopwatch mr-3 d-none d-md-inline" aria-hidden="true"></i>{{$round->race_minutes}} min</td>
          @else
            <td><i class="fas fa-circle-notch mr-3 d-none d-md-inline" aria-hidden="true"></i>{{$round->race_laps}} laps</td>
          @endif
        </tr>
      </table>
    </div>
  </div>
</div>

@endsection

@section('additionalFooter')
<script type="text/javascript">
$(function () {
$('[data-toggle="popover"]').popover()
})
</script>
@endsection
