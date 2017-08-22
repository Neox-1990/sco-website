@extends('admin.master.master')

@section('content')
  <h1>Complete Log</h1>
  <div class="m-2 p-2">
    <h3>Filter</h3>
    <div class="card dashbord-modul">
      <div class="card-block">
        <form class="" action="{{url('admin/log')}}" method="get">
          <div class="form-group">
            <label for="managerID">Manager ID</label>
            <input class="form-control" id="managerID" type="text" name="managerID" value="1">
          </div>
          <div class="form-group">
            <input class="form-control btn-primary" type="submit" name="manager_id" value="filter by manager">
          </div>
        </form>
      </div>
    </div>
    <div class="card dashbord-modul">
      <div class="card-block">
        <form class="" action="{{url('admin/log')}}" method="get">
          <div class="form-group">
            <label for="teamID">Team ID</label>
            <input class="form-control" id="teamID" type="text" name="teamID" value="1">
          </div>
          <div class="form-group">
            <input class="form-control btn-primary" type="submit" name="team_id" value="filter by team">
          </div>
        </form>
      </div>
    </div>
    <div class="card dashbord-modul">
      <div class="card-block">
        <form class="" action="{{url('admin/log')}}" method="get">
          <div class="form-check">
             <label class="form-check-label d-block">
               <input type="checkbox" name="filteraction[signup]" class="form-check-input">
               sign up
             </label>
             <label class="form-check-label d-block">
               <input type="checkbox" name="filteraction[teamcreated]" class="form-check-input">
               team created
             </label>
             <label class="form-check-label d-block">
               <input type="checkbox" name="filteraction[teamdeleted]" class="form-check-input">
               team deleted
             </label>
             <label class="form-check-label d-block">
               <input type="checkbox" name="filteraction[teamdata]" class="form-check-input">
               team data update
             </label>
             <label class="form-check-label d-block">
               <input type="checkbox" name="filteraction[driveradd]" class="form-check-input">
               driver added
             </label>
             <label class="form-check-label d-block">
               <input type="checkbox" name="filteraction[driverremove]" class="form-check-input">
               driver removed
             </label>
             <label class="form-check-label d-block">
               <input type="checkbox" name="filteraction[statusset]" class="form-check-input">
               status set
             </label>
           </div>
          <div class="form-group">
            <input class="form-control btn-primary" type="submit" name="action_" value="filter by action">
          </div>
        </form>
      </div>
    </div>
  </div>
  <table class="table table-bordered table-hover">
    <tr>
      <th>date</th>
      <th>user</th>
      <th>action</th>
    </tr>
    @foreach ($log as $entry)
      <tr>
        <td>{{$entry->created_at->format('d.m.Y - H:i:s')}}</td>
        <td><a href="{{url('admin/manager/'.$entry['user']['id'])}}">{{$entry['user']['name']}}</a></td>
        <td>{{$entry->action}}</td>
      </tr>
    @endforeach
  </table>
@endsection
