@extends('master.master')

@section('main')
<div class="row mx-0 w-100">
  <h1 class="col-12">All News</h1>
  <section class="col-12" id="all-news-list">
    @foreach($news as $n)
    <div class="row border-top py-3">
      <div class="col-12 col-md-6">
        <img class="img-fluid" src="{{$n->image}}" alt="">
      </div>
      <div class="col-12 col-md-6 p-3">
        <h2>{{$n->title}}</h2>
        <p class="text-muted published">Published: {{(new Carbon\Carbon($n->published))->toCookieString()}}</p>
        <p>{{$n->teaser}}</p>
        <a class="btn btn-primary btn-block" href="{{url('/news/'.$n->id)}}">Read</a>
      </div>
    </div>
    @endforeach
  </section>
</div>
@endsection
