<nav class="navbar navbar-expand-lg navbar-dark sticky-top bg-sco-dark">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <!--<div class="navbar-brand hidden-lg-up">&nbsp;</div>-->
  <div class="collapse navbar-collapse" id="navbarToggler">
    <ul class="navbar-nav d-lg-flex " id="nav-list">
      <li class="nav-item flex-fill text-lg-center"><a class="nav-link text-uppercase sco-nav-link p-2 rounded" href="{{url('/season')}}">Schedule</a></li>
      <li class="nav-item flex-fill text-lg-center"><a class="nav-link text-uppercase sco-nav-link p-2 rounded" href="{{url('/results')}}">Standings & Results</a></li>
      <li class="nav-item flex-fill text-lg-center"><a class="nav-link text-uppercase sco-nav-link p-2 rounded" href="{{url('/rules')}}">Rules</a></li>
      <li class="nav-item flex-fill text-lg-center"><a class="nav-link text-uppercase sco-nav-link p-2 rounded" href="{{url('/teams')}}">Teams</a></li>
        @if (auth()->check())
          <li class="nav-item flex-fill text-lg-center"><a class="nav-link text-uppercase sco-nav-link p-2 rounded" href="{{url('/myteams')}}">My Teams</a></li>
        @endif
      <li class="nav-item flex-fill text-lg-center"><a class="nav-link text-uppercase sco-nav-link p-2 rounded" href="{{url('/archive')}}">Archive</a></li>
    </ul>
  </div>
</nav>
