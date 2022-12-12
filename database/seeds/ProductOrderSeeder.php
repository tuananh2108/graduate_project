<?php

use Illuminate\Database\Seeder;
use App\Models\{Order, Product};

class ProductOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $limit = 200;

        for ($i = 0; $i < $limit; $i++) {
            DB::table('product_order')->insert([
                ['product_id' => $faker->randomElement(Product::pluck('id')), 'order_id' => $faker->randomElement(Order::pluck('id')), 'quantity' => $faker->numberBetween(10, 200)],
            ]);
        }
    }
}
