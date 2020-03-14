@extends('master.master')

@section('main')
<script type="text/javascript">
  var selOption = 0;
  var numbers = <?php echo json_encode($numbers); ?>
</script>
<div class="row mx-0">
  <div class="col-12" style="padding-bottom:2rem;">
    <h1>Create New Team</h1>
    @include('master.formerrors')
    <form class="sco-forms row" action="{{url('/myteams/create')}}" method="post">
      {{csrf_field()}}
      <div class="col-12 col-md-6 p-0 p-md-1">
        <div class="p-2 border rounded">
          <h2 class="mb-4">Teamdata</h2>
          <div class="mt-3 d-flex flex-column justify-content-between align-items-stretch">
            <input id="teamname" type="text" name="teamname" value="{{old('teamname')}}">
            <label for="teamname">Teamname</label>
          </div>
          <div class="d-flex flex-row justify-content-start align-items-center">
            <input type="checkbox" value="yes" id="useinvite" name="useinvite" {{$has_invite?'':'disabled'}} {{!is_null(old('useinvite'))?'checked':''}}>
            <label class="ml-3 form-check-label" for="useinvite">
              Use Invite<i class="fas fa-question-circle ml-3" data-container="body" data-toggle="popover" data-placement="top" data-content="You have {{auth()->user()->invites()->where('used', null)->count()}} invite(s) left" data-trigger="hover"></i>
            </label>
          </div>
          <div class="mt-3 d-flex flex-column justify-content-between align-items-stretch">
            <label for="car">Car</label>
            <select id="car" name="teamcar">
              @foreach (config('constants.classes')[config('constants.current_season')] as $class)
              @foreach ($class as $id)
              <option value="{{$id}}" {{old('teamcar') == $id?'selected':''}}>{{config('constants.car_names')[$id]}}</option>
              @endforeach
              @endforeach
            </select>
          </div>
          <div class="my-3 d-flex flex-column justify-content-between align-items-stretch">
            <label for="number">Number</label>
            <select id="number" name="teamnumber">
              @for ($i=1; $i < 1000; $i++)
              <option value="{{$i}}" {{old('teamnumber') == $i ? 'selected' : ''}}>{{$i}}</option>
              @endfor
            </select>
          </div>
          <div class="mt-5 d-flex flex-column justify-content-between align-items-stretch">
            <input type="text" id="ir_teamid" name="iracing_teamid" value="{{old('iracing_teamid')}}">
            <label for="ir_teamid">iRacing Team ID</label>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-6 p-0 p-md-1 mt-3 mt-md-0">
        <div class="border rounded p-2">
          <h2 class="mb-4">Social media links (optional)</h2>
          <div class="mt-3 d-flex flex-column justify-content-between align-items-stretch">
            <input type="text" id="website" name="website" value="{{old('website')}}">
            <label for="website">Website</label>
          </div>
          <div class="mt-3 d-flex flex-column justify-content-between align-items-stretch">
            <input type="text" id="twitter" name="twitter" value="{{old('twitter')}}">
            <label for="twitter">Twitter</label>
          </div>
          <div class="mt-3 d-flex flex-column justify-content-between align-items-stretch">
            <input type="text" id="facebook" name="facebook" value="{{old('facebook')}}">
            <label for="facebook">Facebook</label>
          </div>
          <div class="mt-3 d-flex flex-column justify-content-between align-items-stretch">
            <input type="text" id="instagram" name="instagram" value="{{old('instagram')}}">
            <label for="instagram">Instagram</label>
          </div>
        </div>
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
          <div class="col-lg-6 col-sm-12 mt-5 add-driver-form {{$n<=config('constants.driver_limits')['min']||old('driver'.$n.'.iracingid')!==null ? 'add-driver-form-active add-driver-form-mandatory':''}}" data-driver="{{$n}}">
            <fieldset class="d-relative" id="driver{{$n}}" style="border: 1px solid #aaa; padding: 1rem;">
              <span class="clear_driver" title="clear driver"><i class="fas fa-ban"></i></span>
              <legend style="padding: 0 5px; width: inherit;">Driver {{$n}}{{$n<=config('constants.driver_limits')['min']?'*':''}}</legend>
              <div class="mt-3 d-flex flex-column justify-content-between align-items-stretch">
                <input class="iracingid" type="text" name="driver{{$n}}[iracingid]" id="driver{{$n}}iracingid" value="{{old('driver'.$n.'.iracingid')}}">
                <label for="driver{{$n}}iracingid">iRacing Id</label>
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
