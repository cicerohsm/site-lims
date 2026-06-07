#!/bin/sh

set -e

cd /var/www/html

mkdir -p \
    storage/framework/cache/data \
    storage/framework/sessions \
    storage/framework/testing \
    storage/framework/views \
    storage/logs \
    bootstrap/cache

if [ -z "${APP_KEY:-}" ]; then
    echo "APP_KEY is not set. Add it in Railway Variables before deploying." >&2
    exit 1
fi

php artisan about >/dev/null

exec php artisan serve --host=0.0.0.0 --port="${PORT:-8080}"
