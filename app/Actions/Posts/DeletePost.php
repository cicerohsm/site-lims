<?php

namespace App\Actions\Posts;

use App\Models\Post;
use App\Repositories\Contracts\PostRepositoryInterface;

class DeletePost
{
    public function __construct(private readonly PostRepositoryInterface $repository) {}

    public function handle(Post $post): void
    {
        $this->repository->delete($post);
    }
}
