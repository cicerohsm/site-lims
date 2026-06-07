<?php

namespace App\Actions\Events;

use App\Models\Event;
use App\Repositories\Contracts\EventRepositoryInterface;
use Illuminate\Support\Str;

class CreateEvent
{
    public function __construct(private readonly EventRepositoryInterface $repository) {}

    public function handle(array $data): Event
    {
        $data['slug'] = $data['slug'] ?? Str::slug($data['title']);
        return $this->repository->create($data);
    }
}
