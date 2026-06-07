<?php

namespace App\Http\Controllers;

use App\Actions\Events\IssueCertificate;
use App\Repositories\Contracts\EventRegistrationRepositoryInterface;
use Illuminate\Support\Facades\Storage;

class CertificateController extends Controller
{
    public function __construct(
        private readonly EventRegistrationRepositoryInterface $registrations,
        private readonly IssueCertificate $action,
    ) {}

    public function show(string $token)
    {
        $registration = $this->registrations->findByToken($token);
        $event = $registration->event;

        return $this->renderPage('events.registered', 'events', 'lims-green', compact('registration', 'event'));
    }

    public function download(string $token)
    {
        $registration = $this->registrations->findByToken($token);

        if ($registration->status !== 'confirmed') {
            abort(403, 'Inscrição ainda não confirmada. Aguarde a confirmação para baixar o certificado.');
        }

        $certificate = $this->action->handle($registration);

        return Storage::disk('public')->download(
            $certificate->file_path,
            'certificado-' . $registration->event->slug . '.pdf'
        );
    }
}
