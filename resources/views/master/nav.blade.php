<nav class="navbar navbar-toggleable-sm navbar-inverse sticky-top bg-inverse">
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="{{url('/')}}"><img src="{{asset('img/SCO2K17_LOGO.png')}}" alt="" id="navbar-brand-scologo"></a>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="#">Schedule & Results</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Rules</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Teams</a>
          </li>
          @if (Auth::guest())
            <li class="nav-item">
              <a class="nav-link" href="{{url('login')}}">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('register')}}">Register</a>
            </li>
          @else
            <li class="nav-item">
              <a class="nav-link" href="{{url('myteams')}}">My Teams</a>
            </li>
            <li class="nav-item">
              <form class="" action="{{url('logout')}}" method="post">
                {{csrf_field()}}
                <button class="btn btn-secondary" type="submit" name="button">Logout</button>
              </form>
            </li>
          @endif
        </ul>
      </div>
    </nav>
