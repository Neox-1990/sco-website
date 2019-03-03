@extends('master.master')

@section('main')

<div class="row mx-0 d-flex align-items-stretch">
  <div class="col-12 col-lg-9 px-0 px-md-3" id="facebookfeed">
    @foreach ($feedData as $feedElement)
      <div class="jumbotron facebook-feed-element">
        <div class="facebook-feed-element-header">
          <a href="https://www.facebook.com/{{$feedElement['id']}}" class="mr-3">Posted on <i class="fab fa-facebook" aria-hidden="true"></i></a>
          <span class="facebook-feed-element-date">{{(new Carbon\Carbon($feedElement['created_time']))->format('jS F Y - H:i:s')}}</span>
          @if (array_key_exists('link',$feedElement))
            <a class="btn btn-outline-primary btn-sm ml-5" href="{{$feedElement['link']}}">Link</a>
          @endif
        </div>
        <hr>
        <div class="facebook-feed-element-body">
          <p>{!!preg_replace('~(?:(https?)://([^\s<]+)|(www\.[^\s<]+?\.[^\s<]+))(?<![\.,:])~i', '<a href="$0" target="_blank" title="$0">$0</a>', $feedElement['message'])!!}</p>
        </div>
        @if (array_key_exists('full_picture',$feedElement))
          <div class="facebook-feed-element-picture">
            <img src="{{$feedElement['full_picture']}}" alt="">
          </div>
        @endif
      </div>
    @endforeach
  </div>
  <aside class="col-lg-3 d-flex flex-column align-items-start align-items-stretch px-0 px-md-3">
    @if (app('request')->has('useless'))
      @include('master.useless')
    @endif
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
    <div class="card mt-3">
      <div class="card-body">
        <a href="https://www.coresimracing.com/"><img src="{{asset('img/core2k19_mainlogo_black-1024x330.png')}}" alt="" class="img-fluid"></a>
        <hr>
        <a href="http://racespot.tv/"><img src="{{asset('img/racespot-logo.png')}}" alt="" class="img-fluid"></a>
        <hr>
        <a href="https://discord.gg/ShfkyTe"><img src="{{asset('img/discord.png')}}" alt="" class="img-fluid"></a>
      </div>
    </div>
    <div id="twitter-module" class="mt-3">
      <a class="twitter-timeline" href="{{$sco_settings['twitteraccount']}}">Tweets by Sports Car Open</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
    </div>
  </aside>
</div>

@endsection
