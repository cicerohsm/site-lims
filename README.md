# LIMS - Site Institucional

Site institucional do Laboratório de Inovação em Sistemas Multimídia (LIMS), do IFPI Campus Teresina Central.

## Stack

- PHP 8.3
- Laravel 13
- Blade
- Tailwind CSS 4
- Vite
- PostgreSQL
- Docker
- Docker Compose
- Nginx
- Node 22

## Funcionalidades

- Páginas institucionais: Início, Sobre, Projetos, Eventos, Time, Tecnologias, Publicações, Blog e Contato.
- Painel administrativo para gerenciar posts, publicações, recursos, eventos, time e tecnologias.
- Cadastro público em eventos.
- Confirmação de inscrições no admin.
- Geração de certificados em PDF para participantes confirmados.
- Validação pública de certificados por código em `/eventos/certificados/validar`.
- Página pública de eventos alimentada pelos eventos publicados no admin.
- Banner de destaque em Eventos com o último evento publicado.
- Página Time alimentada por membros cadastrados no admin, com foto, função, biografia, Lattes e LinkedIn.
- Frentes tecnológicas alimentadas por cadastro administrativo.
- Trabalhos em destaque na Home alimentados por publicações cadastradas.
- Recursos protegidos por autenticação.
- 404 personalizada.

## Dados Institucionais

- Nome: Laboratório de Inovação em Sistemas Multimídia (LIMS)
- E-mail: `lims@ifpi.edu.br`
- Instagram: `https://www.instagram.com/ifpilims/`
- LinkedIn: `https://www.linkedin.com/company/ifpi-lims/`
- Endereço: `R. Quintino Bocaiúva, 141 - Centro (Sul), Teresina - PI, 64001-270`

## Configuração Inicial

1. Copie o arquivo de ambiente:

```bash
cp .env.example .env
```

2. Instale dependências PHP:

```bash
composer install
```

3. Instale dependências front-end:

```bash
npm install
```

4. Gere a chave da aplicação:

```bash
php artisan key:generate
```

5. Rode migrations e seeders:

```bash
php artisan migrate --seed
```

6. Crie o link de storage para uploads públicos:

```bash
php artisan storage:link
```

## Acesso Admin

O seeder cria um usuário administrador padrão:

```text
Email: admin@lims.ifpi.edu.br
Senha: password
```

Rotas principais:

- Login: `/login`
- Painel admin: `/admin`
- Eventos admin: `/admin/events`
- Time admin: `/admin/team-members`
- Tecnologias admin: `/admin/technologies`
- Publicações admin: `/admin/publications`

## Ambiente com Docker

### Subir aplicação

```bash
docker compose up -d postgres app nginx
```

### Instalar dependências PHP pelo container

```bash
docker compose run --rm app composer install
```

### Gerar chave pelo container

```bash
docker compose run --rm app php artisan key:generate
```

### Rodar migrations e seeders pelo container

```bash
docker compose run --rm app php artisan migrate --seed
```

### Criar link de storage pelo container

```bash
docker compose run --rm app php artisan storage:link
```

### Rodar Vite no serviço Node

```bash
docker compose up -d node
```

### Acessos com Docker

- Site Laravel via Nginx: `http://localhost:8080`
- Vite dev server: `http://localhost:5173`
- PostgreSQL: `localhost:5432`

## Rodando Localmente sem Docker

Para rodar sem Docker, ajuste o `.env` para o banco local desejado e execute:

```bash
php artisan serve
npm run dev
```

Se usar SQLite localmente, configure `DB_CONNECTION=sqlite` e crie o arquivo:

```bash
touch database/database.sqlite
php artisan migrate --seed
```

## Rotas Públicas Principais

- `/` - Home
- `/sobre` - Sobre
- `/projetos` - Projetos
- `/eventos` - Eventos publicados
- `/eventos/{slug}` - Detalhe do evento
- `/eventos/{slug}/inscricao` - Inscrição pública no evento
- `/eventos/certificados/validar` - Validação pública de certificados
- `/certificado/{token}` - Página do certificado/inscrição
- `/certificado/{token}/download` - Download do certificado
- `/equipe` - Time
- `/tecnologias` - Frentes tecnológicas
- `/publicacoes` - Publicações
- `/blog` - Blog
- `/contato` - Contato
- `/recursos` - Recursos protegidos por login

## Certificados

O fluxo de certificados funciona assim:

1. O participante se inscreve em um evento.
2. O admin confirma a inscrição em `/admin/events/{event}/registrations`.
3. O admin gera os certificados do evento.
4. O participante baixa o PDF em `/certificado/{token}/download`.
5. Qualquer pessoa pode validar o código do certificado em `/eventos/certificados/validar`.

O PDF do certificado inclui:

- Logo do LIMS.
- Logo do IFPI Campus Teresina Central.
- Nome do participante.
- Nome do evento.
- Data por extenso em português.
- Carga horária quando houver data de término.
- Código de validação.

## Build de Produção

```bash
npm run build
```

## Testes

```bash
php artisan test
```

## Estrutura de Manutenção

- Configurações institucionais e navegação: `config/site.php`
- Rotas web: `routes/web.php`
- Páginas públicas: `resources/views/pages/`
- Componentes Blade: `resources/views/components/`
- Views admin: `resources/views/admin/`
- Certificado PDF: `resources/views/pdf/certificate.blade.php`
- Controllers admin: `app/Http/Controllers/Admin/`
- Models: `app/Models/`
- Migrations: `database/migrations/`
- Factories: `database/factories/`

## Conteúdos Administráveis

- Posts: `Post`
- Publicações: `Publication`
- Recursos: `Resource`
- Eventos: `Event`
- Inscrições: `EventRegistration`
- Certificados: `Certificate`
- Time: `TeamMember`
- Tecnologias: `Technology`

## Deploy na Railway

O `Dockerfile` da raiz está preparado para deploy na Railway.

### Variáveis Obrigatórias

- `APP_KEY`
- `APP_URL`
- `DB_CONNECTION`
- `DB_HOST`
- `DB_PORT`
- `DB_DATABASE`
- `DB_USERNAME`
- `DB_PASSWORD`

### Variáveis Recomendadas

- `APP_ENV=production`
- `APP_DEBUG=false`
- `APP_LOCALE=pt_BR`
- `APP_FALLBACK_LOCALE=pt_BR`
- `APP_FAKER_LOCALE=pt_BR`

Após o deploy, rode:

```bash
php artisan migrate --seed
php artisan storage:link
```
