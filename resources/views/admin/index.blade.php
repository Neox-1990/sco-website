@extends('admin.master.master')
<?php
use Carbon\Carbon;

?>
@section('content')
  <h1>Dashbord</h1>
  <hr>
  <div class="card dashbord-modul">
    <div class="card-header">
      <h3><a href="{{url('/admin/teams')}}">Teams</a></h3>
    </div>
    <div class="card-body">
      <table class="table">
        <tr>
          <th>class</th>
          <th>pending</th>
          <th>waitinglist</th>
          <th>confirmed</th>
        </tr>
        @foreach ($teams as $name => $list)
          <tr>
            <td>{{$name}}</td>
            <td>{{$list['pending']->count()}}</td>
            <td>{{$list['waitinglist']->count()}}</td>
            <td>{{$list['confirmed']->count()}}</td>
          </tr>
        @endforeach
      </table>
    </div>
  </div>
  <div class="card dashbord-modul">
    <div class="card-header">
      <h3><a href="{{url('/admin/log')}}">Actionlog</a></h3>
    </div>
    <div class="card-body dashbord-log-table">
      <table class="table table-bordered">
        @foreach ($log as $entry)
          <tr>
            <td>{{$entry['created_at']->format('d.m.Y-H:i')}}</td>
            <td><a href="{{url('/admin/manager/'.$entry['user']['id'])}}">{{$entry['user']['name']}}</a></td>
            <td>{{$entry->title}}</td>
          </tr>
        @endforeach
      </table>
    </div>
  </div>
@endsection
