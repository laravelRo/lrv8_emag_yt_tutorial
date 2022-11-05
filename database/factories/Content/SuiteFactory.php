<?php

namespace Database\Factories\Content;

use App\Models\content\Brand;
use App\Models\content\Suite;
use Illuminate\Database\Eloquent\Factories\Factory;

class SuiteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Suite::class;

    public function definition()
    {
        $brand = Brand::select('id')->get()->random();

        return [
            'name' => $this->faker->words(rand(3, 5), true),
            'brand_id' => $brand->id,
            'position' => rand(1, 20) * 10
        ];
    }
}
