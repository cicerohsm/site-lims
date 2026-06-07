<?php

namespace App\Repositories\Contracts;

use App\Models\Event;
use App\Models\EventRegistration;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface EventRegistrationRepositoryInterface
{
    public function paginateByEvent(Event $event, int $perPage = 30): LengthAwarePaginator;

    public function create(array $data): EventRegistration;

    public function findByToken(string $token): EventRegistration;

    public function confirm(EventRegistration $registration): EventRegistration;

    public function confirmAllByEvent(Event $event): int;
}
