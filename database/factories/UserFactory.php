<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

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
    public function definition()
    {
        return [
            'name' => fake()->firstName(),
            'email' => fake()->unique()->safeEmail(),
            'password' => Hash::make('111'),
            'phone_number' => '+380' . fake()->numberBetween(111111111, 999999999),
            'is_admin' => '0',
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }

    public function adminAccount()
    {
        return $this->state([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('111'),
            'phone_number' => '+380111111111',
            'is_admin' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
