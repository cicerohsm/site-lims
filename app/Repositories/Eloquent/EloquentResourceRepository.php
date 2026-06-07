<?php

namespace App\Repositories\Eloquent;

use App\Models\Resource;
use App\Repositories\Contracts\ResourceRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class EloquentResourceRepository implements ResourceRepositoryInterface
{
    public function paginate(int $perPage = 12, ?string $type = null, bool $publicOnly = true): LengthAwarePaginator
    {
        return Resource::query()
            ->when($publicOnly, fn ($q) => $q->where('is_public', true))
            ->when($type, fn ($q) => $q->where('type', $type))
            ->orderBy('title')
            ->paginate($perPage);
    }

    public function create(array $data): Resource
    {
        return Resource::create($data);
    }

    public function update(Resource $resource, array $data): Resource
    {
        $resource->update($data);
        return $resource->fresh();
    }

    public function delete(Resource $resource): void
    {
        $resource->delete();
    }
}
