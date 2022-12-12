<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cost;
use Illuminate\Support\Str;

class CostController extends Controller
{
    public function index()
    {
        $costs = Cost::orderBy("id", "DESC")->paginate(4);
        return view('admin.cost.index', ["costs" => $costs]);
    }

    public function new()
    {
        return view('admin.cost.new');
    }

    public function create(Request $request)
    {
        $cost = new Cost;
        $cost->detail = json_encode([$request->detail, $request->detail2]);
        if($request->hasFile('cost_img'))
        {
            $file = $request->cost_img;
            $filename = 'cost-'.Str::random(3).'.'.$file->getClientOriginalExtension();
            $file->move('img/cost', $filename);
            $cost_img = $filename;
        }
        else
        {
            $cost_img = 'no-img.jpg';
        }
        if($request->hasFile('cost_img2'))
        {
            $file = $request->cost_img2;
            $filename = 'cost-'.Str::random(3).'.'.$file->getClientOriginalExtension();
            $file->move('img/cost', $filename);
            $cost_img2 = $filename;
        }
        else
        {
            $cost_img2 = 'no-img.jpg';
        }
        $cost->img = json_encode([$cost_img, $cost_img2]);
        $cost->save();

        return redirect('admin/cost')->with(["message"=> "Tạo dự án thành công!"]);
    }

    public function edit($id)
    {
        $cost = Cost::find($id);

        return view('admin.cost.edit', ['cost' => $cost]);
    }

    public function update(Request $request, $id){
        $cost = Cost::find($id);
        $cost->detail = json_encode([$request->detail, $request->detail2]);
        if($request->hasFile('cost_img'))
        {
            $file = $request->cost_img;
            $filename = 'cost-'.Str::random(3).'.'.$file->getClientOriginalExtension();
            $file->move('img/cost', $filename);
            $cost_img = $filename;
        }
        else
        {
            $cost_img = json_decode($cost->img)[0];
        }
        if($request->hasFile('cost_img2'))
        {
            $file = $request->cost_img2;
            $filename = 'cost-'.Str::random(3).'.'.$file->getClientOriginalExtension();
            $file->move('img/cost', $filename);
            $cost_img2 = $filename;
        }
        else
        {
            $cost_img2 = json_decode($cost->img)[1];
        }
        $cost->img = json_encode([$cost_img, $cost_img2]);
        $cost->save();

        return redirect('admin/cost')->with('message', 'Đã sửa dự án thành công');
    }

    public function destroy($id)
    {
        $cost = Cost::find($id);
        if ($cost) {
            $cost->delete();
            return redirect('admin/cost')->with('msg_success', 'Xóa dự án thành công');
        } else {
            return redirect('admin/cost')->withErrors(["Bản ghi không tồn tại!"]);
        }
    }
}
