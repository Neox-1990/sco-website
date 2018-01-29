@extends('admin.master.master')

@section('content')
  <h1>Edit Season {{$season->name}} Round {{$round->number}}</h1>
  <hr>
  <form class="" action="{{url('/admin/season/edit/'.$season['id'].'/editRound/'.$round['id'])}}" method="post">
    {{csrf_field()}}
    <div class="form-group">
      <label for="round_number">Number</label>
      <input type="text" class="form-control" name="round_number" value="{{$round['number']}}" id="round_number">
    </div>
    <hr>
    @php
      $combo_parts = explode('#',$round['combo'])
    @endphp
    <div class="form-group">
      <label for="round_name">Round Name</label>
      <input type="text" class="form-control" name="round_name" value="{{$combo_parts[0]}}" id="round_name">
    </div>
    <div class="form-group">
      <label for="round_track">Round Track</label>
      <input type="text" class="form-control" name="round_track" value="{{$combo_parts[1]}}" id="round_track">
    </div>
    <div class="form-group">
      <label for="round_time">Round Time</label>
      <input type="text" class="form-control" name="round_time" value="{{$combo_parts[2]}}" id="round_time">
    </div>
    <hr>
    <div class="form-group">
      <label for="round_fp1_start">FP1 Start</label>
      <input type="text" class="form-control" name="round_fp1_start" value="{{$round['fp1_start']}}" id="round_fp1_start">
    </div>
    <div class="form-group">
      <label for="round_fp1_min">FP1 Minutes</label>
      <input type="text" class="form-control" name="round_fp1_min" value="{{$round['fp1_minutes']}}" id="round_fp1_min">
    </div>
    <hr>
    <div class="form-group">
      <label for="round_fp2_start">FP2 Start</label>
      <input type="text" class="form-control" name="round_fp2_start" value="{{$round['fp2_start']}}" id="round_fp2_start">
    </div>
    <div class="form-group">
      <label for="round_fp2_min">FP2 Minutes</label>
      <input type="text" class="form-control" name="round_fp2_min" value="{{$round['fp2_minutes']}}" id="round_fp2_min">
    </div>
    <hr>
    <div class="form-group">
      <label for="round_fp3_start">FP3 Start</label>
      <input type="text" class="form-control" name="round_fp3_start" value="{{$round['fp3_start']}}" id="round_fp3_start">
    </div>
    <div class="form-group">
      <label for="round_fp3_min">FP3 Minutes</label>
      <input type="text" class="form-control" name="round_fp3_min" value="{{$round['fp3_minutes']}}" id="round_fp3_min">
    </div>
    <hr>
    <div class="form-group">
      <label for="round_warmup_start">Warmup Start</label>
      <input type="text" class="form-control" name="round_warmup_start" value="{{$round['warmup_start']}}" id="round_warmup_start">
    </div>
    <div class="form-group">
      <label for="round_warmup_min">Warmup Minutes</label>
      <input type="text" class="form-control" name="round_warmup_min" value="{{$round['warmup_minutes']}}" id="round_warmup_min">
    </div>
    <hr>
    <div class="form-group">
      <label for="round_qual_start">Qual Start</label>
      <input type="text" class="form-control" name="round_qual_start" value="{{$round['qual_start']}}" id="round_qual_start">
    </div>
    <div class="form-group">
      <label for="round_qual_min">Qual Minutes</label>
      <input type="text" class="form-control" name="round_qual_min" value="{{$round['qual_minutes']}}" id="round_qual_min">
    </div>
    <hr>
    <div class="form-group">
      <label for="round_race_start">Race Start</label>
      <input type="text" class="form-control" name="round_race_start" value="{{$round['race_start']}}" id="round_race_start">
    </div>
    <div class="form-group">
      <label for="round_race_min">Race Minutes</label>
      <input type="text" class="form-control" name="round_race_min" value="{{$round['race_minutes']}}" id="round_race_min">
    </div>
    <div class="form-group">
      <input class="btn btn-primary" type="submit" name="round_edit" value="update">
    </div>
  </form>
@endsection
