@extends('admin.master.master')

@section('content')
  <h1>Invites</h1>
  <hr>
  <h2>Add new Invite</h2>
  <div class="row w-100">
    <div class="col-4">
      <form class="p-3 border rounded" action="{{url('admin/invites')}}" method="post">
        {{csrf_field()}}
        <div class="form-group">
          <label for="inviteManager">Manager</label>
          <input class="form-control" list="managerList" name="inviteManager" />
          <datalist id="managerList">
            @foreach ($managers as $manager)
              <option value="{{$manager['id']}}">{{$manager['name']}}</option>
            @endforeach
          </datalist>
        </div>
        <div class="form-group">
          <input type="submit" name="add" value="Give Invite" class="btn btn-primary">
        </div>
      </form>
    </div>
    <div class="col-4">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th colspan="2">Open Invites</th>
          </tr>
          <tr>
            <th>Manager</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($open_invites as $invite)
            <tr>
              <td><a href="{{url('admin/manager/'.$invite['user_id'])}}">{{$invite['user']['name']}}</a></td>
              <td>
                <form class="" action="{{url('admin/invites')}}" method="post">
                  {{csrf_field()}}
                  <input type="hidden" name="id" value="{{$invite['id']}}">
                  <input type="submit" name="delete_invite" value="Delete" class="btn btn-danger">
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="col-4">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th colspan="2">Used Invites</th>
          </tr>
          <tr>
            <th>Manager</th>
            <th>Used</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($used_invites as $invite)
            <tr>
              <td><a href="{{url('admin/manager/'.$invite['user_id'])}}">{{$invite['user']['name']}}</a></td>
              <td>
                {{$invite['used']}}
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection
