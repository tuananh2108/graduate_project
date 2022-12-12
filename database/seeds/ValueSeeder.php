<?php

use Illuminate\Database\Seeder;

class ValueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('values')->insert([
            ['value' => '150x800', 'attribute_id' => 1],
            ['value' => '300x300', 'attribute_id' => 1],
            ['value' => '300x600', 'attribute_id' => 1],
            ['value' => '600x600', 'attribute_id' => 1],
            ['value' => '800x800', 'attribute_id' => 1],
            ['value' => 'CMC', 'attribute_id' => 2],
            ['value' => 'PRATO', 'attribute_id' => 2],
            ['value' => 'LUXURIO', 'attribute_id' => 2],
            ['value' => 'LOUCIA', 'attribute_id' => 2],
        ]);
    }
}
