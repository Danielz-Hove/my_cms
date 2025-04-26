FROM php:8.2-fpm

# Install system dependencies (including zip for the zip extension)
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    libzip-dev \
    unzip \
    curl \
    git \
    nano \
    netcat-openbsd \
    && rm -rf /var/lib/apt/lists/*   # Clean up apt cache

# Install PHP extensions (all using docker-php-ext-install)
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd intl zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy project files
COPY . .

# Add and allow the startup script
COPY docker/start.sh /start.sh
RUN chmod +x /start.sh

# Expose port 8000
EXPOSE 8000

# Start the script
CMD ["/start.sh"]