@extends('master.master')

@section('main')
<div class="row">
  <div class="col-12" style="padding-bottom:2rem;">
    @if ($legit)
      <h1>Delete Team</h1>
      @include('master.formerrors')
      <form class="" action="{{url('/myteams/delete/'.$team->id)}}" method="post">
        <h2>Are you sure you want to delete {{$team->name}} for this season?</h2>
        {{csrf_field()}}

        <div class="form-group">
          <a class="btn btn-primary" href="{{ url('/myteams/') }}">No</a>
          <input type="submit" name="delete" value="Yes" class="btn btn-primary">
        </div>

      </form>
    @else
      <h1>You are not the manager of {{$team->name}}</h1>
      <p>Please play nice!</p>
    @endif
  </div>
</div>
@endsection
