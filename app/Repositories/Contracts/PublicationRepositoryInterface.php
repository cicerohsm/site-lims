<?php

namespace App\Repositories\Contracts;

use App\Models\Publication;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface PublicationRepositoryInterface
{
    public function paginate(int $perPage = 15, ?string $type = null, ?int $year = null): LengthAwarePaginator;

    public function create(array $data): Publication;

    public function update(Publication $publication, array $data): Publication;

    public function delete(Publication $publication): void;
}
