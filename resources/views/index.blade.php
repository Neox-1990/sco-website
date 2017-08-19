@extends('master.master')

@section('main')

<div class="row">
  <div class="col-lg-9 col-sm-12" id="facebookfeed">
    @foreach ($feedData as $feedElement)
      <div class="jumbotron facebook-feed-element">
        <div class="facebook-feed-element-header">
          <a href="https://www.facebook.com/{{$feedElement['id']}}" class="mr-3">Posted on <i class="fa fa-facebook-official" aria-hidden="true"></i></a>
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
  <aside class="col-lg-3 col-sm-12">
    <div class="card mb-3">
      <div class="card-header text-center">
        <h3>Season Status</h3>
      </div>
      <div class="card-block">
        @if ($season['curent']!==null)
          <p class="text-center"><strong>Current:</strong><br>{{$season['curent']}}</p>
          <hr>
        @endif
        <p class="text-center"><strong>Next:</strong><br>{{$season['next']['session']}}<br><small class="text-muted font-italic">in {{$season['next']['time']}}</small></p>
      </div>
    </div>
    <div id="twitter-module">
      <a class="twitter-timeline" href="https://twitter.com/CoReSimRacing">Tweets by CoReSimRacing</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
    </div>
    <div class="card mt-3">
      <div class="card-block">
        <h4 class="card-title">We thank our Sponsors</h4>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">We</li>
          <li class="list-group-item">need</li>
          <li class="list-group-item">sponsors</li>
          <li class="list-group-item">please</li>
        </ul>
      </div>
    </div>
    <div class="card mt-3">
      <div class="card-block">
        <h4>Please Support us</h4>
        <p>We need all your monies</p>
        <button class="btn btn-primary" type="button" name="button">€ Donate $</button>
      </div>
    </div>
  </aside>
</div>

@endsection
