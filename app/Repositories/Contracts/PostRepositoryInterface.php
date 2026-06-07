<?php

namespace App\Repositories\Contracts;

use App\Models\Post;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface PostRepositoryInterface
{
    public function paginate(int $perPage = 12, ?string $categorySlug = null): LengthAwarePaginator;

    public function paginateAll(int $perPage = 20): LengthAwarePaginator;

    public function findBySlug(string $slug): Post;

    public function create(array $data): Post;

    public function update(Post $post, array $data): Post;

    public function delete(Post $post): void;
}
