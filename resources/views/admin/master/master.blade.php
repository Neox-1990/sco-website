<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>SCO Admin Dashbord</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}?date=20180716">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <meta name="csrf-token" content="{{ csrf_token() }}">
  </head>
  <body id="admin-dashbord">
    <div class="admin-alert">
    </div>
    @include('master.flash')
    <div class="container-fluid">
      <div class="d-flex">
        <div class="p-2">
          @include('admin.master.nav')
        </div>
        <div class="p-2">
          @yield('content')
        </div>
      </div>
    </div>
    <script type="text/javascript" src="{{asset('/js/app.js')}}?date=20180716"></script>
  </body>
</html>
