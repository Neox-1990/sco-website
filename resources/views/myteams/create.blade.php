@extends('master.master')

@section('main')
<div class="row">
  <div class="col-md-6 col-sm-12" style="padding-bottom:2rem;">
    <h1>Create New Team</h1>
    <form class="" action="{{url('/myteams/create')}}" method="post">
      <div class="form-group">
        <label for="teamname">Teamname</label>
        <input id="teamname" class="form-control" type="text" name="teamname" value="">
      </div>
      <div class="form-group">
        <label for="car">Car</label>
        <select id="car" class="form-control" name="car">
          @foreach (config('constants.car_names') as $key => $value)
            <option value="{{$key}}">{{$value}}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <label for="number">Number</label>
        <select id="number" class="form-control" name="number">
          @for ($i=1; $i < 100; $i++)
            <option value="{{$i}}">{{$i}}</option>
          @endfor
        </select>
      </div>
    </form>
  </div>
</div>
@endsection
