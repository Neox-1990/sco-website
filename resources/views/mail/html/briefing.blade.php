@extends('mail.mastermail')

@section('body')
  <h1>{{$input['salutation']}}</h1>
  <p>{{$input['text']}}</p>
  <div class="link">
    <a href="{{$input['link']}}">Briefing PDF</a>
  </div>
  <p>{!! nl2br($input['farewell']) !!}</p>
@endsection
