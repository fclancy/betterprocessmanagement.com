<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->safeEmail(),
            'email_verified_at' => now(),
            'password' => bcrypt('password'), // Use bcrypt or Hash::make
            'remember_token' => Str::random(10),
            'is_admin' => false,
        ];
    }

    public function admin(): Factory
    {
        return $this->state([
            'is_admin' => true,
        ]);
    }
}
