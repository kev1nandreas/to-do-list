<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->sentence(mt_rand(3, 5)),
            'user_id' => fake()->numberBetween(1, 10),
            'due_date' => fake()->dateTimeInInterval('-7 days', '+7 days'),
            'description' => fake()->sentence(mt_rand(10, 15)),
            'category' => fake()->word(),
            'status' => fake()->boolean(),
        ];
    }
}
