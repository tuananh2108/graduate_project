<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Carbon\Carbon;

class DashboardController extends Controller
{
  public function dashboard()
  {
    $month = Carbon::now()->format('m');
    $year = Carbon::now()->format('Y');

    for($i = 1; $i <= 12; $i++)
    {
      $dt['Tháng '.$i] = Order::where('status', Order::DELIVERED)->whereMonth('order_date', $i)->whereYear('order_date', $year)->sum('total');
    }

    $data['data'] = $dt;
    $data['orders'] = Order::whereMonth('order_date', $month)->whereYear('order_date', $year)->count();
    $data['delivered_orders'] = Order::where('status', Order::DELIVERED)->whereMonth('order_date', $month)->whereYear('order_date', $year)->count();
    $data['revenue'] = [$month => $dt['Tháng '.(int)$month]];
    return view('admin.index', $data);
  }
}
