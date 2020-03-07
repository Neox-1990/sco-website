<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;

class NewsController extends Controller
{
    //
    public function index()
    {
        dd('kommt noch');
    }

    public function show(News $news)
    {
        return view('news.show', compact('news'));
    }
}
