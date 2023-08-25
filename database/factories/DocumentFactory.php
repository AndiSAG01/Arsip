<?php

namespace Database\Factories;
use Illuminate\Support\Str;

use App\Models\Category;
use App\Models\Type;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\UploadedFile;

class DocumentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $file = UploadedFile::fake()->image('thumbnail.jpg');
        $fileName = rand(0,9999999) . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('documents', $fileName, 'public');

        return [
            'category_id' => function ()
            {
                return Category::all()->random();
            },
            'type_id' => function ()
            {
                return Type::all()->random();
            },
            'name' => $this->faker->name(),
            'code' => str::random(),
            'from' => $this->faker->company(),
            'description' => $this->faker->paragraph(),
            'file' => $filePath,
            'slug' => $this->faker->slug(),
            'created_at' => $this->faker->dateTimeBetween(),
            'updated_at' => $this->faker->dateTimeBetween()
        ];
    }
}
