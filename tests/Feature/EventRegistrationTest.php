<?php

namespace Tests\Feature;

use App\Actions\Events\RegisterParticipant;
use App\Models\Event;
use App\Models\EventRegistration;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Validation\ValidationException;
use Tests\TestCase;

class EventRegistrationTest extends TestCase
{
    use RefreshDatabase;

    private function makeEvent(array $attrs = []): Event
    {
        return Event::factory()->create(array_merge([
            'registration_open' => true,
            'capacity' => null,
            'status' => 'published',
        ], $attrs));
    }

    public function test_register_participant_creates_registration(): void
    {
        $event = $this->makeEvent();
        $action = app(RegisterParticipant::class);

        $registration = $action->handle($event, [
            'name' => 'João Silva',
            'email' => 'joao@example.com',
        ]);

        $this->assertInstanceOf(EventRegistration::class, $registration);
        $this->assertDatabaseHas('event_registrations', ['email' => 'joao@example.com']);
        $this->assertNotEmpty($registration->token);
    }

    public function test_token_is_64_chars(): void
    {
        $event = $this->makeEvent();
        $action = app(RegisterParticipant::class);

        $registration = $action->handle($event, [
            'name' => 'Maria',
            'email' => 'maria@example.com',
        ]);

        $this->assertEquals(64, strlen($registration->token));
    }

    public function test_registration_fails_when_closed(): void
    {
        $event = $this->makeEvent(['registration_open' => false]);
        $action = app(RegisterParticipant::class);

        $this->expectException(ValidationException::class);

        $action->handle($event, ['name' => 'Ana', 'email' => 'ana@example.com']);
    }

    public function test_registration_fails_when_event_at_capacity(): void
    {
        $event = $this->makeEvent(['capacity' => 1]);
        EventRegistration::factory()->create(['event_id' => $event->id, 'status' => 'confirmed']);

        $action = app(RegisterParticipant::class);

        $this->expectException(ValidationException::class);

        $action->handle($event, ['name' => 'Carlos', 'email' => 'carlos@example.com']);
    }

    public function test_duplicate_email_fails_for_same_event(): void
    {
        $event = $this->makeEvent();
        EventRegistration::factory()->create([
            'event_id' => $event->id,
            'email' => 'dup@example.com',
        ]);

        $action = app(RegisterParticipant::class);

        $this->expectException(\Exception::class);

        $action->handle($event, ['name' => 'Dup', 'email' => 'dup@example.com']);
    }
}
