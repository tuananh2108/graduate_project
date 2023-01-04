<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $news = News::sortable()->where("title", "like", "%".$request->q."%")
                                     ->orWhere("content", "like", "%".$request->q."%")
                                     ->paginate(4);

        return view('admin.news.index', ["news" => $news]);
    }

    public function new()
    {
        return view('admin.news.new', ["news" => News::all()]);
    }

    public function create(Request $request)
    {
        $news = new News;
        $news->title = $request->title;
        $news->content = json_encode([$request->content, $request->content2]);

        if($request->hasFile('news_img'))
        {
            $file = $request->news_img;
            $filename = 'news-'.Str::random(10).'.'.$file->getClientOriginalExtension();
            $file->move('img/news', $filename);
            $news_img = $filename;
        }
        else
        {
            $news_img = 'no-img.jpg';
        }

        if($request->hasFile('news_img2'))
        {
            $file = $request->news_img2;
            $filename = 'news-'.Str::random(10).'.'.$file->getClientOriginalExtension();
            $file->move('img/news', $filename);
            $news_img2 = $filename;
        }
        else
        {
            $news_img2 = 'no-img.jpg';
        }
        $news->img = json_encode([$news_img, $news_img2]);
        $news->save();

        return redirect('admin/news')->with(["message" => "Tạo tin tức thành công!"]);
    }

    public function edit($id)
    {
        $news = News::find($id);

        return view('admin.news.edit', ['news' => $news]);
    }

    public function update(Request $request, $id)
    {
        $news = News::find($id);
        $news->title = $request->title;
        $news->content = json_encode([$request->content, $request->content2]);

        if($request->hasFile('news_img'))
        {
            $file = $request->news_img;
            $filename = 'new-'.Str::random(10).'.'.$file->getClientOriginalExtension();
            $file->move('img/news', $filename);
            $news_img = $filename;
        }
        else
        {
            $news_img = json_decode($news->img)[0];
        }

        if($request->hasFile('news_img2'))
        {
            $file = $request->news_img2;
            $filename = 'news-'.Str::random(10).'.'.$file->getClientOriginalExtension();
            $file->move('img/news', $filename);
            $news_img2 = $filename;
        }
        else
        {
            $news_img2 = json_decode($news->img)[1];
        }
        $news->img = json_encode([$news_img, $news_img2]);
        $news->save();

        return redirect('admin/news')->with('message', 'Đã sửa tin tức thành công!');
    }

    public function destroy($id)
    {
        $news = News::find($id);
        if ($news)
        {
            $news->delete();
            return redirect('admin/news')->with('msg_success', 'Xóa tin tức thành công!');
        }
        else
        {
            return redirect('admin/news')->withErrors(["Bản ghi không tồn tại!"]);
        }
    }
}
