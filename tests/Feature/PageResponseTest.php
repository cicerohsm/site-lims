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
            'recursos' => ['/recursos', 'Recursos'],
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

    public function test_fallback_renders_custom_404(): void
    {
        $this->get('/rota-inexistente')
            ->assertNotFound()
            ->assertSee('Erro 404')
            ->assertSee('Voltar para o Início');
    }
}
