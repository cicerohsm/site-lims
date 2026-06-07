<?php

namespace App\Actions\Posts;

use App\Models\Post;
use App\Models\User;
use App\Repositories\Contracts\PostRepositoryInterface;
use Illuminate\Support\Str;

class CreatePost
{
    public function __construct(private readonly PostRepositoryInterface $repository) {}

    public function handle(User $author, array $data): Post
    {
        $data['author_id'] = $author->id;
        $data['slug'] = $data['slug'] ?? Str::slug($data['title']);

        if (! empty($data['status']) && $data['status'] === 'published' && empty($data['published_at'])) {
            $data['published_at'] = now();
        }

        return $this->repository->create($data);
    }
}
