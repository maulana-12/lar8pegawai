<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'gender' => $this->faker->randomElement(['female', 'male']),
            'phone_number' => $this->faker->regexify('[0-9]{11,13}'),
        ];
    }
}
