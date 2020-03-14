@extends('master.master')

@section('main')
<div class="row mx-0 w-100">
  <a href="{{'https://'}}"></a>
  <div class="col-12 px-0">
    <section id="news" class="sco-news-carousel carousel slide border">
      <h1 class="news-header">News</h1>
      <a class="all-news-link" href="{{url('/news')}}"><i class="far fa-newspaper"></i> All News</a>
      <ol class="carousel-indicators">
        @foreach($news as $i => $n)
        <li data-target="#news" data-slide-to="{{$i}}" {{$i==0 ? 'class="active"' : ''}}></li>
        @endforeach
      </ol>
      <div class="carousel-inner">
        @foreach($news as $i => $n)
        <a href="{{url('/news/'.$n->id)}}" class="stretched-link carousel-item {{$i==0 ? 'active' : ''}}">
          <img src="{{$i==0 ? $n->image : asset('img/placeholder16x9.svg')}}" data-imgsrc="{{$n->image}}" class="d-block w-100" alt="">
          <div class="carousel-caption d-none d-md-block">
            <h2>{{$n->title}}</h2>
            <p>{{$n->teaser}}</p>
          </div>
        </a>
        @endforeach
      </div>
      <a class="carousel-control-prev" href="#news" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#news" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>

    </section>
  </div>
  <aside class="col-12 px-0 mt-3">
    <div class="card sco-status mt-3 mt-lg-0">
      <div class="card-header text-center">
        <h3>Season Status</h3>
      </div>
      <div class="card-body">
        @if ($season['curent']!==null)
          <p class="text-center"><strong>Current:</strong><br><a href="{{url('/rounds/'.$roundid)}}">{{$season['curent']}}</a></p>
          <hr>
        @endif
        @if ($roundid != null)
          <p class="text-center"><strong>Next:</strong><br><a href="{{url('/rounds/'.$roundid)}}">{{$season['next']['session']}}</a><br><small class="text-muted font-italic">in {{$season['next']['time']}}</small></p>
        @else
          <p class="text-center"><strong>Season over</strong></p>
        @endif

        @if($showPassword)
          <hr>
          <p class="text-center"><strong>pw:</strong> '{{$sco_settings['session_password']}}'</p>
        @endif
      </div>
    </div>
    <!--<div class="card mt-3">
      <div class="card-body">
        <a href="https://www.coresimracing.com/"><img src="{{asset('img/core2k19_mainlogo_black-1024x330.png')}}" alt="" class="img-fluid"></a>
        <hr>
        <a href="http://racespot.tv/"><img src="{{asset('img/racespot-logo.png')}}" alt="" class="img-fluid"></a>
        <hr>
        <a href="https://discord.gg/ShfkyTe"><img src="{{asset('img/discord.png')}}" alt="" class="img-fluid"></a>
      </div>
    </div>-->
    <!--<div id="twitter-module" class="mt-3">
      <a class="twitter-timeline" href="{{$sco_settings['twitteraccount']}}">Tweets by Sports Car Open</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
    </div>-->
  </aside>
</div>

@endsection
