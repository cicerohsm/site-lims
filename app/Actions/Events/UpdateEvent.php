<?php

namespace App\Actions\Events;

use App\Models\Event;
use App\Repositories\Contracts\EventRepositoryInterface;

class UpdateEvent
{
    public function __construct(private readonly EventRepositoryInterface $repository) {}

    public function handle(Event $event, array $data): Event
    {
        return $this->repository->update($event, $data);
    }
}
