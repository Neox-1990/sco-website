<!DOCTYPE html>
<html lang="en">
  <head>
    @include('master.head')
    @yield('additionalHeader')
  </head>
  <body class="d-flex flex-column">
    @include('master.flash')
    @include('master.loginmodal')
    @include('master.newnav')
    <div class="container-fluid px-0 mb-3 header-container">
      @include('master.header')
    </div>

    <div class="container p-0 mb-5">
      <main class="ml-5 ml-sm-0">
        @yield('main')
      </main>
    </div>
    <div class="container-fluid px-0 footer-container mt-auto align-self-end">
      @include('master.footer')
    </div>
      @yield('additionalFooter')
      @include('master.afterFooter')
  </body>
</html>
