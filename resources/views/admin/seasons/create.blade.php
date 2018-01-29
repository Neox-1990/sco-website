@extends('admin.master.master')

@section('content')
  <h1>Create new Season </h1>
  <hr>
  <h3>Base Info</h3>
  <form class="" action="{{url('/admin/season/create')}}" method="post">
    {{csrf_field()}}
    <div class="form-group">
      <label for="season_name">Name</label>
      <input type="text" class="form-control" name="season_name" placeholder="text" id="season_name">
    </div>
    <div class="form-group">
      <label for="season_start">Start</label>
      <input type="text" class="form-control" name="season_start" placeholder="YYYY-MM-DD" id="season_start">
    </div>
    <div class="form-group">
      <label for="season_end">End</label>
      <input type="text" class="form-control" name="season_end" placeholder="YYYY-MM-DD" id="season_end">
    </div>
    <div class="form-group">
      <input class="btn btn-primary" type="submit" name="season_edit" value="create">
    </div>
  </form>

@endsection
