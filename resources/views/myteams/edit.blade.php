@extends('master.master')

@section('main')
  <script type="text/javascript">
    var selOption = {{$team['number']}}
    var numbers = <?php echo json_encode($numbers); ?>;
  </script>
<div class="row mx-0">
  <div class="col-12" style="padding-bottom:2rem;">
    @if ($legit)
      <h1>Edit Team</h1>
      @if ($driverChangeLimit)
        <div class="bg-danger p-3 rounded text-light">
          <strong>Warning:</strong> The driverlineup is fixed between 24 h before
          the first practice and the end of the race. If you add another driver,
          he is not allowed to drive in the race. If he drives in the race, the
          team receives a 60 second stop and go penalty.
        </div>
      @endif
      @include('master.formerrors')
      <p><i class="fas fa-question-circle" data-toggle="popover" data-content="If you want to update your teams basedata, please contact the admins" data-trigger="hover"></i></p>
      <form class="sco-forms" action="{{url('/myteams/edit/'.$team->id)}}" method="post">
        {{csrf_field()}}
        <table class="table">
          <tr>
            <td>Name</td>
            <td>#{{$team['number']}} {{$team['name']}}</td>
          </tr>
          <tr>
            <td>Car</td>
            <td>{{config('constants.car_names')[$team['car']]}}</td>
          </tr>
          <tr>
            <td>iRacing Team ID</td>
            <td>{{$team['ir_teamid']}}</td>
          </tr>
          <tr>
            <td>Website</td>
            <td>
              <div class="mt-3 d-flex flex-column justify-content-between align-items-stretch">
                <input type="text" id="website" name="website" value="{{old('website', $team['website'])}}">
                <label for="website">Website</label>
              </div>
            </td>
          </tr>
          <tr>
            <td>Twitter</td>
            <td>
              <div class="mt-3 d-flex flex-column justify-content-between align-items-stretch">
                <input type="text" id="twitter" name="twitter" value="{{old('twitter', $team['twitter'])}}">
                <label for="twitter">Twitter</label>
              </div>
            </td>
          </tr>
          <tr>
            <td>Facebook</td>
            <td>
              <div class="mt-3 d-flex flex-column justify-content-between align-items-stretch">
                <input type="text" id="facebook" name="facebook" value="{{old('facebook', $team['facebook'])}}">
                <label for="facebook">Facebook</label>
              </div>
            </td>
          </tr>
          <tr>
            <td>Instagram</td>
            <td>
              <div class="mt-3 d-flex flex-column justify-content-between align-items-stretch">
                <input type="text" id="instagram" name="instagram" value="{{old('instagram', $team['instagram'])}}">
                <label for="instagram">Instagram</label>
              </div>
            </td>
          </tr>
          <tr>
            <td>Status</td>
            <td>
              <p class="text-{{config('constants.status_colors')[$team['status']]}}">{{config('constants.status_names')[$team['status']]}}</p>
            </td>
          </tr>
        </table>
        <div class="form-group pb-5">
          <input type="submit" name="updateTeamdata" value="Update Team Info" class="btn btn-primary">
        </div>
      </form>

      <h2 class="mt-5">Drivers</h2>
      <table class="table">
        <tr>
          <th>Name</th>
          <th>SR</th>
          <th>IR</th>
          <th></th>
        </tr>
        @foreach ($team->drivers()->get() as $driver)
          <tr>
            <td><a href="http://members.iracing.com/membersite/member/CareerStats.do?custid={{$driver->iracing_id}}" target="_blank">{{$driver->name}}</a></td>
            <td>{{strtoupper($driver->safetyrating)}}</td>
            <td>{{$driver->irating}}</td>
            <td><form class="" action="{{url('/myteams/edit/'.$team->id)}}" method="post">
              {{csrf_field()}}
              <input type="hidden" name="driverID" value="{{$driver->id}}">
              <input type="submit" name="removeDriver" value="remove" class="btn btn-danger">
            </form></td>
          </tr>
        @endforeach
      </table>
      <h2>Add new Driver</h2>
      <div class="col-lg-6 col-sm-12">
      <form id="newDriverForm" class="sco-forms" action="{{url('/myteams/edit/'.$team->id)}}" method="post">
        {{csrf_field()}}
        <div class="mt-3 d-flex flex-column justify-content-between align-items-stretch">
          <input class="iracingid" type="text" name="driver[iracingid]" id="driveriracingid" value="{{old('driver.iracingid')}}" {{$driverLimitReached?'disabled':''}}>
          <label for="driveriracingid">iRacing Id</label>
        </div>
        <div class="driver-signup-details">
          <div class="loader d-none">
            <i class="fas fa-spinner fa-pulse"></i>
          </div>
          <table>
            <tr>
              <th scope="row">Name</th>
              <td data-ir-field="name"></td>
            </tr>
            <tr>
              <th scope="row">iRating</th>
              <td data-ir-field="irating"></td>
            </tr>
            <tr>
              <th scope="row">Licence</th>
              <td data-ir-field="licence"></td>
            </tr>
          </table>
        </div>
        <div class="form-group mt-3">
          <input type="submit" name="addDriver" value="Add Driver" class="btn btn-primary" {{$driverLimitReached?'disabled':''}}>
        </div>
      </form>
    </div>
    @else
      <div class="bg-danger text-white col-12">
        <h1>Error</h1>
        <p>You tried to edit a team of which you are not the manager off or a team of a past season.</p>
      </div>
    @endif
  </div>
</div>
@endsection
@section('additionalFooter')
  <script>
  $(function () {
    $('[data-toggle="popover"]').popover()
  })
  </script>
@endsection
