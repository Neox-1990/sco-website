@extends('master.master')

@section('main')
<div class="row">
  <div class="col-12" style="padding-bottom:2rem;">
    <h1>Create New Team</h1>
    <form class="" action="{{url('/myteams/create')}}" method="post">
      {{csrf_field()}}
      <div class="form-group">
        <label for="teamname">Teamname</label>
        <input id="teamname" class="form-control" type="text" name="teamname" value="">
      </div>
      <div class="form-group">
        <label for="car">Car</label>
        <select id="car" class="form-control" name="car">
          @foreach (config('constants.car_names') as $key => $value)
            <option value="{{$key}}">{{$value}}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <label for="number">Number</label>
        <select id="number" class="form-control" name="number">
          @for ($i=1; $i < 100; $i++)
            <option value="{{$i}}">{{$i}}</option>
          @endfor
        </select>
      </div>
      <hr>
      <div class="row" style="padding:1rem;">

        <div class="col-lg-6 col-sm-12">
          <fieldset id="driver1" style="border: 1px solid #aaa; padding: 1rem;">
            <legend style="padding: 0 5px; width: inherit;">Driver 1*</legend>
            <div class="form-group">
              <label for="driver1name">Name</label>
              <input class="form-control" type="text" name="driver1[name]" id="driver1name">
            </div>
            <div class="form-group">
              <label for="driver1irid">iRacing ID</label>
              <input class="form-control" type="text" name="driver1[irid]" id="driver1irid">
            </div>
            <div class="form-group">
              <label for="driver1irating">iRating</label>
              <input class="form-control" type="number" min="2000" max="9999" step="1" value="2000" name="driver1[ir]" id="driver1irating">
            </div>
            <div class="form-group">
              <label for="driver1sr1">License & SR</label>
              <div class="form-group input-group">
                <select class="form-control" name="driver1[sr1]" id="driver1sr1" title="License">
                  <option value="c">C</option>
                  <option value="b">B</option>
                  <option value="a">A</option>
                  <option value="p">P</option>
                </select>
                <span class="input-group-addon">@</span>
                <input class="form-control" type="number" min="0.00" max="5.00" step="0.01" value="4.00" name="driver1[sr2]" id="driver1sr2" title="Safetyrating">
              </div>
            </div>
          </fieldset>
        </div>

        <div class="col-lg-6 col-sm-12">
          <fieldset id="driver2" style="border: 1px solid #aaa; padding: 1rem;">
            <legend style="padding: 0 5px; width: inherit;">Driver 2*</legend>
            <div class="form-group">
              <label for="driver2name">Name</label>
              <input class="form-control" type="text" name="driver2[name]" id="driver2name">
            </div>
            <div class="form-group">
              <label for="driver2irid">iRacing ID</label>
              <input class="form-control" type="text" name="driver2[irid]" id="driver2irid">
            </div>
            <div class="form-group">
              <label for="driver2irating">iRating</label>
              <input class="form-control" type="number" min="2000" max="9999" step="1" value="2000" name="driver2[ir]" id="driver2irating">
            </div>
            <div class="form-group">
              <label for="driver2sr1">License & SR</label>
              <div class="form-group input-group">
                <select class="form-control" name="driver2[sr1]" id="driver2sr1" title="License">
                  <option value="c">C</option>
                  <option value="b">B</option>
                  <option value="a">A</option>
                  <option value="p">P</option>
                </select>
                <span class="input-group-addon">@</span>
                <input class="form-control" type="number" min="0.00" max="5.00" step="0.01" value="4.00" name="driver2[sr2]" id="driver2sr2" title="Safetyrating">
              </div>
            </div>
          </fieldset>
        </div>

        <div class="col-lg-6 col-sm-12">
          <fieldset id="driver3" style="border: 1px solid #aaa; padding: 1rem;">
            <legend style="padding: 0 5px; width: inherit;">Driver 3</legend>
            <div class="form-group">
              <label for="driver3name">Name</label>
              <input class="form-control" type="text" name="driver3[name]" id="driver3name">
            </div>
            <div class="form-group">
              <label for="driver3irid">iRacing ID</label>
              <input class="form-control" type="text" name="driver3[irid]" id="driver3irid">
            </div>
            <div class="form-group">
              <label for="driver3irating">iRating</label>
              <input class="form-control" type="number" min="2000" max="9999" step="1" value="2000" name="driver3[ir]" id="driver3irating">
            </div>
            <div class="form-group">
              <label for="driver3sr1">License & SR</label>
              <div class="form-group input-group">
                <select class="form-control" name="driver3[sr1]" id="driver3sr1" title="License">
                  <option value="c">C</option>
                  <option value="b">B</option>
                  <option value="a">A</option>
                  <option value="p">P</option>
                </select>
                <span class="input-group-addon">@</span>
                <input class="form-control" type="number" min="0.00" max="5.00" step="0.01" value="4.00" name="driver3[sr2]" id="driver3sr2" title="Safetyrating">
              </div>
            </div>
          </fieldset>
        </div>

        <div class="col-lg-6 col-sm-12">
          <fieldset id="driver4" style="border: 1px solid #aaa; padding: 1rem;">
            <legend style="padding: 0 5px; width: inherit;">Driver 4</legend>
            <div class="form-group">
              <label for="driver4name">Name</label>
              <input class="form-control" type="text" name="driver4[name]" id="driver4name">
            </div>
            <div class="form-group">
              <label for="driver4irid">iRacing ID</label>
              <input class="form-control" type="text" name="driver4[irid]" id="driver4irid">
            </div>
            <div class="form-group">
              <label for="driver4irating">iRating</label>
              <input class="form-control" type="number" min="2000" max="9999" step="1" value="2000" name="driver4[ir]" id="driver4irating">
            </div>
            <div class="form-group">
              <label for="driver4sr1">License & SR</label>
              <div class="form-group input-group">
                <select class="form-control" name="driver4[sr1]" id="driver4sr1" title="License">
                  <option value="c">C</option>
                  <option value="b">B</option>
                  <option value="a">A</option>
                  <option value="p">P</option>
                </select>
                <span class="input-group-addon">@</span>
                <input class="form-control" type="number" min="0.00" max="5.00" step="0.01" value="4.00" name="driver4[sr2]" id="driver4sr2" title="Safetyrating">
              </div>
            </div>
          </fieldset>
        </div>

        <div class="col-lg-6 col-sm-12">
          <fieldset id="driver5" style="border: 1px solid #aaa; padding: 1rem;">
            <legend style="padding: 0 5px; width: inherit;">Driver 5</legend>
            <div class="form-group">
              <label for="driver5name">Name</label>
              <input class="form-control" type="text" name="driver5[name]" id="driver5name">
            </div>
            <div class="form-group">
              <label for="driver5irid">iRacing ID</label>
              <input class="form-control" type="text" name="driver5[irid]" id="driver5irid">
            </div>
            <div class="form-group">
              <label for="driver5irating">iRating</label>
              <input class="form-control" type="number" min="2000" max="9999" step="1" value="2000" name="driver5[ir]" id="driver5irating">
            </div>
            <div class="form-group">
              <label for="driver5sr1">License & SR</label>
              <div class="form-group input-group">
                <select class="form-control" name="driver5[sr1]" id="driver5sr1" title="License">
                  <option value="c">C</option>
                  <option value="b">B</option>
                  <option value="a">A</option>
                  <option value="p">P</option>
                </select>
                <span class="input-group-addon">@</span>
                <input class="form-control" type="number" min="0.00" max="5.00" step="0.01" value="4.00" name="driver5[sr2]" id="driver5sr2" title="Safetyrating">
              </div>
            </div>
          </fieldset>
        </div>

        <div class="col-lg-6 col-sm-12">
          <fieldset id="driver6" style="border: 1px solid #aaa; padding: 1rem;">
            <legend style="padding: 0 5px; width: inherit;">Driver 6</legend>
            <div class="form-group">
              <label for="driver6name">Name</label>
              <input class="form-control" type="text" name="driver6[name]" id="driver6name">
            </div>
            <div class="form-group">
              <label for="driver6irid">iRacing ID</label>
              <input class="form-control" type="text" name="driver6[irid]" id="driver6irid">
            </div>
            <div class="form-group">
              <label for="driver6irating">iRating</label>
              <input class="form-control" type="number" min="2000" max="9999" step="1" value="2000" name="driver6[ir]" id="driver6irating">
            </div>
            <div class="form-group">
              <label for="driver6sr1">License & SR</label>
              <div class="form-group input-group">
                <select class="form-control" name="driver6[sr1]" id="driver6sr1" title="License">
                  <option value="c">C</option>
                  <option value="b">B</option>
                  <option value="a">A</option>
                  <option value="p">P</option>
                </select>
                <span class="input-group-addon">@</span>
                <input class="form-control" type="number" min="0.00" max="5.00" step="0.01" value="4.00" name="driver6[sr2]" id="driver6sr2" title="Safetyrating">
              </div>
            </div>
          </fieldset>
        </div>

      </div>
      <div class="form-group">
        <input type="submit" name="create" value="Create Team" class="btn btn-primary">
      </div>

    </form>

    @include('master.formerrors')

  </div>
</div>
@endsection
