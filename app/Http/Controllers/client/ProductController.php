<?php

namespace App\Http\Controllers\client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{Attribute, Category, Product, Value};

class ProductController extends Controller
{
    public function index()
    {
        $data['products'] = Product::where('img', '<>', '["no-img.jpg","no-img.jpg","no-img.jpg"]')->orderBy('price')->paginate(12);
        $data['categories'] = Category::all();
        $data['attribute'] = Attribute::where('name', 'Hãng sản xuất')->first();

        return view('client.product.index', $data);
    }

    public function show($id)
    {
        $data['product'] = Product::find($id);
        return view('client.product.show', $data);
    }

    public function filterByCategory(Request $request, $category_id)
    {
        $data['products'] = Product::where([['img', '<>', '["no-img.jpg","no-img.jpg","no-img.jpg"]'], ["category_id", $category_id]])->orderBy('price')->paginate(12);
        $data['attribute'] = Attribute::where('name', 'Hãng sản xuất')->first();
        $data['categories'] = Category::all();

        return view('client.product.index', $data);
    }

    public function filterByValue(Request $request, $value_id)
    {
        $data['products'] = Value::find($value_id)->products()->where('img', '<>', '["no-img.jpg","no-img.jpg","no-img.jpg"]')->orderBy('price')->paginate(12);
        $data['attribute'] = Attribute::where('name', 'Hãng sản xuất')->first();
        $data['categories'] = Category::all();

        return view('client.product.index', $data);
    }
}
