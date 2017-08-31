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
      @include('master.formerrors')
      @if ($team['status'] == 2)
        @if ($deadline)
          <form class="" action="{{url('/myteams/edit/'.$team->id)}}" method="post">
            {{csrf_field()}}
            <input type="hidden" name="teamname" value="{{$team['name']}}">
            <input type="hidden" name="teamnumber" value="{{$team['number']}}">
            <input type="hidden" name="iracing_teamid" value="{{$team['ir_teamid']}}">
        @endif
        <table class="table">
          <tr>
            <td>Name</td>
            <td>#{{$team['number']}} {{$team['name']}}</td>
          </tr>
          @if ($deadline)
            <tr>
              <td>Car</td>
              <td>
              <select id="car" class="form-control" name="teamcar" style="display: inline-block;width:auto;">
                @foreach ($classcars as $value)
                  <option value="{{$value}}" {{old('teamcar') !== null?(old('teamcar') == $value?'selected':''):($team['car'] == $value?'selected':'')}}>{{config('constants.car_names')[$value]}}</option>
                @endforeach
              </select></td>
            </tr>
          @else
            <tr>
              <td>Car</td>
              <td>{{config('constants.car_names')[$team['car']]}}</td>
            </tr>
          @endif
          <tr>
            <td>iRacing Team ID</td>
            <td>{{$team['ir_teamid']}}</td>
          </tr>
          <tr>
            <td>Status</td>
            <td>
              @if ($team['status'] == 0)
                <p class="text-danger">pending</p>
              @elseif ($team['status'] == 1)
                <p class="text-warning">on waitinglist</p>
              @else
                <p class="text-success">confirmed</p>
              @endif
            </td>
          </tr>
          @if ($deadline)
            <tr>
              <td colspan="2"><input type="submit" name="updateTeamdata" value="Update teamdata" class="btn btn-primary"></td>
            </tr>
          @endif
        </table>
        @if ($deadline)
        </form>
        @endif
      @else
        <form class="" action="{{url('/myteams/edit/'.$team->id)}}" method="post">
          {{csrf_field()}}
          <table class="table">
            <tr>
              <td>Name</td>
              <td>#
              <select id="number" class="form-control" name="teamnumber" style="display: inline-block;width:auto;">
                @for ($i=1; $i < 150; $i++)
                  <option value="{{$i}}" {{old('teamnumber')!==null?(old('teamnumber') == $i ? 'selected' : ''):($team['number'] == $i ? 'selected' : '')}}>{{$i}}</option>
                @endfor
              </select><input id="teamname" class="form-control" type="text" name="teamname" value="{{old('teamname')!==null?old('teamname'):$team->name}}" placeholder="Teamname" style="display: inline-block;width:auto;"></td>
            </tr>
            <tr>
              <td>Car</td>
              <td>
              <select id="car" class="form-control" name="teamcar" style="display: inline-block;width:auto;">
                @foreach (config('constants.car_names') as $key => $value)
                  <option value="{{$key}}" {{old('teamcar') !== null?(old('teamcar') == $key?'selected':''):($team['car'] == $key?'selected':'')}}>{{$value}}</option>
                @endforeach
              </select></td>
            </tr>
            <tr>
              <td>iRacing Team ID</td>
              <td><input type="text" id="ir_teamid" class="form-control" name="iracing_teamid" value="{{old('iracing_teamid')!==null?old('iracing_teamid'):$team->ir_teamid}}" placeholder="iRacing Team ID"></td>
            </tr>
            <tr>
              <td>Status</td>
              <td>
                @if ($team->status == 0)
                  <p class="text-danger">pending</p>
                @elseif ($team->status == 1)
                  <p class="text-warning">on waitinglist</p>
                @else
                  <p class="text-success">confirmed</p>
                @endif
              </td>
            </tr>
            <tr>
              <td colspan="2"><input type="submit" name="updateTeamdata" value="Update teamdata" class="btn btn-primary"></td>
            </tr>
          </table>
        </form>
      @endif

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
      <form class="" action="{{url('/myteams/edit/'.$team->id)}}" method="post">
        {{csrf_field()}}
        <div class="form-group">
          <label for="drivername">Name</label>
          <input class="form-control" type="text" name="driver[name]" id="drivername" value="{{old('driver.name')}}" placeholder="Name of Driver">
        </div>
        <div class="form-group">
          <label for="driveriracingid">iRacing ID</label>
          <input class="form-control" type="text" name="driver[iracingid]" id="driveriracingid" value="{{old('driver.iracingid')}}" placeholder="iRacing ID of Driver">
        </div>
        <div class="form-group">
          <label for="driverirating">iRating</label>
          <input class="form-control" type="number" min="2000" max="12000" step="1" value="{{old('driver.ir',2000)}}" name="driver[ir]" id="driverirating">
        </div>
        <div class="form-group">
          <label for="driversr1">License & SR</label>
          <div class="form-group input-group">
            <select class="form-control" name="driver[sr1]" id="driversr1" title="License">
              <option value="c" {{old('driver.sr1') == 'c' ? 'selected' : ''}}>C</option>
              <option value="b" {{old('driver.sr1') == 'b' ? 'selected' : ''}}>B</option>
              <option value="a" {{old('driver.sr1') == 'a' ? 'selected' : ''}}>A</option>
              <option value="p" {{old('driver.sr1') == 'p' ? 'selected' : ''}}>P</option>
            </select>
            <span class="input-group-addon">@</span>
            <input class="form-control" type="number" min="0.00" max="5.00" step="0.01" value="{{old('driver.sr2',3.00)}}" name="driver[sr2]" id="driversr2" title="Safetyrating">
          </div>
        </div>
        <div class="form-group">
          <input type="submit" name="addDriver" value="Add Driver" class="btn btn-primary">
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
