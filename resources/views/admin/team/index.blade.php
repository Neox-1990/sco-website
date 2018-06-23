@extends('admin.master.master')

@section('content')
  <h1>Team list</h1>
  <hr>
  <a href="{{url('admin/entrylist')}}">Entrylist</a>
  <hr>
  @foreach ($teams as $name => $list)
  <h3 class="mt-5 teamtabletoggle">{{$name}} (<span class="text-danger">{{sizeof($list['pending'])}}</span>/<span class="text-primary">{{sizeof($list['reviewed'])}}</span>/<span class="text-warning">{{sizeof($list['waitinglist'])}}</span>/<span class="text-info">{{sizeof($list['qualified'])}}</span>/<span class="text-success">{{sizeof($list['confirmed'])}}</span>)<span class="ml-3 toggle-icon"><i class="fa fa-chevron-circle-down closed" aria-hidden="true"></i></span></h3>
  <div class="">
    <table class="table table-bordered table-hovered">
      <thead>
        <tr>
          <th>edit</th>
          <th class="sco-table-sort" data-sort-content="date" data-sort-dir="asc">created</th>
          <th class="sco-table-sort" data-sort-content="text" data-sort-dir="asc">name</th>
          <th class="sco-table-sort" data-sort-content="numeric" data-sort-dir="asc">number</th>
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
            <td><a href="{{url('admin/manager/'.$team['user']['id'])}}">{{$team['user']['name']}}</a></td>
            <td>{{config('constants.car_names')[$team['car']]}}</td>
            <td><form class="" action="{{url('admin/teams/'.$team['id'])}}" method="post">
              {{csrf_field()}}
              <input class="btn btn-danger" type="submit" name="pending" value="set pending">
            </form></td>
            <td><form class="" action="{{url('admin/teams/'.$team['id'])}}" method="post">
              {{csrf_field()}}
              <input class="btn btn-primary" type="submit" name="review" value="set review">
            </form></td>
            <td><form class="" action="{{url('admin/teams/'.$team['id'])}}" method="post">
              {{csrf_field()}}
              <input class="btn btn-warning" type="submit" name="waiting" value="set reserve">
            </form></td>
            <td><form class="" action="{{url('admin/teams/'.$team['id'])}}" method="post">
              {{csrf_field()}}
              <input class="btn btn-info" type="submit" name="qualified" value="set qualified">
            </form></td>
            <td><form class="" action="{{url('admin/teams/'.$team['id'])}}" method="post">
              {{csrf_field()}}
              <input class="btn btn-success" type="submit" name="confirm" value="set confirm" disabled>
            </form></td>
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
            <td><a href="{{url('admin/manager/'.$team['user']['id'])}}">{{$team['user']['name']}}</a></td>
            <td>{{config('constants.car_names')[$team['car']]}}</td>
            <td><form class="" action="{{url('admin/teams/'.$team['id'])}}" method="post">
              {{csrf_field()}}
              <input class="btn btn-danger" type="submit" name="pending" value="set pending">
            </form></td>
            <td><form class="" action="{{url('admin/teams/'.$team['id'])}}" method="post">
              {{csrf_field()}}
              <input class="btn btn-primary" type="submit" name="review" value="set review">
            </form></td>
            <td><form class="" action="{{url('admin/teams/'.$team['id'])}}" method="post">
              {{csrf_field()}}
              <input class="btn btn-warning" type="submit" name="waiting" value="set reserve">
            </form></td>
            <td><form class="" action="{{url('admin/teams/'.$team['id'])}}" method="post">
              {{csrf_field()}}
              <input class="btn btn-info" type="submit" name="qualified" value="set qualified" disabled>
            </form></td>
            <td><form class="" action="{{url('admin/teams/'.$team['id'])}}" method="post">
              {{csrf_field()}}
              <input class="btn btn-success" type="submit" name="confirm" value="set confirm">
            </form></td>
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
            <td><a href="{{url('admin/manager/'.$team['user']['id'])}}">{{$team['user']['name']}}</a></td>
            <td>{{config('constants.car_names')[$team['car']]}}</td>
            <td><form class="" action="{{url('admin/teams/'.$team['id'])}}" method="post">
              {{csrf_field()}}
              <input class="btn btn-danger" type="submit" name="pending" value="set pending">
            </form></td>
            <td><form class="" action="{{url('admin/teams/'.$team['id'])}}" method="post">
              {{csrf_field()}}
              <input class="btn btn-primary" type="submit" name="review" value="set review">
            </form></td>
            <td><form class="" action="{{url('admin/teams/'.$team['id'])}}" method="post">
              {{csrf_field()}}
              <input class="btn btn-warning" type="submit" name="waiting" value="set reserve" disabled>
            </form></td>
            <td><form class="" action="{{url('admin/teams/'.$team['id'])}}" method="post">
              {{csrf_field()}}
              <input class="btn btn-info" type="submit" name="qualified" value="set qualified">
            </form></td>
            <td><form class="" action="{{url('admin/teams/'.$team['id'])}}" method="post">
              {{csrf_field()}}
              <input class="btn btn-success" type="submit" name="confirm" value="set confirm">
            </form></td>
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
            <td><a href="{{url('admin/manager/'.$team['user']['id'])}}">{{$team['user']['name']}}</a></td>
            <td>{{config('constants.car_names')[$team['car']]}}</td>
            <td><form class="" action="{{url('admin/teams/'.$team['id'])}}" method="post">
              {{csrf_field()}}
              <input class="btn btn-danger" type="submit" name="pending" value="set pending">
            </form></td>
            <td><form class="" action="{{url('admin/teams/'.$team['id'])}}" method="post">
              {{csrf_field()}}
              <input class="btn btn-primary" type="submit" name="review" value="set review" disabled>
            </form></td>
            <td><form class="" action="{{url('admin/teams/'.$team['id'])}}" method="post">
              {{csrf_field()}}
              <input class="btn btn-warning" type="submit" name="waiting" value="set reserve">
            </form></td>
            <td><form class="" action="{{url('admin/teams/'.$team['id'])}}" method="post">
              {{csrf_field()}}
              <input class="btn btn-info" type="submit" name="qualified" value="set qualified">
            </form></td>
            <td><form class="" action="{{url('admin/teams/'.$team['id'])}}" method="post">
              {{csrf_field()}}
              <input class="btn btn-success" type="submit" name="confirm" value="set confirm">
            </form></td>
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
            <td><a href="{{url('admin/manager/'.$team['user']['id'])}}">{{$team['user']['name']}}</a></td>
            <td>{{config('constants.car_names')[$team['car']]}}</td>
            <td><form class="" action="{{url('admin/teams/'.$team['id'])}}" method="post">
              {{csrf_field()}}
              <input class="btn btn-danger" type="submit" name="pending" value="set pending" disabled>
            </form></td>
            <td><form class="" action="{{url('admin/teams/'.$team['id'])}}" method="post">
              {{csrf_field()}}
              <input class="btn btn-info" type="submit" name="review" value="set review">
            </form></td>
            <td><form class="" action="{{url('admin/teams/'.$team['id'])}}" method="post">
              {{csrf_field()}}
              <input class="btn btn-warning" type="submit" name="waiting" value="set reserve">
            </form></td>
            <td><form class="" action="{{url('admin/teams/'.$team['id'])}}" method="post">
              {{csrf_field()}}
              <input class="btn btn-info" type="submit" name="qualified" value="set qualified">
            </form></td>
            <td><form class="" action="{{url('admin/teams/'.$team['id'])}}" method="post">
              {{csrf_field()}}
              <input class="btn btn-success" type="submit" name="confirm" value="set confirm">
            </form></td>
          </tr>
        @endforeach
        </table>
  </div>
  @endforeach
  <h3 class="mt-5 teamtabletoggle">Deleted <span class="ml-3 toggle-icon"><i class="fa fa-chevron-circle-down closed" aria-hidden="true"></i></span></h3>
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
            <td><a href="{{url('admin/manager/'.$team['user']['id'])}}">{{$team['user']['name']}}</a></td>
            <td>{{config('constants.car_names')[$team['car']]}}</td>
            <td data-sort-date="{{$team['created_at']->format('YmdHis')}}">{{$team['deleted_at']->format('d.m.Y-H:i')}}</td>
          </tr>
        @endforeach
        </table>
  </div>
@endsection
