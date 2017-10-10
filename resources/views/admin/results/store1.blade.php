@extends('admin.master.master')

@section('content')
  <h1>Results</h1>
  <hr>
  <form class="" action="{{url('admin/results/create/'.$round['id'])}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    @foreach ($grid->gridClasses as $className => $resultArray)
      <h3>{{$className}}</h3>
      <table class="table">
      <tr>
        <td>pos</td>
        <td>team</td>
        <td>laps</td>
        <td>incs</td>
        <td>finish</td>
      </tr>
      @foreach ($resultArray as $key => $result)
        <tr>
          <td>
            <select class="" name="{{$className}}[number][{{$key}}]">
              @for ($i=1; $i < 25; $i++)
                <option value="{{$i}}" {{($i==$result->getClassPos())?'selected':''}}>{{$i}}.</option>
              @endfor
            </select>
          </td>
          <td>
            <select class="" name="{{$className}}[team][{{$key}}]">
              <option value="0" {{$result->getTeam()==null?'selected':''}}>unknown</option>
              @foreach ($teams[$className] as $team)
                <option value="{{$team->id}}" {{($result->getTeam()!=null && $result->getTeam()->id == $team->id)?'selected':''}}>#{{$team->number}} {{$team->name}} (id:{{$team->id}})</option>
              @endforeach
            </select>
          </td>
          <td><input type="text" name="{{$className}}[laps][{{$key}}]" value="{{$result->getLaps()}}"></td>
          <td><input type="text" name="{{$className}}[incs][{{$key}}]" value="{{$result->getIncs()}}"></td>
          <td>
            <select class="" name="{{$className}}[finish][{{$key}}]">
              @foreach (config('constants.out_status') as $status => $name)
                <option value="{{$status}}" {{$result->getOut()==$status?'selected':''}}>{{$name}}</option>
              @endforeach
          </td>
        </tr>
      @endforeach
      </table>
    @endforeach
    <div class="form-group">
      <input class="btn btn-primary" type="submit" name="editedResults" value="create results">
    </div>
  </form>
@endsection
