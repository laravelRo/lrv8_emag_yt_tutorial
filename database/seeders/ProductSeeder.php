<?php

namespace Database\Seeders;

use App\Models\content\Product;
use App\Models\content\Section;
use Illuminate\Database\Seeder;
use App\Models\content\Category;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category_product')->truncate();
        Product::truncate();

        $sections = Section::all()->each(function ($section) {

            $products = Product::factory(rand(20, 50))->make();
            $section->products()->saveMany($products);

            $categories = $section->categories;

            $section->products()->each(function ($product) use ($categories) {


                $product->categories()->sync($categories->random(rand(1, $categories->count()))->pluck('id')->toArray());
            });
        });
    }
}
