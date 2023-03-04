<?php

namespace Database\Factories;
use Illuminate\Support\Str;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class DocumentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // 'category_id', 'name', 'code', 'description', 'file', 'slug'
        return [
            'category_id' => Category::factory(),
            'name' => $this->faker->name(),
            'code' => str::random(),
            'description' => $this->faker->paragraph(),
            'file' => $this->faker->imageUrl(),
            'slug' => $this->faker->slug(),
        ];
    }
}
