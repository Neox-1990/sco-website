<div id="sco-user-bar" class="d-flex justify-content-start p-1">
  @if(auth()->check())
    <div class="dropdown">
      <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-users-cog mr-md-3"></i><span class="d-none d-md-inline">{{auth()->user()->name}}</span>
      </button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="{{url('/user')}}"><i class="fas fa-cog mr-3" aria-hidden="true"></i>Settings</a>
      </div>
    </div>
    @if(auth()->user()->isAdmin)
      <a class="btn btn-outline-info ml-3" href="{{url('admin/')}}"><i class="fas fa-user-circle mr-3"></i>Admin</a>
    @endif
    <div class="form-inline ml-auto">
      <form class="" action="{{url('logout')}}" method="post">
        {{csrf_field()}}
        <button class="btn btn-danger" type="submit" name="button">Logout<i class="fas fa-sign-out-alt ml-3"></i></button>
      </form>
    </div>
  @else
    <div class="d-flex justify-content-between w-100 flex-wrap">
      <form class="flex-grow-1 order-1 order-lg-0 mr-lg-5 pr-lg-5" action="/login" method="post">
        {{csrf_field()}}
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Email" name="email">
          <input type="password" class="form-control" placeholder="Password" name="password" value="">
          <div class="input-group-append">
            <button type="submit" class="form-control btn btn-success" name="login" value="Login">Login<i class="fas fa-sign-in-alt ml-3"></i></button>
          </div>
        </div>
      </form>
      <a class="btn btn-danger mr-auto ml-lg-5 order-0 order-lg-1 mb-1 mb-lg-0" href="{{url('/register')}}">Register<i class="fas fa-user-plus ml-3"></i></a>
    </div>
  @endif
</div>
