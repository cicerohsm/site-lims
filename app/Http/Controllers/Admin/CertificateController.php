<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Events\IssueCertificate;
use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Repositories\Contracts\EventRegistrationRepositoryInterface;

class CertificateController extends Controller
{
    public function __construct(
        private readonly EventRegistrationRepositoryInterface $repository,
        private readonly IssueCertificate $action,
    ) {}

    public function generate(Event $event)
    {
        $confirmed = $event->registrations()->where('status', 'confirmed')->get();

        foreach ($confirmed as $registration) {
            $this->action->handle($registration->load('certificate'));
        }

        return back()->with('success', "Certificados gerados para {$confirmed->count()} participante(s).");
    }
}
