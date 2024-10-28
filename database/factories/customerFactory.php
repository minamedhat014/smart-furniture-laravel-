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
            'title' => fake()->randomElement(['accountant', 'mester', 'miss']),
            'type' => fake()->randomElement(['old customer', 'potential', 'new customer']),
            'remarks' => fake()->text(),
            'created_by' => fake()->randomElement(['mina', 'alex', 'john']),
        ];
    }
public function configure()
{
    return $this->afterCreating(function ($customer) {
        $customer->phone()->create([
            'number' => fake()->phoneNumber(), // Adjust fields as needed for the phone model
            // Add other phone model fields here
        ]);
        $customer->address()->create([
            'zone' => fake()->randomElement(['تجمع', 'شروق', 'اكتوبر ']),
            'address' => fake()->randomElement(['تجمع', 'شروق', 'اكتوبر ']), // Adjust fields as needed for the phone model
            // Add other phone model fields here
        ]);
    });
}

}