<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Attribute, Category, Construction, Cost, Product, Project};
use Cart;

class ProductByCategoryController extends Controller
{
    public function GetKey(Request $request, $category_id)
    {
        $data['products'] = Product::where([['img', '<>', '["no-img.jpg","no-img.jpg","no-img.jpg"]'], ["category_id", $category_id]])->orderBy('price')->paginate(12);
        $data['categories'] = Category::all();

        return view('client.product_by_category', $data);
    }
}
