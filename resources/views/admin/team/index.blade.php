@extends('admin.master.master')

@section('content')
  <h1>Team list</h1>
  <hr>
  <a href="{{url('admin/entrylist')}}">Entrylist</a>
  <hr>
  @foreach ($teams as $name => $list)
  <h3 class="mt-5 teamtabletoggle">{{$name}} (<span class="text-danger">{{sizeof($list['pending'])}}</span>/<span class="text-primary">{{sizeof($list['reviewed'])}}</span>/<span class="text-warning">{{sizeof($list['waitinglist'])}}</span>/<span class="text-info">{{sizeof($list['qualified'])}}</span>/<span class="text-success">{{sizeof($list['confirmed'])}}</span>)<span class="ml-3 toggle-icon"><i class="fas fa-angle-double-down"></i></span></h3>
  <div class="">
    <table class="table table-bordered table-hovered" id="admin-teamtable">
      <thead>
        <tr>
          <th>edit</th>
          <th class="sco-table-sort" data-sort-content="date" data-sort-dir="asc">created</th>
          <th class="sco-table-sort" data-sort-content="text" data-sort-dir="asc">name</th>
          <th class="sco-table-sort" data-sort-content="numeric" data-sort-dir="asc">number</th>
          <th class="sco-table-sort" data-sort-content="numeric" data-sort-dir="asc">iR ID</th>
          <th class="sco-table-sort" data-sort-content="text" data-sort-dir="asc">manager</th>
          <th class="sco-table-sort" data-sort-content="text" data-sort-dir="asc">car</th>
          <th class="sco-table-sort" data-sort-content="text" data-sort-dir="asc">pending</th>
          <th class="sco-table-sort" data-sort-content="text" data-sort-dir="asc">review</th>
          <th class="sco-table-sort" data-sort-content="text" data-sort-dir="asc">reserve</th>
          <th class="sco-table-sort" data-sort-content="text" data-sort-dir="asc">qualified</th>
          <th class="sco-table-sort" data-sort-content="text" data-sort-dir="asc">confirm</th>
        </tr>
      </thead>
        @foreach ($list['confirmed'] as $team)
          <tr>
            <td class="bg-success">
              <a class="btn btn-primary d-block" href="{{url('admin/teams/'.$team['id'])}}">edit</a>
              <a class="btn btn-danger d-block mt-1" href="{{url('admin/teams/delete/'.$team['id'])}}">delete</a>
            </td>
            <td data-sort-date="{{$team['created_at']->format('YmdHis')}}">{{$team['created_at']->format('d.m.Y-H:i')}}</td>
            <td>{{$team['name']}}</td>
            <td>{{$team['number']}}</td>
            <td>{{$team['ir_teamid']}}</td>
            <td><a href="{{url('admin/manager/'.$team['user']['id'])}}">{{$team['user']['name']}}</a></td>
            <td>{{config('constants.car_names')[$team['car']]}}</td>
            <td>
              <button class="btn btn-danger teamchangebtn" type="button" data-team="{{$team['id']}}" data-status="0">set pending</button>
            </td>
            <td>
              <button class="btn btn-primary teamchangebtn" type="button" data-team="{{$team['id']}}" data-status="1">set review</button>
            </td>
            <td>
              <button class="btn btn-warning teamchangebtn" type="button" data-team="{{$team['id']}}" data-status="2">set reserve</button>
            </td>
            <td>
              <button class="btn btn-info teamchangebtn" type="button" data-team="{{$team['id']}}" data-status="3">set qualified</button>
            </td>
            <td>
              <button class="btn btn-success teamchangebtn" type="button" data-team="{{$team['id']}}" data-status="4" disabled>set confirm</button>
            </td>
          </tr>
        @endforeach
        @foreach ($list['qualified'] as $team)
          <tr>
            <td class="bg-info">
              <a class="btn btn-primary d-block" href="{{url('admin/teams/'.$team['id'])}}">edit</a>
              <a class="btn btn-danger d-block mt-1" href="{{url('admin/teams/delete/'.$team['id'])}}">delete</a>
            </td>
            <td data-sort-date="{{$team['created_at']->format('YmdHis')}}">{{$team['created_at']->format('d.m.Y-H:i')}}</td>
            <td>{{$team['name']}}</td>
            <td>{{$team['number']}}</td>
            <td>{{$team['ir_teamid']}}</td>
            <td><a href="{{url('admin/manager/'.$team['user']['id'])}}">{{$team['user']['name']}}</a></td>
            <td>{{config('constants.car_names')[$team['car']]}}</td>
            <td>
              <button class="btn btn-danger teamchangebtn" type="button" data-team="{{$team['id']}}" data-status="0">set pending</button>
            </td>
            <td>
              <button class="btn btn-primary teamchangebtn" type="button" data-team="{{$team['id']}}" data-status="1">set review</button>
            </td>
            <td>
              <button class="btn btn-warning teamchangebtn" type="button" data-team="{{$team['id']}}" data-status="2">set reserve</button>
            </td>
            <td>
              <button class="btn btn-info teamchangebtn" type="button" data-team="{{$team['id']}}" data-status="3" disabled>set qualified</button>
            </td>
            <td>
              <button class="btn btn-success teamchangebtn" type="button" data-team="{{$team['id']}}" data-status="4">set confirm</button>
            </td>
          </tr>
        @endforeach
        @foreach ($list['waitinglist'] as $team)
          <tr>
            <td class="bg-warning">
              <a class="btn btn-primary d-block" href="{{url('admin/teams/'.$team['id'])}}">edit</a>
              <a class="btn btn-danger d-block mt-1" href="{{url('admin/teams/delete/'.$team['id'])}}">delete</a>
            </td>
            <td data-sort-date="{{$team['created_at']->format('YmdHis')}}">{{$team['created_at']->format('d.m.Y-H:i')}}</td>
            <td>{{$team['name']}}</td>
            <td>{{$team['number']}}</td>
            <td>{{$team['ir_teamid']}}</td>
            <td><a href="{{url('admin/manager/'.$team['user']['id'])}}">{{$team['user']['name']}}</a></td>
            <td>{{config('constants.car_names')[$team['car']]}}</td>
            <td>
              <button class="btn btn-danger teamchangebtn" type="button" data-team="{{$team['id']}}" data-status="0">set pending</button>
            </td>
            <td>
              <button class="btn btn-primary teamchangebtn" type="button" data-team="{{$team['id']}}" data-status="1">set review</button>
            </td>
            <td>
              <button class="btn btn-warning teamchangebtn" type="button" data-team="{{$team['id']}}" data-status="2" disabled>set reserve</button>
            </td>
            <td>
              <button class="btn btn-info teamchangebtn" type="button" data-team="{{$team['id']}}" data-status="3">set qualified</button>
            </td>
            <td>
              <button class="btn btn-success teamchangebtn" type="button" data-team="{{$team['id']}}" data-status="4">set confirm</button>
            </td>
          </tr>
        @endforeach
        @foreach ($list['reviewed'] as $team)
          <tr>
            <td class="bg-primary">
              <a class="btn btn-primary d-block" href="{{url('admin/teams/'.$team['id'])}}">edit</a>
              <a class="btn btn-danger d-block mt-1" href="{{url('admin/teams/delete/'.$team['id'])}}">delete</a>
            </td>
            <td data-sort-date="{{$team['created_at']->format('YmdHis')}}">{{$team['created_at']->format('d.m.Y-H:i')}}</td>
            <td>{{$team['name']}}</td>
            <td>{{$team['number']}}</td>
            <td>{{$team['ir_teamid']}}</td>
            <td><a href="{{url('admin/manager/'.$team['user']['id'])}}">{{$team['user']['name']}}</a></td>
            <td>{{config('constants.car_names')[$team['car']]}}</td>
            <td>
              <button class="btn btn-danger teamchangebtn" type="button" data-team="{{$team['id']}}" data-status="0">set pending</button>
            </td>
            <td>
              <button class="btn btn-primary teamchangebtn" type="button" data-team="{{$team['id']}}" data-status="1" disabled>set review</button>
            </td>
            <td>
              <button class="btn btn-warning teamchangebtn" type="button" data-team="{{$team['id']}}" data-status="2">set reserve</button>
            </td>
            <td>
              <button class="btn btn-info teamchangebtn" type="button" data-team="{{$team['id']}}" data-status="3">set qualified</button>
            </td>
            <td>
              <button class="btn btn-success teamchangebtn" type="button" data-team="{{$team['id']}}" data-status="4">set confirm</button>
            </td>
          </tr>
        @endforeach
        @foreach ($list['pending'] as $team)
          <tr>
            <td class="bg-danger">
              <a class="btn btn-primary d-block" href="{{url('admin/teams/'.$team['id'])}}">edit</a>
              <a class="btn btn-danger d-block mt-1" href="{{url('admin/teams/delete/'.$team['id'])}}">delete</a>
            </td>
            <td data-sort-date="{{$team['created_at']->format('YmdHis')}}">{{$team['created_at']->format('d.m.Y-H:i')}}</td>
            <td>{{$team['name']}}</td>
            <td>{{$team['number']}}</td>
            <td>{{$team['ir_teamid']}}</td>
            <td><a href="{{url('admin/manager/'.$team['user']['id'])}}">{{$team['user']['name']}}</a></td>
            <td>{{config('constants.car_names')[$team['car']]}}</td>
            <td>
              <button class="btn btn-danger teamchangebtn" type="button" data-team="{{$team['id']}}" data-status="0" disabled>set pending</button>
            </td>
            <td>
              <button class="btn btn-primary teamchangebtn" type="button" data-team="{{$team['id']}}" data-status="1">set review</button>
            </td>
            <td>
              <button class="btn btn-warning teamchangebtn" type="button" data-team="{{$team['id']}}" data-status="2">set reserve</button>
            </td>
            <td>
              <button class="btn btn-info teamchangebtn" type="button" data-team="{{$team['id']}}" data-status="3">set qualified</button>
            </td>
            <td>
              <button class="btn btn-success teamchangebtn" type="button" data-team="{{$team['id']}}" data-status="4">set confirm</button>
            </td>
          </tr>
        @endforeach
        </table>
  </div>
  @endforeach
  <h3 class="mt-5 teamtabletoggle">Deleted <span class="ml-3 toggle-icon"><i class="fas fa-chevron-down closed" aria-hidden="true"></i></span></h3>
  <div class="">
    <table class="table table-bordered table-hovered">
      <thead>
        <tr>
          <th>edit</th>
          <th class="sco-table-sort" data-sort-content="date" data-sort-dir="asc">created</th>
          <th class="sco-table-sort" data-sort-content="date" data-sort-dir="asc">last edit</th>
          <th class="sco-table-sort" data-sort-content="numeric" data-sort-dir="asc">id</th>
          <th class="sco-table-sort" data-sort-content="numeric" data-sort-dir="asc">team id</th>
          <th class="sco-table-sort" data-sort-content="text" data-sort-dir="asc">name</th>
          <th class="sco-table-sort" data-sort-content="numeric" data-sort-dir="asc">number</th>
          <th class="sco-table-sort" data-sort-content="text" data-sort-dir="asc">manager</th>
          <th class="sco-table-sort" data-sort-content="text" data-sort-dir="asc">car</th>
          <th class="sco-table-sort" data-sort-content="text" data-sort-dir="asc">deleted at</th>
        </tr>
      </thead>
        @foreach ($deletedTeams as $team)
          <tr>
            <td class="bg-success">
              <a class="btn btn-info d-block" href="{{url('admin/teams/restore/'.$team['id'])}}">restore</a>
            </td>
            <td data-sort-date="{{$team['created_at']->format('YmdHis')}}">{{$team['created_at']->format('d.m.Y-H:i')}}</td>
            <td data-sort-date="{{$team['updated_at']->format('YmdHis')}}">{{$team['updated_at']->format('d.m.Y-H:i')}}</td>
            <td>{{$team['id']}}</td>
            <td>{{$team['ir_teamid']}}</td>
            <td>{{$team['name']}}</td>
            <td>{{$team['number']}}</td>
            <td>{{$team['ir_teamid']}}</td>
            <td><a href="{{url('admin/manager/'.$team['user']['id'])}}">{{$team['user']['name']}}</a></td>
            <td>{{config('constants.car_names')[$team['car']]}}</td>
            <td data-sort-date="{{$team['created_at']->format('YmdHis')}}">{{$team['deleted_at']->format('d.m.Y-H:i')}}</td>
          </tr>
        @endforeach
        </table>
  </div>
@endsection
