<?php

namespace App\Actions\Resources;

use App\Models\Resource;
use App\Repositories\Contracts\ResourceRepositoryInterface;

class DeleteResource
{
    public function __construct(private readonly ResourceRepositoryInterface $repository) {}

    public function handle(Resource $resource): void
    {
        $this->repository->delete($resource);
    }
}
