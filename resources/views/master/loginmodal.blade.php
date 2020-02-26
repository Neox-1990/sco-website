<div class="modal fade" id="loginmodal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="loginmodaltitle">Login</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body px-3">

        <div id="loginmodal_login">
          <form class="sco-forms d-flex flex-column justify-content-between align-items-stretch" action="{{url('/login')}}" method="post">
            @csrf
            <div class="mt-3 d-flex flex-column justify-content-between align-items-stretch">
              <input type="email" name="email" value="" required>
              <label>Email</label>
            </div>

            <div class="d-flex flex-column justify-content-between align-items-stretch">
              <input type="password" name="password" value="" required>
              <label>Password</label>
            </div>

            <div class="d-flex flex-row justify-content-center align-items-center">
              <input type="checkbox" id="rememberme" name="rememberme" value="yes">
              <label for="rememberme" class="ml-3"><abbr title="stay logged in on this device">Remember me</abbr></label>
            </div>

            <div class="mt-4">
              <input class="btn btn-success btn-block btn-lg" type="submit" name="login" value="Login">
            </div>


          </form>
          <div class="mt-2">
            <button class="btn btn-primary btn-block btn-lg" id="loginmodal_toggle">Register?</button>
          </div>
        </div>

        <div id="loginmodal_register" class="d-none">
          <form class="sco-forms d-flex flex-column justify-content-between align-items-stretch" action="{{url('/register')}}" method="post">
            @csrf
            <div class="mt-3 d-flex flex-column justify-content-between align-items-stretch">
              <input type="text" name="name" value="" required>
              <label>Name</label>
            </div>

            <div class="d-flex flex-column justify-content-between align-items-stretch">
              <input type="email" name="email" value="" required>
              <label>Email</label>
            </div>

            <div class="d-flex flex-column justify-content-between align-items-stretch">
              <input type="password" name="password" value="" required>
              <label>Password</label>
            </div>

            <div class="d-flex flex-column justify-content-between align-items-stretch">
              <input type="password" name="password_confirmation" value="" required>
              <label>Repeat Password</label>
            </div>

            <div class="mt-0">
              <input class="btn btn-success btn-block btn-lg" type="submit" name="register" value="Register">
            </div>

          </form>
          <div class="mt-2">
            <button class="btn btn-primary btn-block btn-lg" id="loginmodal_toggle">Login?</button>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
