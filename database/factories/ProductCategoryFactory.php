<?php

namespace Database\Factories;

use App\Models\ProductCategory;
use Faker\Provider\DateTime;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductCategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProductCategory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'slug' => $this->faker->slug,
            'created_by' => 'admin',
            'updated_by' => 'admin',
            'is_deleted' => 0
        ];
    }
}
