<?php

return [
    'company' => [
        'name' => 'LIMS',
        'short_name' => 'LIMS',
        'tagline' => 'Laboratório de Inovação em Sistemas Multimídia.',
        'description' => 'Portal institucional do LIMS, laboratório de pesquisa e extensão em tecnologia do IFPI - Campus Teresina Central.',
        'headquarters' => 'IFPI - Campus Teresina Central',
        'service_model' => 'Pesquisa, desenvolvimento, inovação e extensão',
        'social' => [
            [
                'label' => 'Instagram',
                'url' => '#',
            ],
            [
                'label' => 'LinkedIn',
                'url' => '#',
            ],
            [
                'label' => 'GitHub',
                'url' => '#',
            ],
        ],
    ],

    'themes' => [
        'group' => [
            'label' => 'LIMS',
            'accent' => '#0783c2',
            'accent_strong' => '#035d8c',
            'soft' => '#e6f6fd',
            'surface' => '#f7fcff',
            'border' => '#9bdcf4',
            'gradient_from' => '#06283a',
            'gradient_to' => '#0488c8',
        ],
        'lims-red' => [
            'label' => 'LIMS Vermelho',
            'accent' => '#dc171d',
            'accent_strong' => '#9f1116',
            'soft' => '#fff0f1',
            'surface' => '#fff8f8',
            'border' => '#f3a5a8',
            'gradient_from' => '#330507',
            'gradient_to' => '#dc171d',
        ],
        'lims-green' => [
            'label' => 'LIMS Verde',
            'accent' => '#2fa143',
            'accent_strong' => '#1f7330',
            'soft' => '#ecf8ef',
            'surface' => '#f7fcf8',
            'border' => '#a5ddb0',
            'gradient_from' => '#062d10',
            'gradient_to' => '#2fa143',
        ],
    ],

    'navigation' => [
        [
            'label' => 'Início',
            'route' => 'home',
            'patterns' => ['home'],
        ],
        [
            'label' => 'Sobre',
            'route' => 'about',
            'patterns' => ['about'],
        ],
        [
            'label' => 'Projetos',
            'route' => 'projects',
            'patterns' => ['projects'],
        ],
        [
            'label' => 'Eventos',
            'route' => 'events',
            'patterns' => ['events'],
        ],
        [
            'label' => 'Time',
            'route' => 'team',
            'patterns' => ['team'],
        ],
        [
            'label' => 'Tecnologias',
            'route' => 'technologies',
            'patterns' => ['technologies'],
        ],
        [
            'label' => 'Blog',
            'route' => 'blog',
            'patterns' => ['blog'],
        ],
    ],

    'meta' => [
        'home' => [
            'title' => 'LIMS | Laboratório de Inovação em Sistemas Multimídia',
            'description' => 'Conheça o LIMS, seus projetos, equipe, tecnologias, publicações e canais de contato.',
        ],
        'about' => [
            'title' => 'Sobre | LIMS',
            'description' => 'História, atuação, coordenação e principais frentes do Laboratório de Inovação em Sistemas Multimídia.',
        ],
        'projects' => [
            'title' => 'Projetos | LIMS',
            'description' => 'Trabalhos, projetos, responsáveis, eventos e publicações vinculadas ao LIMS.',
        ],
        'events' => [
            'title' => 'Eventos | LIMS',
            'description' => 'Eventos, apresentações, oficinas e participações acadêmicas do LIMS.',
        ],
        'team' => [
            'title' => 'Time | LIMS',
            'description' => 'Equipe do LIMS com participantes, funções e descrições.',
        ],
        'technologies' => [
            'title' => 'Tecnologias | LIMS',
            'description' => 'Tecnologias, métodos e áreas técnicas trabalhadas no LIMS.',
        ],
        'blog' => [
            'title' => 'Blog | LIMS',
            'description' => 'Espaço futuro para artigos informativos e difusão de conhecimento do LIMS.',
        ],
        'contact' => [
            'title' => 'Fale Conosco | LIMS',
            'description' => 'Entre em contato com o LIMS para projetos, parcerias, pesquisa, extensão e informações institucionais.',
        ],
        'not-found' => [
            'title' => 'Página não encontrada | LIMS',
            'description' => 'A página que você tentou acessar não foi encontrada. Retorne ao início ou explore os projetos do LIMS.',
        ],
    ],

    'lims' => [
        'logo' => 'assets/brands/lims-logo.svg',
        'palette' => [
            'primary' => '#0783c2',
            'secondary' => '#dc171d',
            'tertiary' => '#2fa143',
        ],
        'hero_slides' => [
            [
                'eyebrow' => 'IFPI Teresina Central',
                'title' => 'Um laboratório onde teoria vira projeto aplicado.',
                'description' => 'Desde 2006, o LIMS movimenta pesquisa, extensão e desenvolvimento de software com foco em soluções reais para a sociedade.',
                'image' => 'assets/lims/carousel/slide-1.jpg',
            ],
            [
                'eyebrow' => 'Pesquisa e extensão',
                'title' => 'Hardware, software e multimídia em produtos reais.',
                'description' => 'Alunos de cursos técnicos e superiores desenvolvem artigos científicos, TCCs, protótipos e soluções aplicadas.',
                'image' => 'assets/lims/carousel/slide-2.jpg',
            ],
            [
                'eyebrow' => 'Impacto social',
                'title' => 'Tecnologia assistiva, IoT, sustentabilidade e STEAM.',
                'description' => 'As frentes do LIMS conectam automação, acessibilidade, educação e inovação para tornar a vida mais confortável e acessível.',
                'image' => 'assets/lims/carousel/slide-3.jpg',
            ],
            [
                'eyebrow' => 'Ambiente colaborativo',
                'title' => 'Formação prática para a cena local de software.',
                'description' => 'O laboratório fomenta programação, APIs, frameworks, arquitetura de sistemas e criação de soluções em um ecossistema prático.',
                'image' => 'assets/lims/carousel/slide-4.jpg',
            ],
        ],
        'about_points' => [
            'Criado em 2006, o LIMS é um dos principais núcleos de pesquisa e extensão em tecnologia do IFPI - Campus Teresina Central.',
            'O laboratório transforma a teoria da sala de aula em projetos aplicados, movimentando a cena local de desenvolvimento de software.',
            'O propósito central é desenvolver soluções que tornem a vida mais confortável e acessível, integrando hardware e software.',
            'O espaço reúne alunos de cursos técnicos e superiores que produzem artigos científicos, TCCs, protótipos e produtos reais.',
        ],
        'projects' => [
            [
                'name' => 'Tecnologia assistiva',
                'responsible' => 'Equipe LIMS',
                'year' => '2026',
                'event' => 'Pesquisa aplicada',
                'article' => 'Artigos e TCCs',
                'description' => 'Sistemas computacionais para apoiar diagnóstico de autismo e ferramentas para autonomia de pessoas com deficiência física ou baixa visão.',
            ],
            [
                'name' => 'Internet das Coisas',
                'responsible' => 'Coordenação LIMS',
                'year' => '2026',
                'event' => 'Automação',
                'article' => 'Linha de pesquisa',
                'description' => 'Pesquisa para conectar dispositivos físicos à internet e criar ambientes, rotinas e processos automatizados.',
            ],
            [
                'name' => 'Your Student Space',
                'responsible' => 'Pesquisadores associados',
                'year' => '2026',
                'event' => 'Finalista FEBRACE',
                'article' => 'Educação STEAM',
                'description' => 'Ambiente virtual intuitivo para incentivar a inclusão de alunos de escolas públicas em atividades extracurriculares.',
            ],
            [
                'name' => 'Filamentos 3D sustentáveis',
                'responsible' => 'LIMS e Laboratório de Química do IFPI',
                'year' => '2026',
                'event' => 'Sustentabilidade',
                'article' => 'Modelagem 3D',
                'description' => 'Pesquisa para criação de filamentos de impressão 3D sustentáveis a partir de garrafas PET recicladas.',
            ],
        ],
        'team' => [
            [
                'name' => 'Coordenador do LIMS',
                'role' => 'Coordenação',
                'description' => 'Responsável por orientar linhas de pesquisa, supervisionar projetos e articular parcerias acadêmicas.',
                'initials' => 'CL',
            ],
            [
                'name' => 'Pesquisador participante',
                'role' => 'Pesquisa e desenvolvimento',
                'description' => 'Atua no desenvolvimento de protótipos, experimentos, documentação técnica e produção científica.',
                'initials' => 'PP',
            ],
            [
                'name' => 'Bolsista / estudante',
                'role' => 'Iniciação científica',
                'description' => 'Participa da implementação, testes, coleta de dados e apoio às entregas do laboratório.',
                'initials' => 'BE',
            ],
        ],
        'technologies' => [
            'Desenvolvimento web',
            'Interfaces multimídia',
            'Tecnologia assistiva',
            'Internet das Coisas',
            'Modelagem e impressão 3D',
            'Educação STEAM',
            'APIs e frameworks',
            'Hardware e software integrados',
        ],
        'events' => [
            [
                'name' => 'Apresentações acadêmicas',
                'date' => '2025',
                'type' => 'Mostra e seminário',
                'image' => 'assets/lims/carousel/slide-1.jpg',
                'description' => 'Participação em apresentações, rodas de conversa e momentos de exposição de projetos vinculados ao laboratório.',
            ],
            [
                'name' => 'Equipes e projetos em evento',
                'date' => '2025',
                'type' => 'Pesquisa e extensão',
                'image' => 'assets/lims/carousel/slide-2.jpg',
                'description' => 'Registro de atividades com estudantes e pesquisadores em eventos de tecnologia, inovação e empreendedorismo.',
            ],
            [
                'name' => 'Encontros de integração',
                'date' => '2025',
                'type' => 'Comunidade LIMS',
                'image' => 'assets/lims/carousel/slide-3.jpg',
                'description' => 'Ações para integrar participantes, divulgar trabalhos e fortalecer a comunidade acadêmica do laboratório.',
            ],
            [
                'name' => 'Atividades no laboratório',
                'date' => '2025',
                'type' => 'Formação prática',
                'image' => 'assets/lims/carousel/slide-4.jpg',
                'description' => 'Momentos de desenvolvimento, aprendizagem, experimentação e colaboração em sala/laboratório.',
            ],
        ],
        'contacts' => [
            ['label' => 'E-mail', 'value' => 'contato@lims.edu.br', 'href' => 'mailto:contato@lims.edu.br'],
            ['label' => 'Localização', 'value' => 'Teresina - PI', 'href' => '#'],
            ['label' => 'Parcerias', 'value' => 'Projetos, pesquisa e extensão', 'href' => '/contato'],
        ],
    ],
];
