<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class PageResponseTest extends TestCase
{
    use RefreshDatabase;

    public static function pageProvider(): array
    {
        return [
            'home' => ['/', 'Laboratório de Inovação em Sistemas Multimídia'],
            'sobre' => ['/sobre', 'principais núcleos de pesquisa'],
            'projetos' => ['/projetos', 'Trabalhos em destaque'],
            'eventos' => ['/eventos', 'Eventos e participações do LIMS'],
            'equipe' => ['/equipe', 'Equipe do LIMS'],
            'tecnologias' => ['/tecnologias', 'base técnica'],
            'blog' => ['/blog', 'Blog'],
            'publicacoes' => ['/publicacoes', 'Publicações'],
            'certificados' => ['/eventos/certificados/validar', 'Validar certificado'],
            'contato' => ['/contato', 'Contatos com o LIMS'],
        ];
    }

    #[DataProvider('pageProvider')]
    public function test_pages_are_available(string $uri, string $content): void
    {
        $response = $this->get($uri);

        $response
            ->assertOk()
            ->assertSee($content);
    }

    public function test_guest_is_redirected_from_resources_page(): void
    {
        $this->get('/recursos')
            ->assertRedirect(route('login'));
    }

    public function test_fallback_renders_custom_404(): void
    {
        $this->get('/rota-inexistente')
            ->assertNotFound()
            ->assertSee('Erro 404')
            ->assertSee('Voltar para o Início');
    }
}
