<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'role' => '1',
            'password' => bcrypt('admin'),
        ]);
        User::create([
            'name' => 'superadmin',
            'email' => 'superadmin@gmail.com',
            'role' => '2',
            'password' => bcrypt('admin'),
        ]);
        User::create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'role' => '0',
            'password' => bcrypt('admin'),
        ]);
    }
}
