@extends('admin.master.master')

@section('content')
  <h1>PQ-Tool</h1>
  <hr>
  <div class="d-flex flex-row flex-nowrap">
  @foreach ($driver_array as $drivername => $darray)

  <div class="card mx-2">
    <div class="card-header">
      <h3>{{$drivername}}</h3>
    </div>
    <div class="card-body d-flex flex-column">
      <table class="table">
        @for ($i = 0; $i < count($darray['run_starts']); $i++)
        <tr>
          @if ($darray['run_times'][$i] == $darray['final_time'])
          <td><b>Run {{$i+1}}: laps {{$darray['run_starts'][$i]}} - {{$darray['run_starts'][$i] + 9}}</b></td>
          <td><b>{{$darray['run_times'][$i]}}s</b></td>
          @else
          <td>Run {{$i+1}}: laps {{$darray['run_starts'][$i]}} - {{$darray['run_starts'][$i] + 9}}</td>
          <td>{{$darray['run_times'][$i]}}s</td>
          @endif
        </tr>
        @endfor
      </table>
      <h2 class="mt-auto">Best: {{str_replace('.',',',$darray['final_time'])}}</h2>
    </div>
  </div>
  @endforeach
</div>
<a href="{{url('admin/tools/pq')}}" class="btn btn-primary mt-5">Back</a>
@endsection
