<?php

namespace App\Actions\Events;

use App\Models\Certificate;
use App\Models\EventRegistration;
use App\Services\CertificateService;

class IssueCertificate
{
    public function __construct(private readonly CertificateService $service) {}

    public function handle(EventRegistration $registration): Certificate
    {
        $certificate = $registration->certificate
            ?? Certificate::create(['event_registration_id' => $registration->id]);

        if (empty($certificate->file_path)) {
            $path = $this->service->generate($certificate->load('registration.event'));
            $certificate->update([
                'file_path' => $path,
                'generated_at' => now(),
            ]);
        }

        return $certificate->fresh();
    }
}
