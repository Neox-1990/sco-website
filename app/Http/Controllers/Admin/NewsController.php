<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\News;
use Illuminate\Http\Request;
use erusev\Parsedown;

class NewsController extends Controller
{
    //
    public function index()
    {
        $news = News::orderBy('id', 'desc')->get();
        return view('admin.news.index', compact('news'));
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(Request $request)
    {
        $newsitem = new News;
        $newsitem->title = $request->input('title');
        $newsitem->teaser = $request->input('teaser');
        $newsitem->body = $request->input('body');
        $newsitem->image = null;
        $newsitem->active = $request->input('active', '0');
        $newsitem->published = $request->input('publish');

        $newsitem->save();
        return redirect('admin/news');
    }

    public function edit(News $news)
    {
        return view('admin.news.edit', compact('news'));
    }

    public function update(Request $request, News $news)
    {
        $news->title = $request->input('title');
        $news->teaser = $request->input('teaser');
        $news->body = $request->input('body');
        $news->image = null;
        $news->active = $request->input('active', '0');
        $news->published = $request->input('publish');

        $news->save();
        return redirect('admin/news');
    }

    public function delete(News $news)
    {
        $news->delete();
        return redirect('admin/news');
    }

    public function newspreview(Request $request)
    {
        //dd($request);
        $text = $request->input('text', '');

        return [parsedown($text)];
    }
}
