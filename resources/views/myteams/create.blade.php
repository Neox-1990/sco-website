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
        <label for="car">Car</label>
        <select id="car" class="form-control" name="teamcar">
          @foreach (config('constants.classes')[config('constants.curent_season')] as $class)
            @foreach ($class as $id)
              <option value="{{$id}}" {{old('teamcar') == $id?'selected':''}}>{{config('constants.car_names')[$id]}}</option>              
            @endforeach
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <label for="number">Number</label>
        <select id="number" class="form-control" name="teamnumber">
          @for ($i=1; $i < 150; $i++)
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
        @for ($n=1; $n < 7; $n++)
          <div class="col-lg-6 col-sm-12 add-driver-form {{$n<4||old('driver'.$n.'.name')!==null||old('driver'.$n.'.iracingid')!==null?'add-driver-form-active':''}}">
            <fieldset class="" id="driver{{$n}}" style="border: 1px solid #aaa; padding: 1rem;">
              <legend style="padding: 0 5px; width: inherit;">Driver {{$n}}{{$n<4?'*':''}}</legend>
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
                <input class="form-control" type="number" min="2000" max="12000" step="1" value="{{old('driver'.$n.'.ir',2000)}}" name="driver{{$n}}[ir]" id="driver{{$n}}irating">
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
