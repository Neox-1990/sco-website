@extends('admin.master.master')

@section('content')
  <h1>PQ-Tool</h1>
  <hr>
  <form class="" action="{{url('admin/tools/pq')}}" method="post">
    {{ csrf_field() }}
    <div class="form-group">
      <label for="body">Copied Laps</label>
      <textarea class="form-control" id="raw" name="raw" rows="8" cols="80"></textarea>
    </div>

    <div class="form-group">
      <input class="btn btn-primary" type="submit" name="Calculate" value="calc">
    </div>
  </form>
@endsection
