<?php

use Illuminate\Database\Seeder;
use App\Models\Attribute;

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
            ['value' => '150x800', 'attribute_id' => Attribute::where('name', 'Kích thước')->first()->id],
            ['value' => '300x300', 'attribute_id' => Attribute::where('name', 'Kích thước')->first()->id],
            ['value' => '300x600', 'attribute_id' => Attribute::where('name', 'Kích thước')->first()->id],
            ['value' => '600x600', 'attribute_id' => Attribute::where('name', 'Kích thước')->first()->id],
            ['value' => '800x800', 'attribute_id' => Attribute::where('name', 'Kích thước')->first()->id],
            ['value' => 'CMC', 'attribute_id' => Attribute::where('name', 'Hãng sản xuất')->first()->id],
            ['value' => 'PRATO', 'attribute_id' => Attribute::where('name', 'Hãng sản xuất')->first()->id],
            ['value' => 'LUXURIO', 'attribute_id' => Attribute::where('name', 'Hãng sản xuất')->first()->id],
            ['value' => 'LOUCIA', 'attribute_id' => Attribute::where('name', 'Hãng sản xuất')->first()->id],
        ]);
    }
}
