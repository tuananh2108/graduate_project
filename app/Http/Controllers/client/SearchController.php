<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Attribute, Category, Product};

class SearchController extends Controller
{
    public function getKey(Request $request)
    {
        if($request->start)
        {
            $data['products'] = Product::where('img','<>','no-img.jpg')->whereBetween('price', [$request->start, $request->end])->orderBy('price')->paginate(12);
        }
        else if($request->product)
        {
            $data['products'] = Product::where([['name', 'like', '%'.$request->product.'%'], ['img','<>','no-img.jpg']])->orderBy('price')->paginate(12);
        }
        else
        {
            $data['products'] = Product::where('img','<>','no-img.jpg')->orderBy('price')->paginate(12);
        }
        $data['attribute'] = Attribute::where('name', 'Hãng sản xuất')->first();
        $data['categories'] = Category::all();

        return view('client.product.index', $data);
    }
}
