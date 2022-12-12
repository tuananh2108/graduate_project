<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Product, Variant};

class VariantController extends Controller
{
    public function new($product_id)
    {
        $data['product'] = Product::find($product_id);

        return view('admin.variant.new', $data);
    }

    public function create(request $request, $product_id)
    {
        foreach($request->price as $key => $value)
        {
            $variant = Variant::find($key);
            $variant->price = $value;
            $variant->save();
        }

        return redirect('admin/product')->with('message', 'Đã thêm sản phẩm!');
    }

    public function edit($product_id)
    {
        $data['product'] = Product::find($product_id);

        return view('admin.variant.edit', $data);
    }

    public function update(request $request, $product_id)
    {
        foreach($request->price as $key => $value)
        {
            $variant = Variant::find($key);
            $variant->price=$value;
            $variant->save();
        }

        return redirect()->back()->with('message', 'Đã sửa biến thể thành công!');
    }
}
