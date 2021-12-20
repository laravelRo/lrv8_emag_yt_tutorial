<?php

namespace Database\Factories\content;

use Illuminate\Support\Str;
use App\Models\content\Brand;
use Illuminate\Database\Eloquent\Factories\Factory;

class BrandFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Brand::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->words(rand(1, 3), true);

        return [
            'name' => $name,
            'slug' => Str::slug($name) . '_' . Str::random(4),

            'title' => $this->faker->sentence(),
            'description' => $this->faker->randomHtml(),


            'position' => $this->faker->numberBetween(0, 100),

            'meta_title' => $this->faker->text(),
            'meta_description' => $this->faker->text(),
            'meta_keywords' => $this->faker->text(),
        ];
    }
}
