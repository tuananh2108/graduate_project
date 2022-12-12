<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cost;

class CostController extends Controller
{
    public function index()
    {
        $cost = Cost::first();
        return view('client.cost', ["cost" => $cost]);
    }
}
