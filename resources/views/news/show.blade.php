@extends('master.master')

@section('main')

<div class="row mx-0 w-100">
  <div class="col-12 px-0 news-detail">
    <img class="news-header-image" src="{{$news->image}}" alt="">
    <h1>{{$news->title}}</h1>
    <article class="markdown-article">
      {!!parsedown($news->body)!!}
    </article>
  </div>
</div>

@endsection
