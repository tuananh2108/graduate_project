<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Construction;

class ConstructionController extends Controller
{
    public function index()
    {
        $constructions = Construction::orderBy("id", "DESC")->paginate(8);
        return view('client.construction.index', ["constructions" => $constructions]);
    }

    public function show($id)
    {
        $construction = Construction::find($id);
        return view('client.construction.show', ["construction" => $construction]);
    }
}
