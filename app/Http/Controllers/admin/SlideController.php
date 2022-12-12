<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slide;
use Illuminate\Support\Str;

class SlideController extends Controller
{
    public function index(Request $request)
    {
        $slides = Slide::orderBy("id", "DESC")->paginate(4);
        return view('admin.slide.index', ["slides" => $slides]);
    }

    public function new()
    {
        return view('admin.slide.new');
    }

    public function create(Request $request)
    {
        $slide = new Slide;
        if($request->hasFile('slide_img'))
        {
            $file = $request->slide_img;
            $filename = 'slide-'.Str::random(3).'.'.$file->getClientOriginalExtension();
            $file->move('common/img/slide', $filename);
            $slide->img = $filename;
        }
        else
        {
            $slide->img='no-img.jpg';
        }
        $slide->status = $request->status;
        $slide->save();

        return redirect('admin/slide')->with(["message" => "Tạo sldie thành công!"]);
    }

    public function edit($id)
    {
        $slide = Slide::find($id);
        return view('admin.slide.edit', ['slide' => $slide]);
    }

    public function update(Request $request, $id){
        $slide = Slide::find($id);
        if($request->hasFile('slide_img'))
        {
            $file = $request->slide_img;
            $filename = 'slide-'.Str::random(3).'.'.$file->getClientOriginalExtension();
            $file->move('common/img/slide', $filename);
            $slide->img = $filename;
        }
        $slide->status = $request->status;
        $slide->save();

        return redirect('admin/slide')->with('message', 'Đã sửa slide thành công');
    }

    public function destroy($id)
    {
        $slide = Slide::find($id);
        if ($slide) {
            $slide->delete();
            return redirect('admin/slide')->with('msg_success', 'Xóa slide thành công');
        } else {
            return redirect('admin/slide')->withErrors(["Bản ghi không tồn tại!"]);
        }
    }
}
