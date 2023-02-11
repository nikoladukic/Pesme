<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Izvodjac;
use App\Models\User;
use Faker\Factory as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pesma>
 */
class PesmaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->word(),
            'duration'=>$this->faker->numberBetween(2,30),
            'publishinghouse'=>$this->faker->word(),
            'user_id'=>User::factory(),
            'author_id'=>Izvodjac::factory(),
            'category_id'=>$this->faker->numberBetween(1,5)
        ];
    }
}
