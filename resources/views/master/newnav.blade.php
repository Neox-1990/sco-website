<nav>
  <div id="toolbar">
    <button class="nav-toggler nav-toggler-closed"><i class="fas fa-bars"></i></button>
    <button data-shortcut="esc" title="Shortcut: esc" class="nav-toggler nav-toggler-open"><i class="far fa-window-close"></i></button>
    <a data-shortcut="0" title="Shortcut: alt+ctrl+0" href="{{url('/')}}"><i class="fas fa-home"></i></a>
    @if (auth()->check())
    <a href="#"><i class="fas fa-cog"></i></a>
    <button><i class="fas fa-sign-out-alt"></i></button>
      @if(auth()->user()->isAdmin)
      <a href="#"><i class="far fa-star"></i></a>
      @endif
    @else
    <button><i class="fas fa-sign-in-alt"></i></button>
    @endif
  </div>

  <div id="mainnav">

    <div class="nav-group">
      <div class="nav-group-title">
        <span>Season</span>
      </div>
      <div class="nav-group-links">
        <a data-shortcut="1" title="Shortcut: alt+ctrl+1" href="#"><i class="far fa-calendar-alt mr-3"></i>Schedule</a>
        <a data-shortcut="2" title="Shortcut: alt+ctrl+2" href="#"><i class="fas fa-poll-h mr-3"></i>Standings & Results</a>
        <a data-shortcut="3" title="Shortcut: alt+ctrl+3" href="#"><i class="fas fa-car mr-3"></i>Teams</a>
        @if (auth()->check())
        <a data-shortcut="4" title="Shortcut: alt+ctrl+4" href="#"><i class="fas fa-users mr-3"></i>My Teams</a>
        @endif
        <a data-shortcut="5" title="Shortcut: alt+ctrl+5" href="#"><i class="fas fa-book mr-3"></i>Rules</a>
      </div>
    </div>

    <div class="nav-group">
      <div class="nav-group-title">
        <span>Archive</span>
      </div>
      <div class="nav-group-links">
        <a data-shortcut="6" title="Shortcut: alt+ctrl+6" href="#"><i class="fas fa-history mr-3"></i>Past Seasons</a>
        <a data-shortcut="7" title="Shortcut: alt+ctrl+7" href="#"><i class="fas fa-trophy mr-3"></i>Hall Of Fame</a>
        <a data-shortcut="8" title="Shortcut: alt+ctrl+8" href="#"><i class="fas fa-chart-bar mr-3"></i>Statistics</a>
      </div>
    </div>

    <div class="nav-group">
      <div class="nav-group-title">
        <span>Misc</span>
      </div>
      <div class="nav-group-links">
        <a data-shortcut="9" title="Shortcut: alt+ctrl+9" href="#"><i class="fas fa-download mr-3"></i>Downloads</a>
        <a href="#"><i class="fas fa-question-circle mr-3"></i>About Us</a>
      </div>
    </div>

  </div>


</nav>
