<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\customer>
 */
class customerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->unique()->name(),     
            'national_id' => $this->faker->numberBetween(1,14),
            'type' =>  ['VIP','silver','golden'],
            'remarks'=>fake()->text(),
            'created_by'=> ['mina','dkkdssd','dsdsdsd'],
           
        ];
    }
}
