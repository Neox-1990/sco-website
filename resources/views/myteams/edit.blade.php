@extends('master.master')

@section('main')
  <script type="text/javascript">
    var selOption = {{$team['number']}}
    var numbers = <?php echo json_encode($numbers); ?>;
  </script>
<div class="row">
  <div class="col-12" style="padding-bottom:2rem;">
    @if ($legit)
      <h1>Edit Team</h1>
      @if ($driverChangeLimit)
        <div class="bg-danger p-3 rounded text-light">
          <strong>Warning:</strong> The driverlineup is fixed between 24 h before
          the first practice and the end of the race. If you add another driver,
          he is not allowed to drive in the race. If he drives in the race, the
          team receives a 30 second stop and go penalty.
        </div>
      @endif
      @include('master.formerrors')
      <p><i class="fas fa-question-circle" data-toggle="popover" data-content="If you want to update your teams basedata, please contact the admins" data-trigger="hover"></i></p>
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
          <td>Status</td>
          <td>
            <p class="text-{{config('constants.status_colors')[$team['status']]}}">{{config('constants.status_names')[$team['status']]}}</p>
          </td>
        </tr>
      </table>

      <h2>Drivers</h2>
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
      <form id="newDriverForm" class="" action="{{url('/myteams/edit/'.$team->id)}}" method="post">
        {{csrf_field()}}
        <div class="form-group">
          <label for="drivername">Name</label>
          <input class="form-control" type="text" name="driver[name]" id="drivername" value="{{old('driver.name')}}" placeholder="Name of Driver" {{$driverLimitReached?'disabled':''}}>
        </div>
        <div class="form-group">
          <label for="driveriracingid">iRacing ID</label><button class="btn btn-sm btn-outline-secondary my-1 ml-3" type="button" id="newLoadingIR">Load driverdata from iracing
          <i class="ml-3 far fa-question-circle" data-toggle="tooltip" data-placement="top" title="loads driver name, irating and safety rating directly from iracing, using the provided iracing driver id"></i></button>
          <input class="form-control" type="text" name="driver[iracingid]" id="driveriracingid" value="{{old('driver.iracingid')}}" placeholder="iRacing ID of Driver" {{$driverLimitReached?'disabled':''}}>
        </div>
        <div class="form-group">
          <label for="driverirating">iRating</label>
          <input class="form-control" type="number" min="2000" max="12000" step="1" value="{{old('driver.ir',2000)}}" name="driver[ir]" id="driverirating" {{$driverLimitReached?'disabled':''}}>
        </div>
        <div class="form-group">
          <label for="driversr1">License & SR</label>
          <div class="form-group input-group">
            <select class="form-control" name="driver[sr1]" id="driversr1" title="License" {{$driverLimitReached?'disabled':''}}>
              <option value="c" {{old('driver.sr1') == 'c' ? 'selected' : ''}}>C</option>
              <option value="b" {{old('driver.sr1') == 'b' ? 'selected' : ''}}>B</option>
              <option value="a" {{old('driver.sr1') == 'a' ? 'selected' : ''}}>A</option>
              <option value="p" {{old('driver.sr1') == 'p' ? 'selected' : ''}}>P</option>
            </select>
            <span class="input-group-addon">@</span>
            <input class="form-control" type="number" min="0.00" max="5.00" step="0.01" value="{{old('driver.sr2',3.00)}}" name="driver[sr2]" id="driversr2" title="Safetyrating" {{$driverLimitReached?'disabled':''}}>
          </div>
        </div>
        <div class="form-group">
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
