@extends('master.master')

@section('main')
<div class="row">
  <div class="col-12" style="padding-bottom:2rem;">
    <h1>Teams</h1>
    @include('master.formerrors')
    <form action="{{url('teams/')}}" method="post" class="mb-3">
      {{csrf_field()}}
      <div class="input-group">
        <div class="input-group-prepend">
          <button type="submit" id="team-search-button" class="input-group-addon btn btn-primary" name="search"><i class="fas fa-search" aria-hidden="true"></i></button>
        </div>
        <input type="text" class="form-control" placeholder="Search Team by iRacing Team ID or name" aria-describedby="basic-addon1" name="searchinput">
      </div>
    </form>
    <form action="{{url('driver/')}}" method="post">
      {{csrf_field()}}
      <div class="input-group">
        <div class="input-group-prepend">
          <button type="submit" id="driver-search-button" class="input-group-addon btn btn-primary" name="search"><i class="fas fa-search" aria-hidden="true"></i></button>
        </div>
        <input type="text" class="form-control" placeholder="Search Driver by iRacing ID or name" aria-describedby="basic-addon1" name="searchinput">
      </div>
    </form>
    @foreach ($teams as $classname => $class)
      <div class="team-overview-class">
        <h2 class="position-relative"><span class="badge badge-default badge-{{$classname}}">{{$classname}}</span>
        <span class="team_summary">
          <span class="team_summary_toggler mr-3"><i class="fas fa-caret-down"></i></span>
          <span class="team_summary_sub text-danger"><span class="team_summary_title">Pending:&nbsp;</span>{{$class['pending']->count()}}</span><span class="team_summary_sep">&nbsp;</span>
          <span class="team_summary_sub text-primary"><span class="team_summary_title">Reviewed:&nbsp;</span>{{$class['reviewed']->count()}}</span><span class="team_summary_sep">&nbsp;</span>
          <span class="team_summary_sub text-warning"><span class="team_summary_title">Waitinglist:&nbsp;</span>{{$class['waiting']->count()}}</span><span class="team_summary_sep">&nbsp;</span>
          <span class="team_summary_sub text-info"><span class="team_summary_title">Qualified:&nbsp;</span>{{$class['qualified']->count()}}</span><span class="team_summary_sep">&nbsp;</span>
          <span class="team_summary_sub text-success"><span class="team_summary_title">Confirmed:&nbsp;</span>{{$class['confirmed']->count()}}</span><span class="team_summary_sep">&nbsp;</span>
          <span class="team_summary_sub">&Sigma; {{$class['pending']->count()+$class['reviewed']->count()+$class['waiting']->count()+$class['qualified']->count()+$class['confirmed']->count()}}/{{config('constants.class_limits')[config('constants.current_season')][$classname]}}</span>
        </span>
        </h2>
        <div class="table-responsive">
          <table id="teams-table" class="table table-hover table-bordered">
            <thead class="thead-default">
              <tr>
                <th class="badge-{{$classname}} sco-table-sort" data-sort-content="numeric" data-sort-dir="asc">#</th>
                <th class="badge-{{$classname}} sco-table-sort" data-sort-content="text" data-sort-dir="asc">Name</th>
                <th class="badge-{{$classname}} sco-table-sort" data-sort-content="text" data-sort-dir="asc">Car</th>
                <th class="badge-{{$classname}} sco-table-sort" data-sort-content="text" data-sort-dir="asc">Status</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($class['confirmed'] as $team)
                <tr>
                  <td class="text-center">{{$team['number']}}</td>
                  <td>
                    <div class="d-flex justify-content-between">
                      <a href="/teams/{{$team['id']}}">{{$team['name']}}</a>
                      <span class="ml-auto">
                        @if(!empty($team['website']))
                        <a class="mr-3" href="{{$team['website']}}"><i class="fas fa-globe"></i></a>
                        @endif
                        @if(!empty($team['twitter']))
                        <a class="mr-3" href="{{$team['twitter']}}"><i class="fab fa-twitter"></i></a>
                        @endif
                        @if(!empty($team['facebook']))
                        <a class="mr-3" href="{{$team['facebook']}}"><i class="fab fa-facebook"></i></a>
                        @endif
                      </span>
                    </div>
                  </td>
                  <td>{{config('constants.car_names')[$team['car']]}}</td>
                  <td class="text-success">{{config('constants.status_names')[$team['status']]}}</td>
                </tr>
              @endforeach
              @foreach ($class['qualified'] as $team)
                <tr>
                  <td class="text-center">{{$team['number']}}</td>
                  <td>
                    <div class="d-flex justify-content-between">
                      <a href="/teams/{{$team['id']}}">{{$team['name']}}</a>
                      <span class="ml-auto">
                        @if(!empty($team['website']))
                        <a class="mr-3" href="{{$team['website']}}"><i class="fas fa-globe"></i></a>
                        @endif
                        @if(!empty($team['twitter']))
                        <a class="mr-3" href="{{$team['twitter']}}"><i class="fab fa-twitter"></i></a>
                        @endif
                        @if(!empty($team['facebook']))
                        <a class="mr-3" href="{{$team['facebook']}}"><i class="fab fa-facebook"></i></a>
                        @endif
                      </span>
                    </div>
                  </td>
                  <td>{{config('constants.car_names')[$team['car']]}}</td>
                  <td class="text-info">{{config('constants.status_names')[$team['status']]}}</td>
                </tr>
              @endforeach
              @foreach ($class['waiting'] as $team)
                <tr>
                  <td class="text-center">{{$team['number']}}</td>
                  <td>
                    <div class="d-flex justify-content-between">
                      <a href="/teams/{{$team['id']}}">{{$team['name']}}</a>
                      <span class="ml-auto">
                        @if(!empty($team['website']))
                        <a class="mr-3" href="{{$team['website']}}"><i class="fas fa-globe"></i></a>
                        @endif
                        @if(!empty($team['twitter']))
                        <a class="mr-3" href="{{$team['twitter']}}"><i class="fab fa-twitter"></i></a>
                        @endif
                        @if(!empty($team['facebook']))
                        <a class="mr-3" href="{{$team['facebook']}}"><i class="fab fa-facebook"></i></a>
                        @endif
                      </span>
                    </div>
                  </td>
                  <td>{{config('constants.car_names')[$team['car']]}}</td>
                  <td class="text-warning">{{config('constants.status_names')[$team['status']]}}</td>
                </tr>
              @endforeach
              @foreach ($class['reviewed'] as $team)
                <tr>
                  <td class="text-center">{{$team['number']}}</td>
                  <td>
                    <div class="d-flex justify-content-between">
                      <a href="/teams/{{$team['id']}}">{{$team['name']}}</a>
                      <span class="ml-auto">
                        @if(!empty($team['website']))
                        <a class="mr-3" href="{{$team['website']}}"><i class="fas fa-globe"></i></a>
                        @endif
                        @if(!empty($team['twitter']))
                        <a class="mr-3" href="{{$team['twitter']}}"><i class="fab fa-twitter"></i></a>
                        @endif
                        @if(!empty($team['facebook']))
                        <a class="mr-3" href="{{$team['facebook']}}"><i class="fab fa-facebook"></i></a>
                        @endif
                      </span>
                    </div>
                  </td>
                  <td>{{config('constants.car_names')[$team['car']]}}</td>
                  <td class="text-primary">{{config('constants.status_names')[$team['status']]}}</td>
                </tr>
              @endforeach
              @foreach ($class['pending'] as $team)
                <tr>
                  <td class="text-center">{{$team['number']}}</td>
                  <td>
                    <div class="d-flex justify-content-between">
                      <a href="/teams/{{$team['id']}}">{{$team['name']}}</a>
                      <span class="ml-auto">
                        @if(!empty($team['website']))
                        <a class="mr-3" href="{{$team['website']}}"><i class="fas fa-globe"></i></a>
                        @endif
                        @if(!empty($team['twitter']))
                        <a class="mr-3" href="{{$team['twitter']}}"><i class="fab fa-twitter"></i></a>
                        @endif
                        @if(!empty($team['facebook']))
                        <a class="mr-3" href="{{$team['facebook']}}"><i class="fab fa-facebook"></i></a>
                        @endif
                      </span>
                    </div>
                  </td>
                  <td>{{config('constants.car_names')[$team['car']]}}</td>
                  <td class="text-danger">{{config('constants.status_names')[$team['status']]}}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    @endforeach
  </div>
</div>
@endsection
@section('additionalFooter')
<script type="text/javascript">
  $(function(){
    $('.team_summary_toggler').on('click', function(){
      $(this).empty();
      if($(this).parent().hasClass('team_summary_open')){
        $(this).append('<i class="fas fa-caret-down"></i>')
      }else{
        $(this).append('<i class="fas fa-caret-up"></i>')
      }
      $(this).parent().toggleClass('team_summary_open');
    });
  });
</script>
@endsection
