<div id="sco-user-bar" class="col-12 d-flex justify-content-start p-1">
  @if(auth()->check())
    <div class="dropdown">
      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        {{auth()->user()->name}}
      </button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="{{url('/user/edit')}}">Settings</a>
      </div>
    </div>
    <div class="form-inline ml-auto">
      <form class="" action="{{url('logout')}}" method="post">
        {{csrf_field()}}
        <button class="btn btn-danger" type="submit" name="button">Logout</button>
      </form>
    </div>
  @else
    <div class="form-inline">
      <form class="" action="/login" method="post">
      {{csrf_field()}}
      <input type="text" class="form-control" placeholder="Email" name="email">
      <input type="password" class="form-control" placeholder="Password" name="password" value="">
      <input type="submit" class="form-control btn btn-success" name="login" value="Login">
      </form>
    </div>
    <div class="form-inline ml-auto">
      <a class="btn btn-danger" href="{{url('/register')}}">Register</a>
    </div>
  @endif
</div>
