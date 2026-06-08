<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TeamMemberFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'role' => fake()->jobTitle(),
            'bio' => fake()->paragraph(),
            'photo_path' => null,
            'lattes_url' => null,
            'linkedin_url' => null,
            'sort_order' => fake()->numberBetween(0, 50),
            'is_active' => true,
        ];
    }
}
