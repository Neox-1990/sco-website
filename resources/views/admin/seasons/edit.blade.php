@extends('admin.master.master')

@section('content')
  <h1>Edit Season {{$season->name}}</h1>
  <hr>
  <h3>Base Info</h3>
  <form class="" action="{{url('/admin/season/edit/'.$season['id'])}}" method="post">
    {{csrf_field()}}
    <div class="form-group">
      <label for="season_name">Name</label>
      <input type="text" class="form-control" name="season_name" value="{{$season['name']}}" id="season_name">
    </div>
    <div class="form-group">
      <label for="season_start">Start</label>
      <input type="text" class="form-control" name="season_start" value="{{$season['start']}}" id="season_start">
    </div>
    <div class="form-group">
      <label for="season_end">End</label>
      <input type="text" class="form-control" name="season_end" value="{{$season['end']}}" id="season_end">
    </div>
    <div class="form-group">
      <input class="btn btn-primary" type="submit" name="season_edit" value="update">
    </div>
  </form>
  <hr>
  <h3>Schedule</h3>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>number</th>
        <th>combo</th>
        <th>edit</th>
        <th>remove</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($rounds as $round)
        <tr>
          <td>{{$round->number}}</td>
          <td>{{$round->combo}}</td>
          <td><a class="btn btn-primary" href="{{url('admin/season/edit/'.$season['id'].'/editRound/'.$round['id'])}}">edit</a></td>
          <td><a class="btn btn-danger" href="{{url('admin/season/edit/'.$season['id'].'/deleteRound/'.$round['id'])}}">delete</a></td>
        </tr>
      @endforeach
    </tbody>
  </table>
  <a class="btn btn-success" href="{{url('admin/season/edit/'.$season['id'].'/createRound/')}}">add new round</a>
@endsection
