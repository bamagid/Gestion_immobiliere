<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Chambre>
 */
class ChambreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'dimension'=>fake()->integer(),
            'image'=>'imagepath',
            'typeChambre'=>$this->faker->randomElement(['simple','avec salle de bain']),
            'article_id'=>rand(1,9), 
            ];
    }
}
