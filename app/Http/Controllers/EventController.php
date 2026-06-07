<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\EventRepositoryInterface;

class EventController extends Controller
{
    public function __construct(private readonly EventRepositoryInterface $events) {}

    public function show(string $slug)
    {
        $event = $this->events->findBySlug($slug);

        return $this->renderPage('events.show', 'events', 'lims-green', compact('event'));
    }
}
