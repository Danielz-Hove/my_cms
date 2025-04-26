#!/bin/bash

# Install PHP dependencies
composer install

# Wait for MySQL
echo "Waiting for MySQL..."
until nc -z mysql 3306; do
  sleep 1
done
echo "MySQL is up!"

# Laravel setup
php artisan key:generate

# Create storage link if it doesn't exist
if [ ! -L public/storage ]; then
  echo "Creating storage link..."
  php artisan storage:link
  if [ $? -ne 0 ]; then
    echo "Error creating storage link. Exiting."
    exit 1
  fi
else
  echo "Storage link already exists."
fi

# Migrate fresh and seed
php artisan migrate:fresh --seed
if [ $? -ne 0 ]; then
  echo "Error running migrations. Exiting."
  exit 1
fi

# Start PHP Built-in Server
echo "Starting PHP built-in web server on port 8000..."
php artisan serve --host=0.0.0.0 --port=8000