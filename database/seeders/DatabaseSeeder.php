<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
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
        User::create([
            'name' => 'Henry Salim',
            'email' => 'henrysalim22@gmail.com',
            'password' => bcrypt('password'),
            'is_admin' => true
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
    }
}
