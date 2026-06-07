<?php

namespace App\Actions\Publications;

use App\Models\Publication;
use App\Repositories\Contracts\PublicationRepositoryInterface;

class UpdatePublication
{
    public function __construct(private readonly PublicationRepositoryInterface $repository) {}

    public function handle(Publication $publication, array $data): Publication
    {
        return $this->repository->update($publication, $data);
    }
}
