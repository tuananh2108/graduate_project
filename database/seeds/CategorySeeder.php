<?php

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            ['name' => 'Gạch lát nền', 'parent' => 0],
            ['name' => 'Gạch ốp', 'parent' => 0],
            ['name' => 'Gạch gỗ thanh', 'parent' => 0],
            ['name' => 'Gạch bông porcelain', 'parent' => 0],
            ['name' => 'Gạch ốp lát cao cấp', 'parent' => 0],
        ]);
        DB::table('categories')->insert([
            ['name' => '800x800mm', 'parent' => Category::where('name', 'Gạch lát nền')->first()->id],
            ['name' => '600x600mm', 'parent' => Category::where('name', 'Gạch lát nền')->first()->id],
            ['name' => '500x500mm', 'parent' => Category::where('name', 'Gạch lát nền')->first()->id],
            ['name' => '400x400mm', 'parent' => Category::where('name', 'Gạch lát nền')->first()->id],
            ['name' => '300x300mm', 'parent' => Category::where('name', 'Gạch lát nền')->first()->id],
            ['name' => '300x600mm', 'parent' => Category::where('name', 'Gạch ốp')->first()->id],
            ['name' => '400x800mm', 'parent' => Category::where('name', 'Gạch ốp')->first()->id],
            ['name' => '150x800mm', 'parent' => Category::where('name', 'Gạch gỗ thanh')->first()->id],
            ['name' => '600x1200mm', 'parent' => Category::where('name', 'Gạch ốp lát cao cấp')->first()->id],
            ['name' => 'Vi tinh 800x800mm', 'parent' => Category::where('name', 'Gạch ốp lát cao cấp')->first()->id],
            ['name' => 'Muối tan 800x800mm', 'parent' => Category::where('name', 'Gạch ốp lát cao cấp')->first()->id],
        ]);
    }
}
