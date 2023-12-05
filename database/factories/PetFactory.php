<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pet>
 */
class PetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->firstName,
            'age_month' => fake()->numberBetween(1, 50),
            'species' => fake()->randomElement(['Собака', 'Кіт', 'Гризун', 'Пташка', 'Інше']),
            'sex' => fake()->randomElement(['Самець', 'Самиця']),
            'breed' => ucfirst(fake()->word),
            'color' => fake()->colorName,
            'sterilization' => fake()->randomElement(['0', '1']),
            'vaccination' => fake()->randomElement(['0', '1']),
            'special' => fake()->randomElement(['0', '1']),
            'guardianship' => fake()->randomElement(['0', '1']),
            'city' => fake()->city,
            'phone_number' => '+380' . fake()->numberBetween(111111111, 999999999),
            'story' => fake()->words(20, true),
            'peculiarities' => fake()->words(5, true),
            'wishes' => fake()->words(10, true),
            'photo' => 'images/2023-11/' . fake()->randomElement(['1698930574','1698935791','1698951287','1698951300','1698951318','1698951365','1698952191','1698952266','1699257359','1699887600','1701260040']) . '.png',
            'patrons' => fake()->numberBetween(1, 200),
            'adopted' => fake()->randomElement(['0', '1']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
