# Use an official PHP image as the base
FROM php:8.1-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    unzip \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libssl-dev \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Set the working directory
WORKDIR /var/www

# Copy the application code
COPY . .

# Set permissions for Laravel
RUN chown -R www-data:www-data /var/www \
    && chmod -R 775 /var/www/storage /var/www/bootstrap/cache

# Install Laravel dependencies
RUN composer install --optimize-autoloader --no-dev

# Expose port 9000 (default for PHP-FPM)
EXPOSE 9000

# Start the PHP-FPM server
CMD ["php-fpm"]
