<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\content\Brand;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Brand::truncate();

        Brand::factory(7)->create();
    }
}
