<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Izvodjac>
 */
class IzvodjacFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'firstName'=>$this->faker->firstName(),
            'lastName'=>$this->faker->lastName(),
            'birthYear'=>$this->faker->year()
         ];
    }
}
