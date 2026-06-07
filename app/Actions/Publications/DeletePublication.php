<?php

namespace App\Actions\Publications;

use App\Models\Publication;
use App\Repositories\Contracts\PublicationRepositoryInterface;

class DeletePublication
{
    public function __construct(private readonly PublicationRepositoryInterface $repository) {}

    public function handle(Publication $publication): void
    {
        $this->repository->delete($publication);
    }
}
