@extends('admin.master.master')

@section('content')
  <h1>Create new ROund for Season {{$season->name}}</h1>
  <hr>
  <form class="" action="{{url('/admin/season/edit/'.$season['id'].'/createRound')}}" method="post">
    {{csrf_field()}}
    <div class="form-group">
      <label for="round_number">Number</label>
      <input type="text" class="form-control" name="round_number" placeholder="number" id="round_number">
    </div>
    <hr>
    <div class="form-group">
      <label for="round_name">Round Name</label>
      <input type="text" class="form-control" name="round_name" placeholder="no # in here!" id="round_name">
    </div>
    <div class="form-group">
      <label for="round_track">Round Track</label>
      <input type="text" class="form-control" name="round_track" placeholder="no # in here!" id="round_track">
    </div>
    <div class="form-group">
      <label for="round_time">Round Time</label>
      <input type="text" class="form-control" name="round_time" placeholder="no # in here!" id="round_time">
    </div>
    <hr>
    <div class="form-group">
      <label for="round_fp1_start">FP1 Start</label>
      <input type="text" class="form-control" name="round_fp1_start" placeholder="YYYY-MM-DD HH:MM:SS" id="round_fp1_start">
    </div>
    <div class="form-group">
      <label for="round_fp1_min">FP1 Minutes</label>
      <input type="text" class="form-control" name="round_fp1_min" placeholder="number" id="round_fp1_min">
    </div>
    <hr>
    <div class="form-group">
      <label for="round_fp2_start">FP2 Start</label>
      <input type="text" class="form-control" name="round_fp2_start" placeholder="YYYY-MM-DD HH:MM:SS" id="round_fp2_start">
    </div>
    <div class="form-group">
      <label for="round_fp2_min">FP2 Minutes</label>
      <input type="text" class="form-control" name="round_fp2_min" placeholder="number" id="round_fp2_min">
    </div>
    <hr>
    <div class="form-group">
      <label for="round_fp3_start">FP3 Start</label>
      <input type="text" class="form-control" name="round_fp3_start" placeholder="YYYY-MM-DD HH:MM:SS" id="round_fp3_start">
    </div>
    <div class="form-group">
      <label for="round_fp3_min">FP3 Minutes</label>
      <input type="text" class="form-control" name="round_fp3_min" placeholder="number" id="round_fp3_min">
    </div>
    <hr>
    <div class="form-group">
      <label for="round_warmup_start">Warmup Start</label>
      <input type="text" class="form-control" name="round_warmup_start" placeholder="YYYY-MM-DD HH:MM:SS" id="round_warmup_start">
    </div>
    <div class="form-group">
      <label for="round_warmup_min">Warmup Minutes</label>
      <input type="text" class="form-control" name="round_warmup_min" placeholder="number" id="round_warmup_min">
    </div>
    <hr>
    <div class="form-group">
      <label for="round_qual_start">Qual Start</label>
      <input type="text" class="form-control" name="round_qual_start" placeholder="YYYY-MM-DD HH:MM:SS" id="round_qual_start">
    </div>
    <div class="form-group">
      <label for="round_qual_min">Qual Minutes</label>
      <input type="text" class="form-control" name="round_qual_min" placeholder="number" id="round_qual_min">
    </div>
    <hr>
    <div class="form-group">
      <label for="round_race_start">Race Start</label>
      <input type="text" class="form-control" name="round_race_start" placeholder="YYYY-MM-DD HH:MM:SS" id="round_race_start">
    </div>
    <div class="form-group">
      <label for="round_race_min">Race Minutes</label>
      <input type="text" class="form-control" name="round_race_min" placeholder="number" id="round_race_min">
    </div>
    <div class="form-group">
      <input class="btn btn-primary" type="submit" name="round_edit" value="create">
    </div>
  </form>
@endsection
