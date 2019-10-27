<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Signupsite for Sports Car Open, an iRacing endurance raceseries by CoRe Simracing">
    <meta name="keywords" content="CoRe, Simracing, iRacing, Sports Car Open, endurance, race">
    <meta name="author" content="Ronald Großmann">
    <link rel="shortcut icon" href="/favicon.ico">
    <link rel="icon" type="image/png" href="/favicon_ico.png" sizes="32x32">
    <link rel="apple-touch-icon" sizes="180x180" href="/favicon_apple.png">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/favicon_ms.png">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Sports Car Open</title>

    <link rel="stylesheet" href="{{asset('css/spotterguide.css')}}?date=20191020">
    <link rel="stylesheet" href="{{asset('css/flags/css/flag-icon.min.css')}}">
  </head>
  <body>
    <div class="container-fluid">
    @foreach($teamlist as $class => $teams)
      <h1 class="class-{{$class.config('constants.current_season')}} rounded-pill">{{$class}}</h1>
      <div class="row d-flex flex-row flex-wrap align-items-stretch spotterguide-tile">
      @foreach($teams as $team)
        <div class="col-12 col-md-6 col-xl-4 p-1">
          <div class="card h-100">
            <img src="{{asset('assets/spotterguide/'.$team['ir_teamid'].'.png')}}" class="card-img-top car-image car-man-{{$team->car}}">
            <div class="p-1 px-2 car-info d-flex flex-wrap justify-content-between">
              <p class="my-0 w-100"><b>{{$team->name}}</b></p>
              <p class="my-0">{{config('constants.car_names')[$team->car]}}</p>
            </div>
            <div class="info-box d-flex flex-row flex-nowrap align-items-stretch">
              <div class="team-number d-flex justify-content-center align-items-center class-{{$class.config('constants.current_season')}}">
                <span class="text-center p-0">{{$team->number}}</span>
              </div>
              <div class="team-drivers align-self-start">
              @foreach($team->drivers as $driver)
                <p class="my-0"><span class="flag flag-icon flag-icon-{{strtolower($driver->location)}} mr-2"></span>{{$driver->name}}</p>
              @endforeach
              </div>
            </div>
          </div>
        </div>
      @endforeach
      </div>
    @endforeach
    </div>
  </body>
</html>
