<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     * make sample data of Book table
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'item_name' => $this->faker->word(),
            'user_id' => $this->faker->numberBetween(1,2),
            'item_number' => $this->faker->numberBetween(1,999),
            'item_amount' => $this->faker->numberBetween(100,1000),
            'item_img' => $this->faker->image("../../public/upload", 300, 300, "cats", false),
            'item_published' => $this->faker->dateTime('now'),
            'created_at' => $this->faker->dateTime('now'),
            'updated_at' => $this->faker->dateTime('now')
        ];
    }
}
