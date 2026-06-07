<?php

namespace App\Repositories\Eloquent;

use App\Models\Event;
use App\Repositories\Contracts\EventRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class EloquentEventRepository implements EventRepositoryInterface
{
    public function paginate(int $perPage = 12): LengthAwarePaginator
    {
        return Event::published()
            ->orderByDesc('starts_at')
            ->paginate($perPage);
    }

    public function paginateAll(int $perPage = 20): LengthAwarePaginator
    {
        return Event::orderByDesc('starts_at')->paginate($perPage);
    }

    public function findBySlug(string $slug): Event
    {
        return Event::where('slug', $slug)->firstOrFail();
    }

    public function upcoming(int $limit = 4): Collection
    {
        return Event::published()
            ->where('starts_at', '>=', now())
            ->orderBy('starts_at')
            ->limit($limit)
            ->get();
    }

    public function create(array $data): Event
    {
        return Event::create($data);
    }

    public function update(Event $event, array $data): Event
    {
        $event->update($data);
        return $event->fresh();
    }

    public function delete(Event $event): void
    {
        $event->delete();
    }
}
