@extends('admin.master.master')

@section('content')
  <h1>News</h1>
  <hr>
  <a href="{{url('admin/news/create')}}" class="btn btn-success">+ New Article</a>
  <hr>
  <table class="table w-100">
    <tr>
      <th>Title</th>
      <th>Publishdate</th>
      <th>Active</th>
      <th colspan="2">Options</th>
    </tr>
    @foreach ($news as $new)
    <tr>
      <td>{{$new['title']}}</td>
      <td>{{$new['published']}}</td>
      <td>{{$new['active']}}</td>
      <td><a class="btn btn-warning" href="{{url('/admin/news/edit/'.$new['id'])}}">edit</a></td>
      <td><a class="btn btn-danger" href="{{url('/admin/news/delete/'.$new['id'])}}">delete</a></td>
    </tr>
    @endforeach
  </table>
@endsection
