FROM php:8.2-fpm AS builder

# Set working directory
WORKDIR /var/www

# Install system dependencies for PHP extensions, tools, etc.
RUN apt-get update && apt-get install -y --no-install-recommends \
    build-essential \
    libpng-dev \
    libjpeg-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    unzip \
    curl \
    git \
    zip \
    tzdata \
    && docker-php-ext-install pdo pdo_mysql mbstring zip exif pcntl gd intl \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Install Composer - PHP dependency manager
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy the application code to the container
COPY . .

# Install PHP dependencies using Composer (without dev dependencies)
RUN composer install --no-dev --optimize-autoloader --no-interaction --prefer-dist --no-progress

# Set permissions for Laravel's storage and cache directories
RUN chmod -R 777 /var/www/storage /var/www/bootstrap/cache

################################################################################
# Final Image: Runtime image with only the necessary components
FROM php:8.2-fpm-alpine

# Set working directory
WORKDIR /var/www

# Copy application code from the builder stage
COPY --from=builder /var/www /var/www

# Copy custom PHP configurations (if any)
COPY --from=builder /usr/local/etc/php/conf.d /usr/local/etc/php/conf.d

# Set permissions for Laravel's storage and cache directories (Alpine-specific)
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache
RUN chmod -R 755 /var/www/storage /var/www/bootstrap/cache

# Expose port 9000 for PHP-FPM
EXPOSE 9000

# Environment variables - you can set these in docker-compose.yml or .env file
ENV PORT=9000
# Set your application's timezone
ENV TZ=America/Los_Angeles

# Healthcheck to verify if the PHP-FPM is responsive
HEALTHCHECK --interval=5s --timeout=3s --retries=3 CMD curl -sS http://localhost:$PORT/healthcheck || exit 1

# Copy the entrypoint script (this is what starts our application)
COPY Docker/entrypoint.sh /usr/local/bin/entrypoint.sh

# Make the entrypoint script executable
RUN chmod +x /usr/local/bin/entrypoint.sh

# Set the entrypoint for the container (the script to run when the container starts)
ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]

# Command to start PHP-FPM
CMD ["php-fpm"]