@extends('master.master')

@section('main')
<div class="row mx-0">
  <div class="col-12">
    <h1>Downloads</h1>
    <div class="row">
      @foreach ($downloads as $key => $download)
      <div class="col-12 col-lg-6">
        <div class="card">
          <div class="card-header">
            <h3>{{$download['name']}}</h3>
          </div>
          <button class="btn btn-primary btn-block" data-toggle="collapse" data-target="#download{{$key}}" type="button" name="button">Open / Close</button>
          <div id="download{{$key}}" class="collapse">
            @if (!is_null($download['readme']))
            <div class="card-body">
              <h5>Readme:</h5>
              {!! $download['readme'] !!}
            </div>
            @endif
            <ul class="list-group list-group-flush">
              @foreach ($download['subfiles'] as $file)
              <li class="list-group-item"><a class="" href="{{url('/download_resources/'.$file)}}" download>{{$getFilename($file)}}</a></li>
              @endforeach
            </ul>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>
@endsection
