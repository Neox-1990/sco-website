@extends('admin.master.master')

@section('content')
  <h1>Briefing</h1>
  <hr>
  <form class="" action="{{url('admin/briefing')}}" method="post">
    {{ csrf_field() }}
    <div class="form-group">
      <label for="mail_subject">Subject</label>
      <input id="mail_subject" class="form-control" type="text" name="mail_subject" required>
    </div>
    <div class="form-group">
      <input id="mail_salutation" class="form-control" type="text" name="mail_salutation" value="Dear Team Managers,">
      <textarea id="mail_text" name="mail_text" rows="8" cols="80"></textarea>
    </div>
    <div class="form-group">
      <label for="mail_link">Link</label>
      <input id="mail_link" class="form-control" type="text" name="mail_link">
    </div>
    <div class="form-group">
      <textarea name="mail_farewell" id="mail_farewell" rows="2" cols="80">Regards,
Your SCO Administration</textarea>
    </div>
    <div class="form-group">
      <input class="btn btn-primary" type="submit" name="editdriver" value="Send">
    </div>
  </form>
@endsection
