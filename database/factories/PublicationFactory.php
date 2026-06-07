<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PublicationFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(6),
            'authors' => fake()->name() . ', ' . fake()->name(),
            'year' => fake()->numberBetween(2010, 2026),
            'venue' => fake()->company(),
            'doi' => null,
            'url' => null,
            'type' => fake()->randomElement(['article', 'tcc', 'conference', 'book', 'other']),
            'abstract' => fake()->paragraph(),
        ];
    }
}
