FROM php:8.2-cli

# Install dependencies para sa MySQL na lang (mas mabilis)
RUN apt-get update && apt-get install -y \
    libzip-dev \
    unzip \
    && docker-php-ext-install pdo pdo_mysql zip

# Kunin ang Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# I-set ang working directory
WORKDIR /app

# I-copy lahat ng files ng project mo papunta sa Docker
COPY . .

# I-install ang mga Laravel packages
RUN composer install --no-dev --optimize-autoloader

# Bigyan ng tamang permissions ang storage folders
RUN chmod -R 775 storage bootstrap/cache

# I-run ang Laravel built-in server at i-bind sa port ng Render
CMD php artisan serve --host=0.0.0.0 --port=${PORT:-8000}
