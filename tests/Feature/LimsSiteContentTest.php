<?php

namespace Tests\Feature;

use App\Models\Event;
use App\Models\Publication;
use App\Models\Technology;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LimsSiteContentTest extends TestCase
{
    use RefreshDatabase;

    public function test_home_header_renders_lims_navigation_and_enter_button(): void
    {
        $response = $this->get('/');

        $response
            ->assertOk()
            ->assertSee('assets/brands/lims-logo.svg', false)
            ->assertSee('Entrar')
            ->assertSee(route('about'), false)
            ->assertSee(route('projects'), false)
            ->assertSee(route('events'), false)
            ->assertSee(route('team'), false)
            ->assertSee(route('technologies'), false)
            ->assertSee(route('blog.index'), false)
            ->assertSee(route('contact.show'), false);
    }

    public function test_home_hero_renders_all_configured_carousel_images(): void
    {
        $response = $this->get('/');

        foreach (config('site.lims.hero_slides') as $slide) {
            $response
                ->assertSee($slide['title'])
                ->assertSee($slide['description'])
                ->assertSee(asset($slide['image']), false);
        }
    }

    public function test_home_renders_featured_publications(): void
    {
        Publication::factory()->create([
            'title' => 'Sistema Multimídia para Educação',
            'authors' => 'Equipe LIMS',
            'year' => 2026,
            'venue' => 'Mostra Científica',
            'type' => 'article',
        ]);

        $this->get('/')
            ->assertOk()
            ->assertSee('Trabalhos em destaque')
            ->assertSee('Sistema Multimídia para Educação')
            ->assertSee('Equipe LIMS')
            ->assertSee(route('publications.index'), false);
    }

    public function test_home_renders_configured_technologies_from_admin_data(): void
    {
        Technology::factory()->create([
            'title' => 'Internet das Coisas',
            'is_active' => true,
        ]);

        $this->get('/')
            ->assertOk()
            ->assertSee('Frentes técnicas do laboratório')
            ->assertSee('Internet das Coisas');
    }

    public function test_projects_page_renders_configured_project_cards(): void
    {
        $response = $this->get('/projetos');

        foreach (config('site.lims.projects') as $project) {
            $response
                ->assertSee($project['name'])
                ->assertSee($project['responsible'])
                ->assertSee($project['event'])
                ->assertSee($project['article']);
        }
    }

    public function test_events_page_renders_published_event_cards(): void
    {
        Event::factory()->create([
            'title' => 'Evento Publicado Antigo',
            'status' => 'published',
            'created_at' => now()->subDay(),
            'updated_at' => now()->subDay(),
        ]);
        $event = Event::factory()->create([
            'title' => 'Oficina de Desenvolvimento Web',
            'slug' => 'oficina-desenvolvimento-web',
            'type' => 'workshop',
            'status' => 'published',
            'registration_open' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $response = $this->get('/eventos');

        $response
            ->assertOk()
            ->assertSee($event->title)
            ->assertSee($event->type)
            ->assertSee(route('events.show', $event->slug), false)
            ->assertSee('Ver inscrição')
            ->assertSee('Último evento publicado')
            ->assertSee('Oficina de Desenvolvimento Web');
    }

    public function test_footer_renders_lims_ifpi_and_social_links(): void
    {
        $response = $this->get('/');

        $response
            ->assertSee('assets/brands/lims-logo.svg', false)
            ->assertSee('assets/brands/ifpi-teresina-white.svg', false)
            ->assertSee('Redes sociais do LIMS')
            ->assertSee('Instagram')
            ->assertSee('LinkedIn')
            ->assertSee('https://www.instagram.com/ifpilims/', false)
            ->assertSee('https://www.linkedin.com/company/ifpi-lims/', false)
            ->assertDontSee('GitHub')
            ->assertSee('Contatos com o LIMS');
    }
}
