<nav class="navbar navbar-toggleable-sm navbar-inverse sticky-top bg-inverse">
  <button class="navbar-toggler navbar-toggler-left" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="navbar-brand hidden-md-up">&nbsp;</div>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav" id="nav-list">
      <li class="nav-item"><a class="nav-link text-uppercase sco-nav-link" href="{{url('/')}}">Home</a></li>
      <li class="nav-item"><a class="nav-link text-uppercase sco-nav-link" href="{{url('/season')}}">Schedule</a></li>
      <li class="nav-item"><a class="nav-link text-uppercase sco-nav-link" href="{{url('/results')}}"><span class="hidden-md-only">Standings & </span>Results</a></li>
      <li class="nav-item"><a class="nav-link text-uppercase sco-nav-link" href="{{url('/rules')}}">Rules</a></li>
      <li class="nav-item"><a class="nav-link text-uppercase sco-nav-link" href="{{url('teams')}}">Teams</a></li>
        @if (auth()->check())
          <li class="nav-item"><a class="nav-link text-uppercase sco-nav-link" href="{{url('myteams')}}">My Teams</a></li>
        @endif
    </ul>
  </div>
</nav>
