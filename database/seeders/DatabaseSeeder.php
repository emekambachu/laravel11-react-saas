<?php

namespace Database\Seeders;

use App\Models\Feature\Feature;
use App\Models\Package;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Emeka Mbachu',
            'email' => 'emeka@email.com',
            'password' => bcrypt('password'),
        ]);

        Feature::create([
            'image' => 'https://via.placeholder.com/150',
            'route_name' => 'feature1.index',
            'name' => 'Calculate Sum',
            'description' => 'Calculate Sum of 2 numbers',
            'required_credits' => 1,
            'active' => true,
        ]);

        Feature::create([
            'image' => 'https://via.placeholder.com/150',
            'route_name' => 'feature2.index',
            'name' => 'Calculate Sum',
            'description' => 'Calculate Sum of 2 numbers',
            'required_credits' => 3,
            'active' => true,
        ]);

        Package::create([
            'name' => 'Basic',
            'price' => 5,
            'credits' => 20,
            'slug' => 'basic',
            'description' => 'Basic Package',
        ]);

        Package::create([
            'name' => 'Silver',
            'price' => 20,
            'credits' => 100,
            'slug' => 'silver',
            'description' => 'Silver Package',
        ]);

        Package::create([
            'name' => 'Gold',
            'price' => 50,
            'credits' => 500,
            'slug' => 'gold',
            'description' => 'Gold Package',
        ]);
    }
}
