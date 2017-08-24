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
    <div class="card-block">
      <table class="table">
        <tr>
          <th>class</th>
          <th>pending</th>
          <th>waitinglist</th>
          <th>confirmed</th>
        </tr>
        <tr>
          <td>P</td>
          <td>{{$teams['P']['pending']->count()}}</td>
          <td>{{$teams['P']['waitinglist']->count()}}</td>
          <td>{{$teams['P']['confirmed']->count()}}</td>
        </tr>
        <tr>
          <td>GT</td>
          <td>{{$teams['GT']['pending']->count()}}</td>
          <td>{{$teams['GT']['waitinglist']->count()}}</td>
          <td>{{$teams['GT']['confirmed']->count()}}</td>
        </tr>
        <tr>
          <td>GTC</td>
          <td>{{$teams['GTC']['pending']->count()}}</td>
          <td>{{$teams['GTC']['waitinglist']->count()}}</td>
          <td>{{$teams['GTC']['confirmed']->count()}}</td>
        </tr>
      </table>
    </div>
  </div>
  <div class="card dashbord-modul">
    <div class="card-header">
      <h3><a href="{{url('/admin/log')}}">Actionlog</a></h3>
    </div>
    <div class="card-block dashbord-log-table">
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
