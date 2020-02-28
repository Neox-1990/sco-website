<!DOCTYPE html>
<html lang="en">
  <head>
    @include('master.head')
    @yield('additionalHeader')
  </head>
  <body>
    @include('master.flash')
    @include('master.loginmodal')
    @include('master.newnav')
    <div class="container-fluid px-0">
      @include('master.header')
    </div>

    <div class="container p-0">
      <main class="ml-5">
        @yield('main')
      </main>

      @include('master.footer')
      @yield('additionalFooter')
      @include('master.afterFooter')
    </div>
  </body>
</html>
