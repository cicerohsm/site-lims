<?php

namespace App\Actions\Publications;

use App\Models\Publication;
use App\Repositories\Contracts\PublicationRepositoryInterface;

class CreatePublication
{
    public function __construct(private readonly PublicationRepositoryInterface $repository) {}

    public function handle(array $data): Publication
    {
        return $this->repository->create($data);
    }
}
