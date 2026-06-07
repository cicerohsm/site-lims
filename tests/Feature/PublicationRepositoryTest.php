<?php

namespace Tests\Feature;

use App\Models\Publication;
use App\Repositories\Contracts\PublicationRepositoryInterface;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PublicationRepositoryTest extends TestCase
{
    use RefreshDatabase;

    private PublicationRepositoryInterface $repo;

    protected function setUp(): void
    {
        parent::setUp();
        $this->repo = app(PublicationRepositoryInterface::class);
    }

    public function test_create_publication(): void
    {
        $pub = $this->repo->create([
            'title' => 'Artigo de Exemplo',
            'authors' => 'Autor A, Autor B',
            'year' => 2024,
            'type' => 'article',
        ]);

        $this->assertInstanceOf(Publication::class, $pub);
        $this->assertDatabaseHas('publications', ['title' => 'Artigo de Exemplo']);
    }

    public function test_paginate_all(): void
    {
        Publication::factory()->count(3)->create(['type' => 'article']);
        Publication::factory()->count(2)->create(['type' => 'tcc']);

        $result = $this->repo->paginate(10, null, null);

        $this->assertEquals(5, $result->total());
    }

    public function test_paginate_filtered_by_type(): void
    {
        Publication::factory()->count(3)->create(['type' => 'article']);
        Publication::factory()->count(2)->create(['type' => 'tcc']);

        $result = $this->repo->paginate(10, 'tcc', null);

        $this->assertEquals(2, $result->total());
    }

    public function test_paginate_filtered_by_year(): void
    {
        Publication::factory()->create(['type' => 'article', 'year' => 2023]);
        Publication::factory()->create(['type' => 'article', 'year' => 2024]);

        $result = $this->repo->paginate(10, null, 2024);

        $this->assertEquals(1, $result->total());
    }
}
