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
          <th>reviewed</th>
          <th>reserve</th>
          <th>qualified</th>
          <th>confirmed</th>
          <th>max</th>
        </tr>
        @foreach ($teams as $name => $list)
          <tr>
            <td>{{$name}}</td>
            <td>{{$list['pending']->count()}}</td>
            <td>{{$list['reviewed']->count()}}</td>
            <td>{{$list['waitinglist']->count()}}</td>
            <td>{{$list['qualified']->count()}}</td>
            <td>{{$list['confirmed']->count()}}</td>
            <td>{{config('constants.class_limits')[config('constants.current_season')][$name]}}</td>
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
