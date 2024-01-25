<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Event;
use App\Models\User;
use Illuminate\Database\Seeder;

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
            'name' => 'a',
            'email' => 'a@gmail.com',
            'password' => bcrypt('a'),
            'role' => 'admin',
        ]);
        User::create([
            'name' => 'u',
            'email' => 'u@gmail.com',
            'password' => bcrypt('u'),
            'role' => 'customer',
        ]);

        Category::create([
            'name' => 'Musik'
        ]);

        Event::create([
            'name' => 'Example Concert',
            'image' => 'img/1310957.jpeg',
            'description' => 'A sample concert description.',
            'date' => date('Y-m-d', strtotime('2024-12-31')), // Change the date accordingly
            'stock' => 100,
            'time' => date('H:i:s', strtotime('19:00:00')), // Change the time accordingly
            'location' => 'Example Arena',
            'venue' => 'Main Stage',
            'price' => 50.00,
            'status' => 'active',
            'category_id' => 1, // Assuming the category ID is 1
        ]);
        Event::create([
            'name' => 'Example Concert',
            'image' => 'img/1310957.jpeg',
            'description' => 'A sample concert description.',
            'date' => date('Y-m-d', strtotime('2024-12-31')), // Change the date accordingly
            'stock' => 27,
            'time' => date('H:i:s', strtotime('19:00:00')), // Change the time accordingly
            'location' => 'Example Arena',
            'venue' => 'Main Stage',
            'price' => 50.00,
            'status' => 'active',
            'category_id' => 1, // Assuming the category ID is 1
        ]);
    }
}
