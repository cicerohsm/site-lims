<?php

namespace App\Actions\Resources;

use App\Models\Resource;
use App\Repositories\Contracts\ResourceRepositoryInterface;

class CreateResource
{
    public function __construct(private readonly ResourceRepositoryInterface $repository) {}

    public function handle(array $data): Resource
    {
        return $this->repository->create($data);
    }
}
