@extends('master.master')

@section('main')
<script type="text/javascript">
  var selOption = 0;
  var numbers = <?php echo json_encode($numbers); ?>
</script>
<div class="row">
  <div class="col-12" style="padding-bottom:2rem;">
    <h1>Create New Team</h1>
    @include('master.formerrors')
    <form class="" action="{{url('/myteams/create')}}" method="post">
      {{csrf_field()}}
      <div class="form-group">
        <label for="teamname">Teamname</label>
        <input id="teamname" class="form-control" type="text" name="teamname" value="{{old('teamname')}}" placeholder="Teamname">
      </div>
      <div class="form-group">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="yes" id="useinvite" name="useinvite" {{$has_invite?'':'disabled'}} {{!is_null(old('useinvite'))?'checked':''}}>
          <label class="form-check-label" for="useinvite">
            Use Invite<i class="fas fa-question-circle ml-3" data-container="body" data-toggle="popover" data-placement="top" data-content="You have {{auth()->user()->invites()->where('used', null)->count()}} invite(s) left" data-trigger="hover"></i>
          </label>
        </div>
      </div>
      <div class="form-group">
        <label for="car">Car</label>
        <select id="car" class="form-control" name="teamcar">
          @foreach (config('constants.classes')[config('constants.current_season')] as $class)
            @foreach ($class as $id)
              <option value="{{$id}}" {{old('teamcar') == $id?'selected':''}}>{{config('constants.car_names')[$id]}}</option>
            @endforeach
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <label for="number">Number</label>
        <select id="number" class="form-control" name="teamnumber">
          @for ($i=1; $i < 1000; $i++)
            <option value="{{$i}}" {{old('teamnumber') == $i ? 'selected' : ''}}>{{$i}}</option>
          @endfor
        </select>
      </div>
      <div class="form-group">
        <label for="ir_teamid">iRacing Team ID</label>
        <input type="text" id="ir_teamid" class="form-control" name="iracing_teamid" value="{{old('iracing_teamid')}}" placeholder="iRacing Team ID">
      </div>
      <hr>
      <div class="row" style="padding:1rem;">
        <div class="col-12">
          <p class="crs-ptr btn btn-outline-secondary" data-toggle="collapse" data-target="#addOld">Use drivers of former team?</p>
          <div id="addOld" class="form-inline collapse">
            <div class="input-group">
              <div class="input-group-prepend">
                <div class="input-group-text"><label for="old_team">Team</label></div>
              </div>
              <select id="old_team" class="form-control" name="old_team">
                <option value="0">Select old team</option>
                @foreach ($former_teams as $old_team)
                  <option value="{{$old_team['id']}}">{{$old_team['name']}} # {{$old_team['number']}} ({{$old_team['season']['name']}})</option>
                @endforeach
              </select>
              <div class="input-group-append">
                <button id="loadoldteam" type="button" name="button" class="btn btn-primary">Load</button>
              </div>
            </div>

          </div>
        </div>
        @for ($n=1; $n <= config('constants.driver_limits')['max']; $n++)
          <div class="col-lg-6 col-sm-12 mt-5 add-driver-form {{$n<=config('constants.driver_limits')['min']||old('driver'.$n.'.name')!==null||old('driver'.$n.'.iracingid')!==null?'add-driver-form-active add-driver-form-mandatory':''}}" data-driver="{{$n}}">
            <fieldset class="d-relative" id="driver{{$n}}" style="border: 1px solid #aaa; padding: 1rem;">
              <span class="clear_driver" title="clear driver"><i class="fas fa-ban"></i></span>
              <legend style="padding: 0 5px; width: inherit;">Driver {{$n}}{{$n<=config('constants.driver_limits')['min']?'*':''}}</legend>
              <div class="form-group">
                <label for="driver{{$n}}name">Name</label>
                <input class="form-control" type="text" name="driver{{$n}}[name]" id="driver{{$n}}name" value="{{old('driver'.$n.'.name')}}" placeholder="Name of Driver {{$n}}">
              </div>
              <div class="form-group">
                <label for="driver{{$n}}iracingid">iRacing ID</label>
                <input class="form-control" type="text" name="driver{{$n}}[iracingid]" id="driver{{$n}}iracingid" value="{{old('driver'.$n.'.iracingid')}}" placeholder="iRacing ID of Driver {{$n}}">
              </div>
              <div class="form-group">
                <label for="driver{{$n}}irating">iRating</label>
                <input class="form-control" type="number" min="2000" max="12000" step="1" value="{{old('driver'.$n.'.ir',$min_ir)}}" name="driver{{$n}}[ir]" id="driver{{$n}}irating">
              </div>
              <div class="form-group">
                <label for="driver{{$n}}sr1">License & SR</label>
                <div class="form-group input-group">
                  <select class="form-control" name="driver{{$n}}[sr1]" id="driver{{$n}}sr1" title="License">
                    <option value="c" {{old('driver'.$n.'.sr1') == 'c' ? 'selected' : ''}}>C</option>
                    <option value="b" {{old('driver'.$n.'.sr1') == 'b' ? 'selected' : ''}}>B</option>
                    <option value="a" {{old('driver'.$n.'.sr1') == 'a' ? 'selected' : ''}}>A</option>
                    <option value="p" {{old('driver'.$n.'.sr1') == 'p' ? 'selected' : ''}}>P</option>
                  </select>
                  <span class="input-group-addon">@</span>
                  <input class="form-control" type="number" min="0.00" max="5.00" step="0.01" value="{{old('driver'.$n.'.sr2',3.00)}}" name="driver{{$n}}[sr2]" id="driver{{$n}}sr2" title="Safetyrating">
                </div>
              </div>
            </fieldset>
          </div>
        @endfor


      </div>
      <div class="form-group">
        <button type="button" id="add-driver-form" value="another driver" class="btn btn-success">+ another driver</button>
      </div>
      <div class="form-group">
        <input type="submit" name="create" value="Create Team" class="btn btn-primary">
      </div>

    </form>

  </div>
</div>
@endsection
@section('additionalFooter')
  <script type="text/javascript">
  $(function () {
    $('[data-toggle="popover"]').popover();
  })
  </script>
@endsection
