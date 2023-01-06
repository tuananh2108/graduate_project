<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\{AddAttributeRequest, EditAttributeRequest};
use App\Models\Attribute;

class AttributeController extends Controller
{
    public function index()
    {
        $data['attributes'] = Attribute::all();
       return view('admin.attribute.index', $data);
    }

    public function create(AddAttributeRequest $request)
    {
        $attribute = new Attribute;
        $attribute->name = $request->attribute_name;
        $attribute->save();

        return redirect()->back()->with('message', 'Đã thêm thuộc tính: '.$request->attribute_name);
    }

    public function edit($id)
    {
        $data['attribute'] = Attribute::find($id);

        return view('admin.attribute.edit', $data);
    }

    public function update(EditAttributeRequest $request, $id)
    {
        $attribute = Attribute::find($id);
        $attribute->name = $request->name;
        $attribute->save();

        return redirect('admin/product/attribute')->with('message', 'Đã sửa thành công');
    }

    public function destroy($id)
    {
        Attribute::destroy($id);
        return redirect()->back()->with('message', 'Đã xoá thành công');
    }
}
