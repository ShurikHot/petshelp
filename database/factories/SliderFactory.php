<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Slider>
 */
class SliderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->word,
            'title' => fake()->words(3, true),
            'tagline' => fake()->words(3, true),
            'photo' => 'front/slider/frontpage-' . fake()->randomElement(
                ['01',
                '02',
                '1701327503',
                '1701327680']
            ) . '.png',
            'is_active' => fake()->boolean,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
