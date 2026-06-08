<?php

namespace App\Repositories\Contracts;

use App\Models\Event;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

interface EventRepositoryInterface
{
    public function paginate(int $perPage = 12): LengthAwarePaginator;

    public function paginateAll(int $perPage = 20): LengthAwarePaginator;

    public function findBySlug(string $slug): Event;

    public function upcoming(int $limit = 4): Collection;

    public function latestPublished(): ?Event;

    public function create(array $data): Event;

    public function update(Event $event, array $data): Event;

    public function delete(Event $event): void;
}
