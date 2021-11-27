<?php

namespace Database\Factories\content;

use Illuminate\Support\Str;
use App\Models\content\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->sentence(4);

        return [
            'name' => $name,
            'slug' => Str::slug($name) . '_' . Str::random(4),
            'title' => $this->faker->sentence(7),
            'description' => $this->faker->paragraphs(rand(3, 6), true),


            'position' => $this->faker->numberBetween(0, 100),

            'meta_title' => $this->faker->text(),
            'meta_description' => $this->faker->text(),
            'meta_keywords' => $this->faker->text(),
        ];
    }
}
