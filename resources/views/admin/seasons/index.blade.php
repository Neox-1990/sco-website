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
        <th>Delete</th>
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
          <td><a class="btn btn-danger" href="{{url('admin/season/delete/'.$season->id)}}">delete</a></td>
        </tr>
      @endforeach
    </tbody>
  </table>
  <a class="btn btn-success" href="{{url('admin/season/create')}}">add new season</a>
@endsection
