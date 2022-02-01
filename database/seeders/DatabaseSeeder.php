<?php

namespace Database\Seeders;

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
        $this->call([
            // UserSeeder::class,
            // StaffSeeder::class,
            // SectionSeeder::class,
            // CategorySeeder::class,
            // BrandSeeder::class,
            ProductSeeder::class

        ]);
    }
}
