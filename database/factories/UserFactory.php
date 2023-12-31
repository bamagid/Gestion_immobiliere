<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    // public function definition(): array
    // {
    //     return [
    //         'name' => fake()->name(),
    //         'email' => fake()->unique()->safeEmail(),
    //         'email_verified_at' => now(),
    //         'password' =>Hash::make('azerty12'),
    //         'role_id'=>rand(1,2),
    //         'remember_token' => Str::random(10),
    //     ];
    // }

    // public function definition(): array
    // {
    //     return [
    //         'name' => fake()->name('Lady'),
    //         'email' => fake()->unique()->safeEmail('yayerokhayapro@gmail.com'),
    //         'email_verified_at' => now(),
    //         'password' =>Hash::make('azerty12'),
    //         'role_id'=>(2),
    //         'remember_token' => Str::random(1),
    //     ];
    // }

          public function definition(): array
    {
        return [
            'name' => 'Lady',
            'email' => 'yayerokhayapro@gmail.com', 
            'email_verified_at' => now(),
            'password' => Hash::make('azerty12'),
            'role_id' => 2, 
            'remember_token' => Str::random(10), 
        ];
    }


    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return $this
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
