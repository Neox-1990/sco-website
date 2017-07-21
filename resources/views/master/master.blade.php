<!DOCTYPE html>
<html lang="en">
  <head>
    @include('master.head')
    @yield('additionalHeader')
  </head>
  <body>
    <div class="container">
      @include('master.header')
      @include('master.nav')

      <main>
        @yield('main')
      </main>

      @include('master.footer')
      @yield('additionalFooter')
      @include('master.afterFooter')
    </div>
  </body>
</html>
