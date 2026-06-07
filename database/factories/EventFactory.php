<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class EventFactory extends Factory
{
    public function definition(): array
    {
        $title = fake()->sentence(4);
        return [
            'title' => $title,
            'slug' => Str::slug($title) . '-' . fake()->unique()->numberBetween(1, 9999),
            'description' => fake()->paragraphs(2, true),
            'location' => fake()->city(),
            'image' => null,
            'starts_at' => now()->addDays(7),
            'ends_at' => now()->addDays(7)->addHours(4),
            'type' => fake()->randomElement(['seminar', 'workshop', 'conference', 'meeting', 'other']),
            'status' => 'published',
            'registration_open' => true,
            'capacity' => null,
        ];
    }
}
