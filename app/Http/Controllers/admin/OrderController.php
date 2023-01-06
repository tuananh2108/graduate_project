<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Requests\OrderRequest;
use App\Models\{Order, Product, User};
use Faker\Generator as Faker;
use Carbon\Carbon;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $data['orders'] = Order::sortable()->select("orders.id", "orders.total", "orders.status", "u.name as user_name")
                                ->join('users as u', 'u.id', '=', 'orders.user_id')
                                ->join('product_order', 'orders.id', '=', 'product_order.order_id')
                                ->join('products', 'products.id', '=', 'product_order.product_id')
                                ->where("order_code", "like", "%".$request->q."%")
                                ->orWhere("u.name", "like", "%".$request->q."%")
                                ->orWhere("products.name", "like", "%".$request->q."%")
                                ->orderBy('order_date', 'DESC')
                                ->groupBy("orders.id", "orders.total", "orders.status", "user_name")
                                ->paginate(10);
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

    public function create(Request $request, Faker $faker)
    {
        $order = new Order;
        $order->order_code = $faker->unique()->regexify('[A-Z]{5}[0-9]{10}');
        $order->total = $request->order_total;
        $order->order_date = Carbon::now("Asia/Ho_Chi_Minh")->format('d/m/Y H:i:s');

        // save customer info into user table
        $user = new User;
        if(User::where('email', $request->email)->first()) $user = User::where('email', $request->email)->first();
        else $user->email = $request->email;
        $user->name = $request->name;
        $user->phone_number = $request->phone_number;
        $user->address = $request->address;
        $user->save();

        $order->user_id = $user->id;

        $order->save();

        // insert record into product_order table
        $carts = json_decode($request->list_product_order);
        foreach ($carts as $cart) {
            $order->products()->attach($cart->product_id, ['quantity' => $cart->quantity]);
        }

        return redirect('admin/order')->with('message', 'Đã tạo hóa đơn thành công!');
    }

    public function edit(Request $request, $id)
    {
        $data['order'] = Order::find($id);
        $data['products'] = Product::sortable()->where([['status', 'available'], ['name', 'like', '%'.$request->q.'%']])->paginate(5);
        return view('admin.order.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $order = Order::find($id);
        $order->total = $request->order_total;
        $order->status = $request->status;
        $order->save();

        // insert record into product_order table
        $carts = json_decode($request->list_product_order);
        foreach ($carts as $cart) {
            $product_order[$cart->product_id] = ['quantity' => $cart->quantity];
        }
        $order->products()->sync($product_order, false);

        return redirect('admin/order')->with('message', 'Cập nhật hóa đơn thành công!');
    }

    public function destroy($id)
    {
        Order::destroy($id);
        return redirect()->back()->with('message', "Xóa bản ghi đơn đặt hàng thành công");
    }
}
