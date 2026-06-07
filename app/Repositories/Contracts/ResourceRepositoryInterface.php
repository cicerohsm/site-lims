<?php

namespace App\Repositories\Contracts;

use App\Models\Resource;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface ResourceRepositoryInterface
{
    public function paginate(int $perPage = 12, ?string $type = null, bool $publicOnly = true): LengthAwarePaginator;

    public function create(array $data): Resource;

    public function update(Resource $resource, array $data): Resource;

    public function delete(Resource $resource): void;
}
