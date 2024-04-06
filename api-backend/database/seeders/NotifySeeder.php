<?php

namespace Database\Seeders;

use App\Models\Notify;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NotifySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Notify::factory(10)->create();
    }
}
