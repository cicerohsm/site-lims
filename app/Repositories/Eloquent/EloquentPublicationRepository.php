<?php

namespace App\Repositories\Eloquent;

use App\Models\Publication;
use App\Repositories\Contracts\PublicationRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class EloquentPublicationRepository implements PublicationRepositoryInterface
{
    public function paginate(int $perPage = 15, ?string $type = null, ?int $year = null): LengthAwarePaginator
    {
        return Publication::query()
            ->when($type, fn ($q) => $q->where('type', $type))
            ->when($year, fn ($q) => $q->where('year', $year))
            ->orderByDesc('year')
            ->orderBy('title')
            ->paginate($perPage);
    }

    public function create(array $data): Publication
    {
        return Publication::create($data);
    }

    public function update(Publication $publication, array $data): Publication
    {
        $publication->update($data);
        return $publication->fresh();
    }

    public function delete(Publication $publication): void
    {
        $publication->delete();
    }
}
