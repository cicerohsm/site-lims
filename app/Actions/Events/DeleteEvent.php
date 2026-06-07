<?php

namespace App\Actions\Events;

use App\Models\Event;
use App\Repositories\Contracts\EventRepositoryInterface;

class DeleteEvent
{
    public function __construct(private readonly EventRepositoryInterface $repository) {}

    public function handle(Event $event): void
    {
        $this->repository->delete($event);
    }
}
