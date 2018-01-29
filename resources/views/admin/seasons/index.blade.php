@extends('admin.master.master')

@section('content')
  <h1>Seasons</h1>
  <hr>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>id</th>
        <th>Start</th>
        <th>End</th>
        <th>Name</th>
        <th>Edit</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($seasons as $season)
        <tr>
          <td>{{$season->id}}</td>
          <td>{{$season->start}}</td>
          <td>{{$season->end}}</td>
          <td>{{$season->name}}</td>
          <td><a class="btn btn-primary" href="{{url('admin/season/edit/'.$season->id)}}">edit</a></td>
        </tr>
      @endforeach
    </tbody>
  </table>
  <a class="btn btn-success" href="{{url('admin/season/create')}}">add new season</a>
@endsection
