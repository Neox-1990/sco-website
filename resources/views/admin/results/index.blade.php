@extends('admin.master.master')

@section('content')
  <h1>Results</h1>
  <hr>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>#</th>
        <th>Round</th>
        <th>create</th>
        <th>edit</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($rounds as $round)
        <tr>
          <td>{{$round->number}}</td>
          <td>{{$round->combo}}</td>
          <td><a class="btn btn-primary" href="{{url('admin/results/create/'.$round->id)}}">create</a></td>
          <td><a class="btn btn-success" href="{{url('admin/results/edit/'.$round->id)}}">edit</a></td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection
