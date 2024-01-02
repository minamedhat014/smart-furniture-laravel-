<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
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
            'type_id' => 1,
            'source_id' => 1,
            'descripation'=>fake()->text(),
            'item_material'=> ['pine','MDF','plywood'],
            'fabric'=> fake()->sentence(),
             'sponge'=> fake() -> sentence(),
             'sponge_thickness'=>fake()-> numberBetween(15,35),
            'available_date'=> fake()->date(),
            'divisablity'=> 1,
            'Standard_ability'=>1,
            'created_by'=> 'mina'
        ];
    }
}
