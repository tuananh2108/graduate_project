<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::orderBy("id", "DESC")->paginate(8);
        return view('client.news.index', ["news" => $news]);
    }

    public function show($id)
    {
        $news = News::find($id);
        return view('client.news.show', ["news" => $news]);
    }
}
