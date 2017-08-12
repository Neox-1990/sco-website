@if ($flash = session('flash_message_success'))
  <div class="alert alert-success" id="flash_message">
    {{$flash}}
  </div>
@elseif ($flash = session('flash_message_alert'))
  <div class="alert alert-danger" id="flash_message">
    {{$flash}}
  </div>
@elseif (count($errors) > 0)
  <div class="alert alert-danger" id="flash_message">
    An error occurred
  </div>
@endif
