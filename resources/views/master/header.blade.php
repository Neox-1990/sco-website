
  @if ($sco_settings['show_youtube_header'])
    <div class="sco-videoheader">
      <img src="{{asset('img/16x9placeholder.png')}}" alt="">
      <iframe src="https://www.youtube.com/embed/{{$sco_settings['youtube_header_videoid']}}" frameborder="0" allowfullscreen></iframe>
    </div>
  @else
    <div class="sco-header">
      <a href="{{url('/')}}"><img src="{{asset('img/SCO2K18_Logo_Alternate.png')}}?date=20180716" alt=""></a>
    </div>
  @endif
