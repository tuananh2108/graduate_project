<?php

use Illuminate\Database\Seeder;
use App\Models\{Product, Value};

class ValueProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('value_product')->insert([
            [
                'product_id' => Product::where('product_code', 'KC89001')->first()->id,
                'value_id' => Value::where('value', '800x800')->first()->id,
            ],
            [
                'product_id' => Product::where('product_code', 'KC89001')->first()->id,
                'value_id' => Value::where('value', 'CMC')->first()->id,
            ],
            [
                'product_id' => Product::where('product_code', 'LX6639')->first()->id,
                'value_id' => Value::where('value', '600x600')->first()->id,
            ],
            [
                'product_id' => Product::where('product_code', 'LX6639')->first()->id,
                'value_id' => Value::where('value', 'CMC')->first()->id,
            ],
            [
                'product_id' => Product::where('product_code', 'W158001')->first()->id,
                'value_id' => Value::where('value', '150x800')->first()->id,
            ],
            [
                'product_id' => Product::where('product_code', 'W158001')->first()->id,
                'value_id' => Value::where('value', 'CMC')->first()->id,
            ],
            [
                'product_id' => Product::where('product_code', 'LX8825')->first()->id,
                'value_id' => Value::where('value', '800x800')->first()->id,
            ],
            [
                'product_id' => Product::where('product_code', 'LX8825')->first()->id,
                'value_id' => Value::where('value', 'CMC')->first()->id,
            ],
            [
                'product_id' => Product::where('product_code', 'LX8814')->first()->id,
                'value_id' => Value::where('value', '800x800')->first()->id,
            ],
            [
                'product_id' => Product::where('product_code', 'LX8814')->first()->id,
                'value_id' => Value::where('value', 'CMC')->first()->id,
            ],
            [
                'product_id' => Product::where('product_code', 'LX8820')->first()->id,
                'value_id' => Value::where('value', '800x800')->first()->id,
            ],
            [
                'product_id' => Product::where('product_code', 'LX8820')->first()->id,
                'value_id' => Value::where('value', 'CMC')->first()->id,
            ],
            [
                'product_id' => Product::where('product_code', 'LX8821')->first()->id,
                'value_id' => Value::where('value', '800x800')->first()->id,
            ],
            [
                'product_id' => Product::where('product_code', 'LX8821')->first()->id,
                'value_id' => Value::where('value', 'CMC')->first()->id,
            ],
            [
                'product_id' => Product::where('product_code', 'LX8822')->first()->id,
                'value_id' => Value::where('value', '800x800')->first()->id,
            ],
            [
                'product_id' => Product::where('product_code', 'LX8822')->first()->id,
                'value_id' => Value::where('value', 'CMC')->first()->id,
            ],
            [
                'product_id' => Product::where('product_code', 'LX8823')->first()->id,
                'value_id' => Value::where('value', '800x800')->first()->id,
            ],
            [
                'product_id' => Product::where('product_code', 'LX8823')->first()->id,
                'value_id' => Value::where('value', 'CMC')->first()->id,
            ],
            [
                'product_id' => Product::where('product_code', 'LX8824')->first()->id,
                'value_id' => Value::where('value', '800x800')->first()->id,
            ],
            [
                'product_id' => Product::where('product_code', 'LX8824')->first()->id,
                'value_id' => Value::where('value', 'CMC')->first()->id,
            ],
            [
                'product_id' => Product::where('product_code', 'GX6801')->first()->id,
                'value_id' => Value::where('value', '600x600')->first()->id,
            ],
            [
                'product_id' => Product::where('product_code', 'GX6801')->first()->id,
                'value_id' => Value::where('value', 'CMC')->first()->id,
            ],
            [
                'product_id' => Product::where('product_code', 'VN3302')->first()->id,
                'value_id' => Value::where('value', '300x300')->first()->id,
            ],
            [
                'product_id' => Product::where('product_code', 'VN3302')->first()->id,
                'value_id' => Value::where('value', 'CMC')->first()->id,
            ],
        ]);
    }
}
