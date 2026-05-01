# =============================================================
# Dockerfile for Render deployment
# Builds a PHP 8.4 image with all Laravel dependencies, then
# runs the app with PHP's built-in server.
# =============================================================

FROM php:8.4-cli-alpine

# Install system tools and PHP extensions Laravel needs.
# - git, unzip: for Composer to install dependencies from VCS
# - oniguruma-dev, libzip-dev: needed by mbstring/zip extensions
# - sqlite-dev: needed for SQLite PDO driver
# - nodejs/npm: to build frontend assets with Vite
RUN apk add --no-cache \
    git \
    unzip \
    oniguruma-dev \
    libzip-dev \
    sqlite-dev \
    nodejs \
    npm \
    && docker-php-ext-install \
        pdo \
        pdo_sqlite \
        mbstring \
        zip \
        bcmath \
        opcache

# Install Composer (PHP's package manager) from the official image.
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Set working directory for everything that follows.
WORKDIR /app

# Copy the application code into the image.
COPY . .

# Install PHP dependencies (production only — no dev tools).
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Install Node dependencies and build the frontend assets.
RUN npm install && npm run build

# Make sure storage and cache directories are writable by PHP.
# Laravel writes session files, logs, compiled views into here.
RUN mkdir -p storage/framework/{cache,sessions,views} \
    && mkdir -p storage/logs \
    && chmod -R 775 storage bootstrap/cache

# Create the SQLite database file (empty — migrations populate it on start).
RUN mkdir -p database \
    && touch database/database.sqlite \
    && chmod 664 database/database.sqlite

# Render assigns a port at runtime via $PORT. PHP's dev server
# isn't fit for serious production traffic, but it's perfectly fine
# for a low-volume portfolio site.
EXPOSE 10000

# Start command:
# 1. Run any pending migrations (creates tables on first deploy)
# 2. Cache config/routes/views for performance
# 3. Start the server on whatever port Render provides
CMD php artisan migrate --force \
    && php artisan db:seed --force \
    && php artisan config:cache \
    && php artisan route:cache \
    && php artisan view:cache \
    && php artisan serve --host 0.0.0.0 --port ${PORT:-10000}
