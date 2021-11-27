<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\content\Section;
use App\Models\content\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sections = Section::all()->each(function ($section) {

            $categories = Category::factory(rand(4, 8))->make();
            $section->categories()->saveMany($categories);
        });
    }
}
