<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Testing\Fakes\Fake;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        'nom'=>fake()->name(),
        'categorie'=>$this->faker->randomElement(['luxe','moyen','abordable']),
        'description'=>fake()->text(),
        'image'=>'imagepath',
        'localisation'=>fake()->text(),
        'statut'=>$this->faker->randomElement(['disponible','occupé']),
        'admin_id'=>rand(1,5), 
        ];
    }
}
