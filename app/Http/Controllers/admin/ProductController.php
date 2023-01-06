<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\{AddProductRequest, EditProductRequest};
use App\models\{Product, Category, Attribute, Variant};
use Illuminate\Support\{Arr, Str};

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $data['products'] = Product::sortable()->where("product_code", "like", "%".$request->q."%")
                                    ->orWhere("products.name", "like", "%".$request->q."%")
                                    ->orWhere("price", "like", "%".$request->q."%")
                                    ->orderBy("id", "DESC")->paginate(4);
        return view('admin.product.index', $data);
    }

    public function new()
    {
        $data['categories'] = Category::all();
        $data['attributes'] = Attribute::all();

        return view('admin.product.new', $data);
    }

    public function create(AddProductRequest $request)
    {
        if (!isset($request->value)){
            return redirect()->back()->with('message', 'Bạn chưa thêm thuộc tính cho sản phẩm!');
        }

        if ($request->has('product_code')) {
            $check_product_code = Product::where('product_code', $request->product_code)->exists();
            if ($check_product_code == true) {
                return redirect()->back()->with('message', 'Mã sản phẩm đã tồn tại!');
            }
        }

        $product = new Product;
        $product->product_code = $request->product_code;
        $product->name = $request->product_name;
        $product->price = $request->product_price;
        $product->info = json_encode([$request->info, $request->info1, $request->info2, $request->info3, $request->info4, $request->info5, $request->info6]);
        $product->description = $request->description;
        if($request->hasFile('product_img'))
        {
            $file = $request->product_img;
            $filename = $request->product_code.'-'.Str::random(5).'.'.$file->getClientOriginalExtension();
            $file->move('img/product', $filename);
            $product_img1 = $filename;
        }
        else
        {
            $product_img1 = 'no-img.jpg';
        }

        // ảnh 2
        if($request->hasFile('product_img2'))
        {
            $file = $request->product_img2;
            $filename = $request->product_code.'-'.Str::random(5).'.'.$file->getClientOriginalExtension();
            $file->move('img/product', $filename);
            $product_img2 = $filename;
        }
        else
        {
            $product_img2 = 'no-img.jpg';
        }

        // ảnh 3
        if($request->hasFile('product_img3'))
        {
            $file = $request->product_img3;
            $filename = $request->product_code.'-'.Str::random(5).'.'.$file->getClientOriginalExtension();
            $file->move('img/product', $filename);
            $product_img3 = $filename;
        }
        else
        {
            $product_img3 = 'no-img.jpg';
        }
        $product->img = json_encode([$product_img1, $product_img2, $product_img3]);

        $product->status = $request->product_status;
        $product->category_id = $request->category;
        $product->save();

        //add values_product
        if(isset($request->value)) $product->values()->Attach(Arr::collapse($request->value));
        else return redirect()->back()->with('error-message', 'Chưa thêm giá trị thuộc tính');

        return redirect('admin/product')->with('message', 'Đã thêm sản phẩm mới thành công!');;
    }

    public function edit($id)
    {
        $data['product'] = Product::find($id);
        $data['categories'] = Category::all();
        $data['attributes'] = Attribute::all();

        return view('admin.product.edit', $data); 
    }

    public function update(EditProductRequest $request, $id)
    {
        $product = Product::find($id);

        if ($request->has('product_code')) {
            $product_code = $product->product_code;
            $check_product_code = Product::whereNotIn('product_code', [$product_code])->where('product_code', $request->product_code)->exists();
            if ($check_product_code == true) {
                return redirect()->back()->with('message', 'Mã sản phẩm đã tồn tại!');
            }
        }

        $product->product_code = $request->product_code;
        $product->name = $request->product_name;
        $product->price = $request->product_price;

        if($request->hasFile('product_img'))
        {
            $file = $request->product_img;
            $filename = $request->product_code.'-'.Str::random(5).'.'.$file->getClientOriginalExtension();
            $file->move('img/product', $filename);
            $product_img1 = $filename;
        }
        else
        {
            $product_img1 = json_decode($product->img)[0];
        }

        // ảnh 2
        if($request->hasFile('product_img2'))
        {
            $file = $request->product_img2;
            $filename = $request->product_code.'-'.Str::random(5).'.'.$file->getClientOriginalExtension();
            $file->move('img/product', $filename);
            $product_img2 = $filename;
        }
        else
        {
            $product_img2 = json_decode($product->img)[1];
        }

        // ảnh 3
        if($request->hasFile('product_img3'))
        {
            $file = $request->product_img3;
            $filename = $request->product_code.'-'.Str::random(5).'.'.$file->getClientOriginalExtension();
            $file->move('img/product', $filename);
            $product_img3 = $filename;
        }
        else
        {
            $product_img3 = json_decode($product->img)[2];
        }
        $product->img = json_encode([$product_img1, $product_img2, $product_img3]);

        $product->category_id = $request->category;
        $product->status = $request->product_status;
        $product->info = json_encode([$request->info, $request->info1, $request->info2, $request->info3, $request->info4, $request->info5, $request->info6]);
        $product->description = $request->description;

        $product->save();

        //add values_product
        if(isset($request->value)) $product->values()->Sync(Arr::collapse($request->value));
        else return redirect()->back()->with('error-message', 'Chưa thêm giá trị thuộc tính');

        return redirect('admin/product')->with('message', 'Đã sửa sản phẩm thành công!');
    }

    public function destroy($id)
    {
        Product::destroy($id);

        return redirect()->back()->with('message', 'Đã xóa thành công!');
    }
}
