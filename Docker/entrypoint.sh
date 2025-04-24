#!/bin/bash
set -e

# 1. Check for and create .env file from .env.example if it doesn't exist
if [ ! -f /var/www/.env ]; then
  echo "Creating .env file from .env.example..."
  if [ -f /var/www/.env.example ]; then
    cp /var/www/.env.example /var/www/.env
    echo ".env file created from .env.example."
  else
    echo "Error: .env.example not found!"
    exit 1  # Exit with an error code
  fi

  # Generate APP_KEY if it's empty
  APP_KEY=$(grep '^APP_KEY=' /var/www/.env | cut -d'=' -f2)
  if [ -z "$APP_KEY" ]; then
    echo "Generating APP_KEY..."
    sed -i "s/APP_KEY=/APP_KEY=base64:$(openssl rand -base64 32)/g" /var/www/.env
    echo "APP_KEY generated."
  fi
fi

# 2. Load Environment Variables from .env
set -o allexport
source /var/www/.env
set +o allexport

# 3. Run Database Migrations (Example - Laravel)
if [ ! -f /var/www/storage/installed.lock ]; then
  echo "Running database migrations..."
  php /var/www/artisan migrate --force
  touch /var/www/storage/installed.lock
else
  echo "Database migrations already run."
fi

# 4. Clear cache after migrations
php /var/www/artisan config:cache
php /var/www/artisan route:cache
php /var/www/artisan view:cache

# 5. **Ensure correct permissions for the public/storage directory**
chown -R www:www /var/www/public/storage
chmod -R 755 /var/www/public/storage

# 6. Start PHP-FPM
echo "Starting PHP-FPM..."
exec php-fpm