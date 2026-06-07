<?php

namespace App\Repositories\Eloquent;

use App\Models\Post;
use App\Models\PostCategory;
use App\Repositories\Contracts\PostRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class EloquentPostRepository implements PostRepositoryInterface
{
    public function paginate(int $perPage = 12, ?string $categorySlug = null): LengthAwarePaginator
    {
        return Post::published()
            ->with(['category', 'author'])
            ->when($categorySlug, function ($query) use ($categorySlug) {
                $query->whereHas('category', fn ($q) => $q->where('slug', $categorySlug));
            })
            ->orderByDesc('published_at')
            ->paginate($perPage);
    }

    public function paginateAll(int $perPage = 20): LengthAwarePaginator
    {
        return Post::with(['category', 'author'])
            ->orderByDesc('created_at')
            ->paginate($perPage);
    }

    public function findBySlug(string $slug): Post
    {
        return Post::with(['category', 'author'])->where('slug', $slug)->firstOrFail();
    }

    public function create(array $data): Post
    {
        return Post::create($data);
    }

    public function update(Post $post, array $data): Post
    {
        $post->update($data);
        return $post->fresh();
    }

    public function delete(Post $post): void
    {
        $post->delete();
    }
}
