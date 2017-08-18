<nav class="navbar navbar-toggleable-sm navbar-inverse sticky-top bg-inverse">
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand text-uppercase" href="{{url('/')}}"><img src="{{asset('img/SCO2K17_LOGO.png')}}" alt="" id="navbar-brand-scologo">Home</a>
      <div class="collapse navbar-collapse justify-content-around" id="navbarNav">
            <a class="nav-link text-uppercase sco-nav-link" href="{{url('/season')}}">Schedule & Results</a>
            <a class="nav-link text-uppercase sco-nav-link" href="{{url('/rules')}}">Rules</a>
            <a class="nav-link text-uppercase sco-nav-link" href="{{url('teams')}}">Teams</a>
          @if (auth()->check())
              <a class="nav-link text-uppercase sco-nav-link" href="{{url('myteams')}}">My Teams</a>
          @endif
      </div>
    </nav>
