@extends('admin.master.master')

@section('content')
  <h1>Settings</h1>
  <hr>
  <div class="card dashbord-modul">
    <div class="card-header">
      <h3>Registration</h3>
    </div>
    <div class="card-block">
      <form class="" action="{{url('admin/settings')}}" method="post">
        {{csrf_field()}}
        <div class="form-group">
          <div class="form-check">
            <label class="form-check-label">
              <input type="radio" class="form-check-input" name="registration" id="registration1" value="open" {{$setup['registration']=='open'?'checked':''}}>
              Open
            </label>
          </div>
          <div class="form-check">
            <label class="form-check-label">
              <input type="radio" class="form-check-input" name="registration" id="registration2" value="closed" {{$setup['registration']=='closed'?'checked':''}}>
              Closed
            </label>
          </div>
        </div>
        <div class="form-group">
          <input class="btn btn-primary" type="submit" name="simpleSubmit" value="Set">
        </div>
      </form>
    </div>
  </div>
@endsection
