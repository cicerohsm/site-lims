<?php

namespace Database\Factories;

use App\Models\EventRegistration;
use Illuminate\Database\Eloquent\Factories\Factory;

class CertificateFactory extends Factory
{
    public function definition(): array
    {
        return [
            'event_registration_id' => EventRegistration::factory(),
            'file_path' => null,
            'generated_at' => null,
        ];
    }
}
