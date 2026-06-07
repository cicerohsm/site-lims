#!/bin/sh

set -e

mkdir -p \
    /var/www/html/storage/framework/cache \
    /var/www/html/storage/framework/sessions \
    /var/www/html/storage/framework/testing \
    /var/www/html/storage/framework/views \
    /var/www/html/bootstrap/cache

chmod -R 0777 /var/www/html/storage /var/www/html/bootstrap/cache || true

exec "$@"
