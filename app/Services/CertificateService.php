<?php

namespace App\Services;

use App\Models\Certificate;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;

class CertificateService
{
    public function generate(Certificate $certificate): string
    {
        $registration = $certificate->registration;
        $event = $registration->event;

        $pdf = Pdf::loadView('pdf.certificate', [
            'registration' => $registration,
            'event' => $event,
        ])->setPaper('a4', 'landscape');

        $path = 'certificates/' . $certificate->id . '_' . $registration->token . '.pdf';

        Storage::disk('public')->put($path, $pdf->output());

        return $path;
    }
}
