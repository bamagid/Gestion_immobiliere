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
        'nombreToilette'=>rand(1,4),
        'nombreBalcon'=>rand(0,2),
        'dimension'=>rand(100,350),
        'nombreChambre'=>rand(1,7),
        'statut'=>$this->faker->randomElement(['oui', 'non']),
        'is_deleted'=>'false',
        'user_id'=>rand(1,2), 
        ];
    }
}
