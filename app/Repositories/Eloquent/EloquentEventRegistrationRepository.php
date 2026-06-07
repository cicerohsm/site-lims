<?php

namespace App\Repositories\Eloquent;

use App\Models\Event;
use App\Models\EventRegistration;
use App\Repositories\Contracts\EventRegistrationRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class EloquentEventRegistrationRepository implements EventRegistrationRepositoryInterface
{
    public function paginateByEvent(Event $event, int $perPage = 30): LengthAwarePaginator
    {
        return $event->registrations()
            ->with('certificate')
            ->orderByDesc('created_at')
            ->paginate($perPage);
    }

    public function create(array $data): EventRegistration
    {
        return EventRegistration::create($data);
    }

    public function findByToken(string $token): EventRegistration
    {
        return EventRegistration::with(['event', 'certificate'])
            ->where('token', $token)
            ->firstOrFail();
    }

    public function confirm(EventRegistration $registration): EventRegistration
    {
        $registration->update(['status' => 'confirmed']);
        return $registration->fresh();
    }

    public function confirmAllByEvent(Event $event): int
    {
        return $event->registrations()
            ->where('status', 'pending')
            ->update(['status' => 'confirmed']);
    }
}
