<?php

use Illuminate\Database\Seeder;

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
            ['name' => '800x800mm', 'parent' => 1],
            ['name' => '600x600mm', 'parent' => 1],
            ['name' => '500x500mm', 'parent' => 1],
            ['name' => '400x400mm', 'parent' => 1],
            ['name' => '300x300mm', 'parent' => 1],
            ['name' => '300x600mm', 'parent' => 2],
            ['name' => '400x800mm', 'parent' => 2],
            ['name' => '150x800mm', 'parent' => 3],
            ['name' => '600x1200mm', 'parent' => 5],
            ['name' => 'Vi tinh 800x800mm', 'parent' => 5],
            ['name' => 'Muối tan 800x800mm', 'parent' => 5],
        ]);
    }
}
