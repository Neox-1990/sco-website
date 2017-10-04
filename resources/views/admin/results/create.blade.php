@extends('admin.master.master')

@section('content')
  <h1>Results</h1>
  <hr>
  <form class="" action="{{url('admin/results/create/'.$round['id'])}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-group">
      <label for="result_csv">Result CSV</label>
      <input id="result_csv" class="form-control" type="file" name="result_csv">
    </div>
    <div class="form-group">
      <input class="btn btn-primary" type="submit" name="csvresult" value="upload">
    </div>
  </form>
@endsection
