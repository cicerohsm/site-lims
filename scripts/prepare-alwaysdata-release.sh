#!/usr/bin/env bash

set -euo pipefail

ROOT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")/.." && pwd)"
DEPLOY_DIR="$ROOT_DIR/.deploy/alwaysdata"
APP_DIR="$DEPLOY_DIR/app"
ARCHIVE_PATH="$DEPLOY_DIR/lims-alwaysdata.tar.gz"
EXCLUDES_FILE="$ROOT_DIR/deploy/alwaysdata-rsync-excludes.txt"
STALE_ROOT_DIR="$ROOT_DIR/.build-stale"
STASHED_BUILD_DIR=""

require_command() {
    local command_name="$1"

    if ! command -v "$command_name" >/dev/null 2>&1; then
        echo "Missing required command: $command_name" >&2
        exit 1
    fi
}

require_file() {
    local file_path="$1"
    local help_message="$2"

    if [ ! -e "$file_path" ]; then
        echo "$help_message" >&2
        exit 1
    fi
}

require_command npm
require_command rsync
require_command tar

require_file "$ROOT_DIR/package.json" "package.json not found."
require_file "$ROOT_DIR/node_modules" "node_modules not found. Run npm install first."
require_file "$ROOT_DIR/vendor/autoload.php" "vendor not found. Run composer install first."

cd "$ROOT_DIR"

if [ -d "$ROOT_DIR/public/build" ] && find "$ROOT_DIR/public/build" -mindepth 1 ! -writable -print -quit | grep -q .; then
    mkdir -p "$STALE_ROOT_DIR"
    STASHED_BUILD_DIR="$STALE_ROOT_DIR/public-build.$(date +%Y%m%d%H%M%S)"
    echo "Found non-writable files in public/build. Moving the existing directory to:"
    echo "  $STASHED_BUILD_DIR"
    mv "$ROOT_DIR/public/build" "$STASHED_BUILD_DIR"
fi

echo "Building production assets..."
npm run build

if [ -f "$ROOT_DIR/vendor/autoload.php" ] && [ -f "$ROOT_DIR/.env" ]; then
    echo "Clearing local Laravel caches before packaging..."
    php artisan optimize:clear
else
    echo "Skipping artisan cache cleanup because vendor/ or .env is missing."
fi

echo "Preparing release directory..."
rm -rf "$DEPLOY_DIR"
mkdir -p "$APP_DIR"

rsync -a \
    --delete \
    --exclude-from="$EXCLUDES_FILE" \
    "$ROOT_DIR/" \
    "$APP_DIR/"

mkdir -p \
    "$APP_DIR/storage/framework/cache/data" \
    "$APP_DIR/storage/framework/sessions" \
    "$APP_DIR/storage/framework/views" \
    "$APP_DIR/storage/logs"

echo "Creating compressed archive..."
tar -czf "$ARCHIVE_PATH" -C "$APP_DIR" .

cat <<EOF
Release ready:
  Directory: $APP_DIR
  Archive:   $ARCHIVE_PATH

Next steps:
  1. Upload the contents of the release directory to alwaysdata.
  2. Point the website document root to the public/ directory.
  3. Copy .env.alwaysdata.example to .env on the server.
  4. Run php artisan key:generate && php artisan optimize on the server.
EOF

if [ -n "$STASHED_BUILD_DIR" ]; then
    echo
    echo "Note: the previous public/build directory was kept at:"
    echo "  $STASHED_BUILD_DIR"
fi
