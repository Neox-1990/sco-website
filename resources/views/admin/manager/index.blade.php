@extends('admin.master.master')

@section('content')
  <h1>Managerlist</h1>
  <table class="table table-bordered table-hover">
    <tr>
      <th>Edit</th>
      <th>created</th>
      <th>last edit</th>
      <th>id</th>
      <th>name</th>
      <th>email</th>
    </tr>
    @foreach ($users as $user)
      <tr>
        <td><a class="btn btn-primary" href="{{url('admin/manager/'.$user->id)}}">edit</a></td>
        <td>{{$user->created_at->format('d.m.Y H:i')}}</td>
        <td>{{$user->updated_at->format('d.m.Y H:i')}}</td>
        <td>{{$user->id}}</td>
        <td>{{$user->name}}</td>
        <td><a href="mailto:{{$user->email}}">{{$user->email}}</a></td>
      </tr>
    @endforeach
  </table>
@endsection
