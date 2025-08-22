#!/bin/bash
set -e

# Установка зависимостей (если нужно при каждом запуске)
if [ ! -d "vendor" ]; then
    composer install --no-interaction --prefer-dist
fi

# Права доступа (без sudo)
chown -R www-data:www-data /var/www/storage 2>/dev/null || true
chown -R www-data:www-data /var/www/bootstrap/cache 2>/dev/null || true
chmod -R 775 storage bootstrap/cache 2>/dev/null || true

# Генерация ключа приложения (если нужно)
if [ ! -f ".env" ]; then
    cp .env.example .env 2>/dev/null || true
fi

if [ -f ".env" ] && ! grep -q '^APP_KEY=' .env; then
    php artisan key:generate --no-interaction
fi

if [ $# -eq 0 ]; then
    exec php-fpm
else
    exec "$@"
fi