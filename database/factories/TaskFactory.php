<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\task>
 */
class taskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'code' => fake()->randomNumber(),
            'code_details' => fake()-> paragraph(),
            'discussion' => fake() -> paragraph(),
            'inspection_procedure' => fake() -> paragraph(),
            'primary_benefit' => fake() -> paragraph(),
        ];
    }
}
