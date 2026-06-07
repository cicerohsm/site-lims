<?php

namespace Tests\Feature;

use Tests\TestCase;

class LimsSiteContentTest extends TestCase
{
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
            ->assertSee(route('blog'), false)
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

    public function test_events_page_renders_configured_event_cards(): void
    {
        $response = $this->get('/eventos');

        foreach (config('site.lims.events') as $event) {
            $response
                ->assertSee($event['name'])
                ->assertSee($event['type'])
                ->assertSee(asset($event['image']), false);
        }
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
            ->assertSee('GitHub')
            ->assertSee('Contatos com o LIMS');
    }
}
