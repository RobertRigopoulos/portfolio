<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * Add additional seeders to the array as the project grows.
     */
    public function run(): void
    {
        $this->call([
            ProjectSeeder::class,
        ]);
    }
}
