# Step 1: Use the official PHP image with Apache
FROM php:8.2-apache

# Step 2: Install system dependencies and PHP extensions
RUN apt-get update && apt-get install -y \
    libzip-dev \
    zip \
    unzip \
    git \
    curl \
    && docker-php-ext-install zip pdo pdo_mysql

# Step 3: Enable Apache rewrite module for Laravel
RUN a2enmod rewrite

# Step 4: Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Step 5: Set the working directory
WORKDIR /var/www/html

# Step 6: Copy Laravel application files
COPY . /var/www/html

# Step 7: Set proper permissions for Laravel storage and bootstrap/cache
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Step 8: Expose port 80
EXPOSE 80

# Step 9: Run Laravel migrations and serve the application
CMD ["sh", "-c", "php artisan migrate && apache2-foreground"]
