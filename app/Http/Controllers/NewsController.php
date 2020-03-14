<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use Carbon\Carbon;

class NewsController extends Controller
{
    //
    public function index()
    {
        $now = (new Carbon())->toDateTimeString();
        $news = News::where([
        ['published', '<=', $now],
        ['active', '=', 1]
      ])->orderby('published', 'DESC')->get();
        return view('news.index', compact('news'));
    }

    public function show(News $news)
    {
        if ((auth()->check() && auth()->user()->isAdmin) || ((new Carbon()) >= (new Carbon($news->published)) && $news->active)) {
            return view('news.show', compact('news'));
        } else {
            return redirect('/news');
        }
    }
}
