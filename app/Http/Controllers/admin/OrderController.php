<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Requests\OrderRequest;
use App\Models\{Order, Product};
use Faker\Generator as Faker;
use Carbon\Carbon;

class OrderController extends Controller
{
    public function index()
    {
        $data['orders'] = Order::orderBy('order_date', 'DESC')->paginate(10);
        return view('admin.order.index', $data);
    }

    public function show($id)
    {
        $data['order'] = Order::find($id);
        return view('admin.order.show', $data);
    }

    public function new(Request $request)
    {
        $data['products'] = Product::sortable()->where([['status', 'available'], ['name', 'like', '%'.$request->q.'%']])->paginate(5);
        return view('admin.order.new', $data);
    }

    public function create(OrderRequest $request, Faker $faker)
    {
        $order = new Order;
        $order->order_code = $faker->unique()->regexify('[A-Z]{5}[0-9]{10}');
        $order->total = $request->order_total;
        $order->order_date = Carbon::now("Asia/Ho_Chi_Minh")->format('d/m/Y H:i:s');
        $order->save();
        
    }

    public function edit($id)
    {
        $data['order'] = Order::find($id);
        return view('admin.order.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $data['order'] = Order::find($id);
        return view('admin.order.edit', $data);
    }

    public function destroy($id)
    {
        Order::destroy($id);
        return redirect()->back()->with('message', "Xóa bản ghi đơn đặt hàng thành công");
    }
}
