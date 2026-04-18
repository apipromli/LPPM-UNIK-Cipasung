#!/bin/bash
set -e

echo "=== LPPM UNIK Cipasung — Deploy Start ==="

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

echo "=== Starting PHP server on port $PORT ==="
php -S 0.0.0.0:${PORT:-8000} -t public
