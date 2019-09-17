@extends('admin.master.master')

@section('content')
  <h1>Toolbox</h1>
  <hr>

  <section class="w-100" id="adminsettings">
    <ul class="list-group">
      <li class="list-group-item">
        <a class="btn btn-primary btn-block" href="{{url('admin/tools/pq')}}">Pre Qualifying</a>
      </li>
    </ul>
  </section>

@endsection
