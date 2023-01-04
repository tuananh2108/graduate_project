<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Construction;
use Illuminate\Support\Str;

class ConstructionController extends Controller
{
    public function index(Request $request)
    {
        $constructions = Construction::sortable()->where("name", "like", "%".$request->q."%")
                                     ->orWhere("detail", "like", "%".$request->q."%")
                                     ->orderBy("id","DESC")->paginate(4);

        return view('admin.construction.index', ["constructions" => $constructions]);
    }

    public function new()
    {
        return view('admin.construction.new');
    }

    public function create(Request $request)
    {
        $construction = new Construction;
        $construction->name = $request->name;
        $construction->detail = json_encode([$request->detail, $request->detail2]);
        if($request->hasFile('construction_img'))
        {
            $file = $request->construction_img;
            $filename = 'construction-'.Str::random(10).'.'.$file->getClientOriginalExtension();
            $file->move('img/construction', $filename);
            $construction_img = $filename;
        }
        else
        {
            $construction_img = 'no-img.jpg';
        }
        if($request->hasFile('construction_img2'))
        {
            $file = $request->construction_img2;
            $filename = 'construction-'.Str::random(10).'.'.$file->getClientOriginalExtension();
            $file->move('img/construction', $filename);
            $construction_img2 = $filename;
        }
        else
        {
            $construction_img2 = 'no-img.jpg';
        }
        $construction->img = json_encode([$construction_img, $construction_img2]);
        $construction->save();

        return redirect('admin/construction')->with(["message" => "Tạo dự án thành công!"]);
    }

    public function edit($id)
    {
        $construction = Construction::find($id);

        return view('admin.construction.edit', ['construction' => $construction]);
    }

    public function update(Request $request, $id){
        $construction = Construction::find($id);
        $construction->name = $request->name;
        $construction->detail = json_encode([$request->detail, $request->detail2]);
        if($request->hasFile('construction_img'))
        {
            $file = $request->construction_img;
            $filename = 'construction-'.Str::random(10).'.'.$file->getClientOriginalExtension();
            $file->move('img/construction', $filename);
            $construction_img = $filename;
        }
        else
        {
            $construction_img = json_decode($construction->img)[0];
        }
        if($request->hasFile('construction_img2'))
        {
            $file = $request->construction_img2;
            $filename = 'construction-'.Str::random(10).'.'.$file->getClientOriginalExtension();
            $file->move('img/construction', $filename);
            $construction_img2 = $filename;
        }
        else
        {
            $construction_img2 = json_decode($construction->img)[1];
        }
        $construction->img = json_encode([$construction_img, $construction_img2]);
        $construction->save();

        return redirect('admin/construction')->with('message', 'Đã sửa dự án thành công');
    }

    public function destroy($id)
    {
        $construction = Construction::find($id);
        if ($construction) {
            $construction->delete();
            return redirect('admin/construction')->with('msg_success', 'Xóa dự án thành công');
        } else {
            return redirect('admin/construction')->withErrors(["Bản ghi không tồn tại!"]);
        }
    }
}
