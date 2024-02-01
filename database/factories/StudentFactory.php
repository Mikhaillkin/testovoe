<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'last_name' => $this->faker->lastName,
            'first_name' => $this->faker->firstName,
            'middle_name' => $this->faker->firstName,
            'email' => $this->faker->unique()->safeEmail,
            'registration_number' => $this->faker->unique()->regexify('[A-Z]{2}[0-9]{4}'),
            'birth_date' => $this->faker->dateTimeBetween('-35 years', '-16 years')->format('Y-m-d'),
            'gender' => $this->faker->numberBetween(1, 2),
        ];
    }
}
