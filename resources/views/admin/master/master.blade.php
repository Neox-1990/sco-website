<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>SCO Admin Dashbord</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
  </head>
  <body id="admin-dashbord">
    <div class="container-fluid">
      <div class="row p-2">
        <div class="col-2">
          @include('admin.master.nav')
        </div>
        <div class="col-10 p-2">
          @yield('content')
        </div>
      </div>
    </div>
  </body>
</html>
