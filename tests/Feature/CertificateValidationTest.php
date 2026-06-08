<?php

namespace Tests\Feature;

use App\Models\Certificate;
use App\Models\Event;
use App\Models\EventRegistration;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use Tests\TestCase;

class CertificateValidationTest extends TestCase
{
    use RefreshDatabase;

    public function test_certificate_validation_screen_can_be_rendered(): void
    {
        $this->get('/eventos/certificados/validar')
            ->assertOk()
            ->assertSee('Validar certificado')
            ->assertSee('Código de validação');
    }

    public function test_valid_certificate_code_returns_certificate_data(): void
    {
        $event = Event::factory()->create([
            'title' => 'Teresina INFO 2026',
            'status' => 'published',
        ]);
        $registration = EventRegistration::factory()->create([
            'event_id' => $event->id,
            'name' => 'Cícero Martins',
            'status' => 'confirmed',
            'token' => Str::random(64),
        ]);
        Certificate::factory()->create([
            'event_registration_id' => $registration->id,
            'file_path' => 'certificates/sample.pdf',
            'generated_at' => now(),
        ]);

        $this->post('/eventos/certificados/validar', ['code' => $registration->token])
            ->assertOk()
            ->assertSee('Certificado válido')
            ->assertSee('Cícero Martins')
            ->assertSee('Teresina INFO 2026')
            ->assertSee(route('certificate.download', $registration->token), false);
    }

    public function test_invalid_certificate_code_returns_error(): void
    {
        $this->from('/eventos/certificados/validar')
            ->post('/eventos/certificados/validar', ['code' => Str::random(64)])
            ->assertRedirect('/eventos/certificados/validar')
            ->assertSessionHasErrors('code');
    }
}
