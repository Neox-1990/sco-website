
@foreach ($teams as $classname => $class)
  <h2>{{$classname}}</h2>
  <table>
  @foreach ($class as $team)
    <tr>
      <td><b>#{{$team->number}} {{$team->name}}</b></td>
    </tr>
    @foreach ($team->drivers as $driver)
      <tr>
        <td>{{$driver->name}}</td>
      </tr>
    @endforeach
  @endforeach
  </table>
@endforeach
