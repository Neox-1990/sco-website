<!-- After Footer Area, may include some js -->
@if (app('request')->input('epic')=='epic')
  <audio src="{{asset('media/epicmusic.mp3')}}" autoplay controls style="position:fixed;top:0;left:0;">
  </audio>
@endif
