<?php

namespace App\Actions\Events;

use App\Models\Event;
use App\Models\EventRegistration;
use App\Repositories\Contracts\EventRegistrationRepositoryInterface;
use Illuminate\Validation\ValidationException;

class RegisterParticipant
{
    public function __construct(private readonly EventRegistrationRepositoryInterface $repository) {}

    public function handle(Event $event, array $data): EventRegistration
    {
        if (! $event->registration_open) {
            throw ValidationException::withMessages([
                'event' => 'As inscrições para este evento estão encerradas.',
            ]);
        }

        if ($event->capacity !== null) {
            $count = $event->registrations()->whereIn('status', ['pending', 'confirmed'])->count();
            if ($count >= $event->capacity) {
                throw ValidationException::withMessages([
                    'event' => 'Não há mais vagas disponíveis para este evento.',
                ]);
            }
        }

        $data['event_id'] = $event->id;

        return $this->repository->create($data);
    }
}
