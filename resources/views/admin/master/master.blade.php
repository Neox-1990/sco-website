<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>SCO Admin Dashbord</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
  </head>
  <body id="admin-dashbord">
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
    <script type="text/javascript" src="{{asset('/js/app.js')}}"></script>
  </body>
</html>
