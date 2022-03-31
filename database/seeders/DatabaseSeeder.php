<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\User;
use App\Models\Status;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'username' => 'Henry Salim',
            'email' => 'henrysalim22@gmail.com',
            'password' => bcrypt('password'),
            'is_admin' => true
        ]);
        User::create([
            'username' => 'henheenn',
            'email' => 'henry@gmail.com',
            'password' => bcrypt('password'),
            'is_admin' => false
        ]);
        User::factory(10)->create();
        Category::create([
            'name' => 'Kerusakan Biasa'
        ]);
        Category::create([
            'name' => 'Kerusakan Sedang'
        ]);
        Category::create([
            'name' => 'Kerusakan Parah'
        ]);
        Status::create([
            'status' => 'Pending'
        ]);
        Status::create([
            'status' => 'On Process'
        ]);
        Status::create([
            'status' => 'Finish'
        ]);
        Status::create([
            'status' => 'Dibatalkan'
        ]);
    }
}
