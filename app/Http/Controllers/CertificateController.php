<?php

namespace App\Http\Controllers;

use App\Actions\Events\IssueCertificate;
use App\Models\EventRegistration;
use App\Repositories\Contracts\EventRegistrationRepositoryInterface;
use Illuminate\Http\Request;
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

    public function validateForm()
    {
        return $this->renderPage('certificates.validate', 'events', 'lims-green');
    }

    public function validateCode(Request $request)
    {
        $data = $request->validate([
            'code' => ['required', 'string', 'max:100'],
        ], [
            'code.required' => 'Informe o código do certificado.',
        ]);

        $code = trim($data['code']);

        $registration = EventRegistration::query()
            ->with(['event', 'certificate'])
            ->where('token', $code)
            ->where('status', 'confirmed')
            ->whereHas('certificate', fn ($query) => $query->whereNotNull('file_path'))
            ->first();

        if (! $registration) {
            return back()
                ->withInput(['code' => $code])
                ->withErrors(['code' => 'Certificado não encontrado ou ainda não emitido.']);
        }

        return $this->renderPage('certificates.validate', 'events', 'lims-green', [
            'registration' => $registration,
            'event' => $registration->event,
            'certificate' => $registration->certificate,
            'code' => $code,
        ]);
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
