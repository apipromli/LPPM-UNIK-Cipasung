#!/bin/bash
set -e

echo "=== LPPM UNIK Cipasung — Deploy Start ==="

# Ensure APP_URL is always valid (RAILWAY_PUBLIC_DOMAIN may not be set yet)
if [ -z "$RAILWAY_PUBLIC_DOMAIN" ] || [ "$APP_URL" = "https://" ]; then
    export APP_URL="http://localhost:${PORT:-8000}"
    echo "APP_URL fallback: $APP_URL"
fi

# Discover packages (skipped during build due to --no-scripts)
php artisan package:discover --ansi

# Ensure storage directories exist (Railway ephemeral filesystem)
mkdir -p storage/app/public/study-centers/heads
mkdir -p storage/app/public/researches
mkdir -p storage/app/public/ppm
mkdir -p storage/app/public/galleries
mkdir -p storage/app/public/leaders
mkdir -p storage/app/public/staff
mkdir -p storage/framework/cache/data
mkdir -p storage/framework/sessions
mkdir -p storage/framework/views
mkdir -p bootstrap/cache

# Storage link (safe to run multiple times)
php artisan storage:link --force 2>/dev/null || true

# Run migrations
echo "Running migrations..."
php artisan migrate --force

# Seed only if users table is empty
USER_COUNT=$(php artisan tinker --execute="echo App\Models\User::count();" 2>/dev/null | tail -1)
if [ "$USER_COUNT" = "0" ] || [ -z "$USER_COUNT" ]; then
    echo "Seeding initial data..."
    php artisan db:seed --force
fi

# Clear and cache config for production
php artisan config:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "=== Starting PHP server on port ${PORT:-8000} ==="
php -S 0.0.0.0:${PORT:-8000} -t public
