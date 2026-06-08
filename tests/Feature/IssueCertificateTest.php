<?php

namespace Tests\Feature;

use App\Actions\Events\IssueCertificate;
use App\Models\Certificate;
use App\Models\Event;
use App\Models\EventRegistration;
use App\Services\CertificateService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Mockery;
use Tests\TestCase;

class IssueCertificateTest extends TestCase
{
    use RefreshDatabase;

    public function test_issue_certificate_creates_record_and_stores_path(): void
    {
        $event = Event::factory()->create(['status' => 'published']);
        $registration = EventRegistration::factory()->create([
            'event_id' => $event->id,
            'status' => 'confirmed',
        ]);

        $service = Mockery::mock(CertificateService::class);
        $service->shouldReceive('generate')
            ->once()
            ->andReturn('certificates/fake-path.pdf');

        $this->app->instance(CertificateService::class, $service);

        $action = app(IssueCertificate::class);
        $certificate = $action->handle($registration);

        $this->assertInstanceOf(Certificate::class, $certificate);
        $this->assertEquals('certificates/fake-path.pdf', $certificate->file_path);
        $this->assertNotNull($certificate->generated_at);
    }

    public function test_issue_certificate_reuses_existing_record_without_regenerating(): void
    {
        $event = Event::factory()->create(['status' => 'published']);
        $registration = EventRegistration::factory()->create([
            'event_id' => $event->id,
            'status' => 'confirmed',
        ]);
        Certificate::factory()->create([
            'event_registration_id' => $registration->id,
            'file_path' => 'certificates/old.pdf',
        ]);

        $service = Mockery::mock(CertificateService::class);
        $service->shouldNotReceive('generate');

        $this->app->instance(CertificateService::class, $service);

        $action = app(IssueCertificate::class);
        $certificate = $action->handle($registration);

        $this->assertEquals('certificates/old.pdf', $certificate->file_path);
        $this->assertCount(1, Certificate::all());
    }

    public function test_issue_certificate_can_force_regenerate_existing_record(): void
    {
        $event = Event::factory()->create(['status' => 'published']);
        $registration = EventRegistration::factory()->create([
            'event_id' => $event->id,
            'status' => 'confirmed',
        ]);
        Certificate::factory()->create([
            'event_registration_id' => $registration->id,
            'file_path' => 'certificates/old.pdf',
        ]);

        $service = Mockery::mock(CertificateService::class);
        $service->shouldReceive('generate')
            ->once()
            ->andReturn('certificates/new.pdf');

        $this->app->instance(CertificateService::class, $service);

        $action = app(IssueCertificate::class);
        $certificate = $action->handle($registration->load('certificate'), force: true);

        $this->assertEquals('certificates/new.pdf', $certificate->file_path);
        $this->assertCount(1, Certificate::all());
    }
}
