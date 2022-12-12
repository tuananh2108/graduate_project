<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'super admin',
                'email' => 'super-admin@cnc-store.com',
                'password' => bcrypt('123456'),
                'role' => 'superadmin',
            ],
            [
                'name' => 'admin',
                'email' => 'admin@cnc-store.com',
                'password' => bcrypt('123456'),
                'role' => 'admin',
            ],
        ]);

        factory(User::class, 50)->create();
    }
}
