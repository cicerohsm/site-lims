<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Events\ConfirmRegistration;
use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\EventRegistration;
use App\Repositories\Contracts\EventRegistrationRepositoryInterface;

class RegistrationController extends Controller
{
    public function __construct(private readonly EventRegistrationRepositoryInterface $repository) {}

    public function index(Event $event)
    {
        $registrations = $this->repository->paginateByEvent($event, 30);
        return view('admin.events.registrations', compact('event', 'registrations'));
    }

    public function confirm(Event $event, EventRegistration $registration, ConfirmRegistration $action)
    {
        $action->handle($registration);
        return back()->with('success', 'Inscrição confirmada.');
    }
}
