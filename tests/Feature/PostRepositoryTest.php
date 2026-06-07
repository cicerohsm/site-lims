<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\PostCategory;
use App\Models\User;
use App\Repositories\Contracts\PostRepositoryInterface;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostRepositoryTest extends TestCase
{
    use RefreshDatabase;

    private PostRepositoryInterface $repo;

    protected function setUp(): void
    {
        parent::setUp();
        $this->repo = app(PostRepositoryInterface::class);
    }

    public function test_create_post(): void
    {
        $author = User::factory()->create();
        $post = $this->repo->create([
            'author_id' => $author->id,
            'title' => 'Primeiro Post',
            'slug' => 'primeiro-post',
            'body' => 'Conteúdo do post.',
            'status' => 'published',
            'published_at' => now(),
        ]);

        $this->assertInstanceOf(Post::class, $post);
        $this->assertDatabaseHas('posts', ['slug' => 'primeiro-post']);
    }

    public function test_paginate_only_published(): void
    {
        $author = User::factory()->create();

        Post::factory()->create(['author_id' => $author->id, 'status' => 'draft']);
        Post::factory()->create(['author_id' => $author->id, 'status' => 'published', 'published_at' => now()]);

        $result = $this->repo->paginate(12, null);

        $this->assertEquals(1, $result->total());
    }

    public function test_find_by_slug(): void
    {
        $author = User::factory()->create();
        Post::factory()->create([
            'author_id' => $author->id,
            'slug' => 'meu-post',
            'status' => 'published',
            'published_at' => now(),
        ]);

        $post = $this->repo->findBySlug('meu-post');

        $this->assertEquals('meu-post', $post->slug);
    }

    public function test_paginate_filtered_by_category(): void
    {
        $author = User::factory()->create();
        $catA = PostCategory::factory()->create(['name' => 'Pesquisa', 'slug' => 'pesquisa']);
        $catB = PostCategory::factory()->create(['name' => 'Extensão', 'slug' => 'extensao']);

        Post::factory()->create([
            'author_id' => $author->id,
            'post_category_id' => $catA->id,
            'status' => 'published',
            'published_at' => now(),
        ]);
        Post::factory()->create([
            'author_id' => $author->id,
            'post_category_id' => $catB->id,
            'status' => 'published',
            'published_at' => now(),
        ]);

        $result = $this->repo->paginate(12, 'pesquisa');

        $this->assertEquals(1, $result->total());
    }
}
