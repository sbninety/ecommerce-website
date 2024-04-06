<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\product_image;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            CategorySeeder::class,
            CitySeeder::class,
            CommentImageSeeder::class,
            CommentSeeder::class,
            DistrictSeeder::class,
            NotifySeeder::class,
            ProductSeeder::class,
            ProductVariantSeeder::class,
            StoreSeeder::class,
            UserSeeder::class,
            ImageSeeder::class
        ]);
    }
}
