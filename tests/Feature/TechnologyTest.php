<?php

namespace Tests\Feature;

use App\Models\Technology;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TechnologyTest extends TestCase
{
    use RefreshDatabase;

    public function test_technologies_page_renders_active_technologies(): void
    {
        Technology::factory()->create([
            'title' => 'Tecnologia assistiva',
            'description' => 'Soluções para acessibilidade.',
            'icon' => 'chip',
            'sort_order' => 1,
            'is_active' => true,
        ]);
        Technology::factory()->create([
            'title' => 'Frente oculta',
            'is_active' => false,
        ]);

        $this->get('/tecnologias')
            ->assertOk()
            ->assertSee('Tecnologia assistiva')
            ->assertSee('Soluções para acessibilidade.')
            ->assertDontSee('Frente oculta');
    }

    public function test_admin_can_create_technology(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);

        $this->actingAs($admin)
            ->post(route('admin.technologies.store'), [
                'title' => 'Internet das Coisas',
                'description' => 'Dispositivos conectados aplicados a projetos do LIMS.',
                'icon' => 'wifi',
                'sort_order' => 2,
                'is_active' => '1',
            ])
            ->assertRedirect(route('admin.technologies.index'));

        $this->assertDatabaseHas('technologies', [
            'title' => 'Internet das Coisas',
            'icon' => 'wifi',
            'is_active' => true,
        ]);
    }

    public function test_admin_can_list_technologies(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);
        Technology::factory()->create(['title' => 'Modelagem 3D']);

        $this->actingAs($admin)
            ->get(route('admin.technologies.index'))
            ->assertOk()
            ->assertSee('Modelagem 3D');
    }
}
