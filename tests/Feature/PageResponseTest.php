<?php

namespace Tests\Feature;

use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class PageResponseTest extends TestCase
{
    public static function pageProvider(): array
    {
        return [
            'home' => ['/', 'Laboratório de Inovação em Sistemas Multimídia'],
            'sobre' => ['/sobre', 'principais núcleos de pesquisa e extensão em tecnologia do IFPI'],
            'projetos' => ['/projetos', 'Trabalhos do LIMS'],
            'eventos' => ['/eventos', 'Eventos e participações do LIMS'],
            'time' => ['/time', 'Equipe do LIMS'],
            'tecnologias' => ['/tecnologias', 'Base técnica dos projetos'],
            'blog' => ['/blog', 'Artigos informativos do LIMS'],
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
