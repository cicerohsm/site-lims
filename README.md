# LIMS — Site Institucional

Site institucional do Laboratório de Inovação em Sistemas Multimídia (LIMS) — IFPI Campus Teresina Central.

## Stack

- PHP 8.3
- Laravel 13
- Blade
- Tailwind CSS 4
- Vite
- Docker
- Docker Compose
- Nginx
- Node 22

## Páginas

- Home
- Sobre
- Projetos
- Eventos
- Time
- Tecnologias
- Contato
- 404 personalizada

## Configuração inicial

1. Copie o arquivo de ambiente:

```bash
cp .env.example .env
```

2. Gere a chave da aplicação:

```bash
php artisan key:generate
```

3. Instale dependências PHP:

```bash
composer install
```

4. Instale dependências front-end:

```bash
npm install
```

## Ambiente com Docker

### Subir os containers

```bash
docker compose up -d app nginx
```

### Instalar dependências PHP pelo container

```bash
docker compose run --rm app composer install
```

### Gerar a chave da aplicação pelo container

```bash
docker compose run --rm app php artisan key:generate
```

### Rodar o Vite no serviço Node

```bash
docker compose up -d node
```

### Acessos

- Site Laravel via Nginx: `http://localhost:8080`
- Vite dev server: `http://localhost:5173`

## Rodando localmente sem Docker

```bash
php artisan serve
npm run dev
```

## Build de produção

```bash
npm run build
```

## Observações de manutenção

- Identidade cromática e navegação centralizadas em `config/site.php`.
- Páginas Blade em `resources/views/pages/`.
- Componentes em `resources/views/components/`.

## Deploy na Railway

O `Dockerfile` da raiz está preparado para a Railway.

### Variáveis obrigatórias

- `APP_KEY`

### Variáveis recomendadas

- `APP_URL=https://<seu-dominio>.up.railway.app`
- `APP_ENV=production`
- `APP_DEBUG=false`
