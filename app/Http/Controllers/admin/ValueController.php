<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\{EditValueRequest};
use App\Models\Value;

class ValueController extends Controller
{
    public function create(request $request)
    {
        $value = new Value;
        $value->attribute_id = $request->attribute_id;
        $value->value = $request->value;
        $value->save();

        return redirect()->back()->with('message', 'Đã thêm giá trị thuộc tính!');
    }

    public function edit($id)
    {
        $data['value'] = Value::find($id);

        return view('admin.value.edit', $data);
    }

    public function update(EditValueRequest $request, $id)
    {
        $value = Value::find($id);
        $value->value = $request->name;
        $value->save();

        return redirect()->back()->with('message', 'Đã sửa thành công');
    }

    public function destroy($id)
    {
        Value::destroy($id);

        return redirect()->back()->with('message', 'Đã xoá giá trị trong thuộc tính thành công');
    }
}
