<!DOCTYPE html>
<html lang="en">
  <head>
    @include('master.head')
  </head>
  <body>
    <div class="w-100 d-flex justify-content-center align-items-center" style="height: 100vh; background-image:url('{{asset('img/crash404.jpg')}}'); background-position: center center; background-size: cover;">
      <div class="card m-3" style="opacity:0.9;">
        <div class="card-header">
          <h2 class="card-title text-center text-primary">Whoops, something went wrong</h2>
        </div>
        <div class="card-body">
          <p class="text-center">The page you were looking for doesn't exist.</p>
          <p class="text-center">If you keep getting this error, feel free to contact us: <a href="mailto:info@sportscaropen.eu">info@sportscaropen.eu</a></p>
        </div>
      </div>
    </div>
  </body>
</html>
