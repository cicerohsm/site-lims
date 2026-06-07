<?php

namespace App\Http\Controllers;

use App\Actions\Events\RegisterParticipant;
use App\Http\Requests\StoreRegistrationRequest;
use App\Repositories\Contracts\EventRepositoryInterface;

class RegistrationController extends Controller
{
    public function __construct(
        private readonly EventRepositoryInterface $events,
        private readonly RegisterParticipant $action,
    ) {}

    public function create(string $slug)
    {
        $event = $this->events->findBySlug($slug);

        return $this->renderPage('events.register', 'events', 'lims-green', compact('event'));
    }

    public function store(StoreRegistrationRequest $request, string $slug)
    {
        $event = $this->events->findBySlug($slug);
        $registration = $this->action->handle($event, $request->validated());

        return redirect()->route('certificate.show', $registration->token)
            ->with('success', 'Inscrição realizada com sucesso!');
    }
}
