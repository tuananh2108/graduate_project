<?php

use Illuminate\Database\Seeder;

use database\seeds;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(AttributeSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(ValueSeeder::class);
        $this->call(OrderSeeder::class);
        $this->call(ProductOrderSeeder::class);
        $this->call(TotalOrderSeeder::class);
        $this->call(ValueProductSeeder::class);
        $this->call(NewsSeeder::class);
    }
}
