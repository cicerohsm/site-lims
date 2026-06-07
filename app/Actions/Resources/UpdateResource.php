<?php

namespace App\Actions\Resources;

use App\Models\Resource;
use App\Repositories\Contracts\ResourceRepositoryInterface;

class UpdateResource
{
    public function __construct(private readonly ResourceRepositoryInterface $repository) {}

    public function handle(Resource $resource, array $data): Resource
    {
        return $this->repository->update($resource, $data);
    }
}
