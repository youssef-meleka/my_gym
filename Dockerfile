# Step 1: Use the official PHP image with Apache
FROM php:8.2-apache

# Step 2: Set the working directory
WORKDIR /var/www/html

# Step 3: Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    zip \
    unzip \
    && docker-php-ext-install zip pdo pdo_mysql

# Step 4: Clear the package cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Step 5: Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Step 6: Enable Apache rewrite module for Laravel
RUN a2enmod rewrite

# Step 7: Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Step 8: Copy Laravel application files
COPY . .

# Step 9: Install Composer dependencies
RUN composer install --no-dev --optimize-autoloader

# Step 10: Set proper permissions for Laravel storage and bootstrap/cache
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Step 11: Expose port 80
EXPOSE 80

# Step 12: Start Apache
CMD ["apache2-foreground"]
