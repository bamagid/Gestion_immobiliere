<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
            'nom'=>$this->faker->name(),
            'description'=>$this->faker->text(),
            'image'=>"chemin de l'image",
            'localisation'=>"adresse",
            'statut'=>'disponible',
           'admin_id'=>rand(1,10)
        ];
    }
}
