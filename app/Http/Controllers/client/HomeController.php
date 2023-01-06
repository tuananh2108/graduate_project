<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Category, News, Product};

class HomeController extends Controller
{
    public function index()
    {
        $data['news'] = News::where('status', 'show')->orderBy('created_at', 'desc')->take(5)->get();
        $data['products'] = Product::where('img', '<>', '["no-img.jpg","no-img.jpg","no-img.jpg"]')->orderBy('price')->take(8)->get();
        $data['category_800s'] = Category::where([
                                            ["categories.name", "800x800mm"],
                                            ['categories.parent', Category::where("name", "Gạch lát nền")->pluck('id')->first()]
                                        ])->first();
        $data['category_600s'] = Category::where([
                                            ["categories.name", "600x600mm"],
                                            ['categories.parent', Category::where("name", "Gạch lát nền")->pluck('id')->first()]
                                        ])->first();
        $data['category_500s'] = Category::where([
                                            ["categories.name", "500x500mm"],
                                            ['categories.parent', Category::where("name", "Gạch lát nền")->pluck('id')->first()]
                                        ])->first();
        $data['category_go_thanh'] = Category::where([
                                                ["categories.name", "150x800mm"],
                                                ['categories.parent', Category::where("name", "Gạch gỗ thanh")->pluck('id')->first()]
                                            ])->first();
        $data['category_op_400s'] = Category::where([
                                                ["categories.name", "400x800mm"],
                                                ['categories.parent', Category::where("name", "Gạch ốp")->pluck('id')->first()]
                                            ])->first();
        $data['category_op_300s'] = Category::where([
                                                ["categories.name", "300x600mm"],
                                                ['categories.parent', Category::where("name", "Gạch ốp")->pluck('id')->first()]
                                            ])->first();
        return view('client.home', $data);
    }

    public function contact()
    {
        return view('client.contact');
    }
}
