<?php

namespace Database\Factories\content;

use Illuminate\Support\Str;
use App\Models\content\Brand;
// use App\Models\content\Section;
use App\Models\content\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // if (!Section::all()->count() > 0) {
        //     exit;
        // }

        $name = $this->faker->sentence(4);

        return [
            //foreign key for brands
            'brand_id' => Brand::all()->random()->id,
            // 'section_id' => Section::all()->random()->id,

            'name' => $name,
            'slug' => Str::slug($name) . '_' . Str::random(4),

            'excerpt' => $this->faker->paragraphs(rand(1, 3), true),
            'presentation' => $this->faker->randomHtml(),
            'views' => rand(30, 300),
            'price' => rand(10, 1500),
            'discount' => $this->faker->randomElement([5, 10, 15, 20]),
            'stock' => $this->faker->numberBetween(10, 500),
            'position' => $this->faker->randomElement([10, 20, 30, 40, 50, 60, 70, 80, 90, 100]),

            'meta_title' => $this->faker->text(),
            'meta_description' => $this->faker->text(),
            'meta_keywords' => $this->faker->text(),
        ];
    }
}
