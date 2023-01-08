<?php

use Illuminate\Database\Seeder;
use App\Models\Order;

class TotalOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $orders = Order::all();
        foreach ($orders as $order) {
            $order->total = self::SumTotal($order);
            $order->save();
        }
    }

    private function SumTotal($order)
    {
        $sum = 0;
        foreach ($order->products as $product) {
            $sum += $product->price * $product->pivot->quantity;
        }

        return $sum;
    }
}
