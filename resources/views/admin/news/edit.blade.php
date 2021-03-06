@extends('admin.master.master')

@section('content')
  <h1>Edit Article</h1>
  <hr>
  <div class="row">
    <form class="col-12 col-md-6" action="{{url('admin/news/edit/'.$news['id'])}}" method="post">
      {{ csrf_field() }}
      <div class="form-group">
        <label for="title">Title</label>
        <input id="title" class="form-control" type="text" name="title" value="{{$news['title']}}">
      </div>
      <div class="form-group">
        <label for="teaser">Teaser</label>
        <textarea class="form-control" id="teaser" name="teaser" rows="3" cols="80">{{$news['teaser']}}</textarea>
      </div>
      <div class="form-group">
        <label for="teaser-img">Teaser-Image</label>
        <input type="text" class="form-control" id="teaser-img" name="teaser-img" value="{{$news['image']}}">
      </div>
      <div class="form-group">
        <label for="body">Text (<a href="https://github.com/adam-p/markdown-here/wiki/Markdown-Cheatsheet#tables" class="text-small">Markdown Cheatsheet</a>)</label>
        <textarea class="form-control" id="body" name="body" rows="8" cols="80">{!!$news['body']!!}</textarea>
      </div>
      <div class="form-group">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="1" id="active" name="active" {{($news['active'] ? 'checked' : '')}}>
          <label class="form-check-label" for="active">
            make active
          </label>
        </div>
      </div>
      <div class="form-group">
        <label for="publish">Publish Date</label>
        <input id="publish" class="form-control" type="datetime-local" name="publish" value="{{(new \Carbon\Carbon($news['published']))->format('Y-m-d').'T'.(new \Carbon\Carbon($news['published']))->format('H:i')}}">
      </div>
      <div class="form-group">
        <button type="button" id="news-preview" name="news-preview" class="btn btn-secondary">Show preview</button>
      </div>
      <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create article" value="Save">
      </div>
    </form>

    <section class="col-12 col-md-6 my-5 my-md-0 border rounded p-3" id="preview-section">
      <p><b>Preview:</b></p>
      <div class="markdown-article">
        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
      </div>
    </section>
  </div>

@endsection
