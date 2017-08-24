@extends('admin.master.master')

@section('content')
  <h1>Team list</h1>
  <hr>
  <h3>Prototypes</h3>
  <table class="table table-bordered table-hovered">
    <tr>
      <th>edit</th>
      <th>created</th>
      <th>last edit</th>
      <th>id</th>
      <th>name</th>
      <th>number</th>
      <th>manager</th>
      <th>car</th>
      <th>pending</th>
      <th>waiting</th>
      <th>confirm</th>
    </tr>
    @foreach ($teams['P']['confirmed'] as $team)
      <tr>
        <td class="bg-success"><a class="btn btn-primary" href="{{url('admin/teams/'.$team['id'])}}">edit</a></td>
        <td>{{$team['created_at']->format('d.m.Y-H:i')}}</td>
        <td>{{$team['updated_at']->format('d.m.Y-H:i')}}</td>
        <td>{{$team['id']}}</td>
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
          <input class="btn btn-warning" type="submit" name="waiting" value="set waiting">
        </form></td>
        <td><form class="" action="{{url('admin/teams/'.$team['id'])}}" method="post">
          {{csrf_field()}}
          <input class="btn btn-success" type="submit" name="confirm" value="set confirm" disabled>
        </form></td>
      </tr>
    @endforeach
    @foreach ($teams['P']['waitinglist'] as $team)
      <tr>
        <td class="bg-warning"><a class="btn btn-primary" href="{{url('admin/teams/'.$team['id'])}}">edit</a></td>
        <td>{{$team['created_at']->format('d.m.Y-H:i')}}</td>
        <td>{{$team['updated_at']->format('d.m.Y-H:i')}}</td>
        <td>{{$team['id']}}</td>
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
          <input class="btn btn-warning" type="submit" name="waiting" value="set waiting" disabled>
        </form></td>
        <td><form class="" action="{{url('admin/teams/'.$team['id'])}}" method="post">
          {{csrf_field()}}
          <input class="btn btn-success" type="submit" name="confirm" value="set confirm">
        </form></td>
      </tr>
    @endforeach
    @foreach ($teams['P']['pending'] as $team)
      <tr>
        <td class="bg-danger"><a class="btn btn-primary" href="{{url('admin/teams/'.$team['id'])}}">edit</a></td>
        <td>{{$team['created_at']->format('d.m.Y-H:i')}}</td>
        <td>{{$team['updated_at']->format('d.m.Y-H:i')}}</td>
        <td>{{$team['id']}}</td>
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
          <input class="btn btn-warning" type="submit" name="waiting" value="set waiting">
        </form></td>
        <td><form class="" action="{{url('admin/teams/'.$team['id'])}}" method="post">
          {{csrf_field()}}
          <input class="btn btn-success" type="submit" name="confirm" value="set confirm">
        </form></td>
      </tr>
    @endforeach
  </table>

  <hr>
  <h3>GT</h3>
  <table class="table table-bordered table-hovered">
    <tr>
      <th>edit</th>
      <th>created</th>
      <th>last edit</th>
      <th>id</th>
      <th>name</th>
      <th>number</th>
      <th>manager</th>
      <th>car</th>
      <th>pending</th>
      <th>waiting</th>
      <th>confirm</th>
    </tr>
    @foreach ($teams['GT']['confirmed'] as $team)
      <tr>
        <td class="bg-success"><a class="btn btn-primary" href="{{url('admin/teams/'.$team['id'])}}">edit</a></td>
        <td>{{$team['created_at']->format('d.m.Y-H:i')}}</td>
        <td>{{$team['updated_at']->format('d.m.Y-H:i')}}</td>
        <td>{{$team['id']}}</td>
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
          <input class="btn btn-warning" type="submit" name="waiting" value="set waiting">
        </form></td>
        <td><form class="" action="{{url('admin/teams/'.$team['id'])}}" method="post">
          {{csrf_field()}}
          <input class="btn btn-success" type="submit" name="confirm" value="set confirm" disabled>
        </form></td>
      </tr>
    @endforeach
    @foreach ($teams['GT']['waitinglist'] as $team)
      <tr>
        <td class="bg-warning"><a class="btn btn-primary" href="{{url('admin/teams/'.$team['id'])}}">edit</a></td>
        <td>{{$team['created_at']->format('d.m.Y-H:i')}}</td>
        <td>{{$team['updated_at']->format('d.m.Y-H:i')}}</td>
        <td>{{$team['id']}}</td>
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
          <input class="btn btn-warning" type="submit" name="waiting" value="set waiting" disabled>
        </form></td>
        <td><form class="" action="{{url('admin/teams/'.$team['id'])}}" method="post">
          {{csrf_field()}}
          <input class="btn btn-success" type="submit" name="confirm" value="set confirm">
        </form></td>
      </tr>
    @endforeach
    @foreach ($teams['GT']['pending'] as $team)
      <tr>
        <td class="bg-danger"><a class="btn btn-primary" href="{{url('admin/teams/'.$team['id'])}}">edit</a></td>
        <td>{{$team['created_at']->format('d.m.Y-H:i')}}</td>
        <td>{{$team['updated_at']->format('d.m.Y-H:i')}}</td>
        <td>{{$team['id']}}</td>
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
          <input class="btn btn-warning" type="submit" name="waiting" value="set waiting">
        </form></td>
        <td><form class="" action="{{url('admin/teams/'.$team['id'])}}" method="post">
          {{csrf_field()}}
          <input class="btn btn-success" type="submit" name="confirm" value="set confirm">
        </form></td>
      </tr>
    @endforeach
  </table>

  <hr>
  <h3>GTC</h3>
  <table class="table table-bordered table-hovered">
    <tr>
      <th>edit</th>
      <th>created</th>
      <th>last edit</th>
      <th>id</th>
      <th>name</th>
      <th>number</th>
      <th>manager</th>
      <th>car</th>
      <th>pending</th>
      <th>waiting</th>
      <th>confirm</th>
    </tr>
    @foreach ($teams['GTC']['confirmed'] as $team)
      <tr>
        <td class="bg-success"><a class="btn btn-primary" href="{{url('admin/teams/'.$team['id'])}}">edit</a></td>
        <td>{{$team['created_at']->format('d.m.Y-H:i')}}</td>
        <td>{{$team['updated_at']->format('d.m.Y-H:i')}}</td>
        <td>{{$team['id']}}</td>
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
          <input class="btn btn-warning" type="submit" name="waiting" value="set waiting">
        </form></td>
        <td><form class="" action="{{url('admin/teams/'.$team['id'])}}" method="post">
          {{csrf_field()}}
          <input class="btn btn-success" type="submit" name="confirm" value="set confirm" disabled>
        </form></td>
      </tr>
    @endforeach
    @foreach ($teams['GTC']['waitinglist'] as $team)
      <tr>
        <td class="bg-warning"><a class="btn btn-primary" href="{{url('admin/teams/'.$team['id'])}}">edit</a></td>
        <td>{{$team['created_at']->format('d.m.Y-H:i')}}</td>
        <td>{{$team['updated_at']->format('d.m.Y-H:i')}}</td>
        <td>{{$team['id']}}</td>
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
          <input class="btn btn-warning" type="submit" name="waiting" value="set waiting" disabled>
        </form></td>
        <td><form class="" action="{{url('admin/teams/'.$team['id'])}}" method="post">
          {{csrf_field()}}
          <input class="btn btn-success" type="submit" name="confirm" value="set confirm">
        </form></td>
      </tr>
    @endforeach
    @foreach ($teams['GTC']['pending'] as $team)
      <tr>
        <td class="bg-danger"><a class="btn btn-primary" href="{{url('admin/teams/'.$team['id'])}}">edit</a></td>
        <td>{{$team['created_at']->format('d.m.Y-H:i')}}</td>
        <td>{{$team['updated_at']->format('d.m.Y-H:i')}}</td>
        <td>{{$team['id']}}</td>
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
          <input class="btn btn-warning" type="submit" name="waiting" value="set waiting">
        </form></td>
        <td><form class="" action="{{url('admin/teams/'.$team['id'])}}" method="post">
          {{csrf_field()}}
          <input class="btn btn-success" type="submit" name="confirm" value="set confirm">
        </form></td>
      </tr>
    @endforeach
  </table>
@endsection
