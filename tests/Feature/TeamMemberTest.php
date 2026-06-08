<?php

namespace Tests\Feature;

use App\Models\TeamMember;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class TeamMemberTest extends TestCase
{
    use RefreshDatabase;

    public function test_team_page_renders_active_team_members(): void
    {
        TeamMember::factory()->create([
            'name' => 'Ada Lovelace',
            'role' => 'Pesquisa e desenvolvimento',
            'bio' => 'Atua em projetos de pesquisa aplicada.',
            'sort_order' => 1,
            'is_active' => true,
        ]);
        TeamMember::factory()->create([
            'name' => 'Membro Oculto',
            'is_active' => false,
        ]);

        $this->get('/equipe')
            ->assertOk()
            ->assertSee('Ada Lovelace')
            ->assertSee('Pesquisa e desenvolvimento')
            ->assertSee('Atua em projetos de pesquisa aplicada.')
            ->assertDontSee('Membro Oculto');
    }

    public function test_admin_can_create_team_member_with_photo(): void
    {
        Storage::fake('public');
        $admin = User::factory()->create(['is_admin' => true]);

        $this->actingAs($admin)
            ->post(route('admin.team-members.store'), [
                'name' => 'Grace Hopper',
                'role' => 'Coordenação',
                'bio' => 'Bio cadastrada pelo admin.',
                'photo' => UploadedFile::fake()->image('grace.jpg'),
                'lattes_url' => 'https://lattes.cnpq.br/123',
                'linkedin_url' => 'https://www.linkedin.com/in/grace',
                'sort_order' => 2,
                'is_active' => '1',
            ])
            ->assertRedirect(route('admin.team-members.index'));

        $member = TeamMember::firstOrFail();

        $this->assertSame('Grace Hopper', $member->name);
        $this->assertTrue($member->is_active);
        $this->assertNotNull($member->photo_path);
        Storage::disk('public')->assertExists($member->photo_path);
    }

    public function test_admin_can_list_team_members(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);
        TeamMember::factory()->create(['name' => 'Katherine Johnson']);

        $this->actingAs($admin)
            ->get(route('admin.team-members.index'))
            ->assertOk()
            ->assertSee('Katherine Johnson');
    }
}
