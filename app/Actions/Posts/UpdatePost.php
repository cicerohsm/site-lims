<?php

namespace App\Actions\Posts;

use App\Models\Post;
use App\Repositories\Contracts\PostRepositoryInterface;
use Illuminate\Support\Str;

class UpdatePost
{
    public function __construct(private readonly PostRepositoryInterface $repository) {}

    public function handle(Post $post, array $data): Post
    {
        if (isset($data['title']) && ! isset($data['slug'])) {
            $data['slug'] = Str::slug($data['title']);
        }

        if (! empty($data['status']) && $data['status'] === 'published' && empty($post->published_at)) {
            $data['published_at'] = now();
        }

        return $this->repository->update($post, $data);
    }
}
