# Gamit tayo ng image na may PHP at Apache na
FROM richarvey/php-apache-heroku:latest

# I-copy lahat ng files mo sa server
COPY . /var/www/app

# I-set ang main folder ng Laravel (public)
ENV WEBROOT /var/www/app/public
ENV APP_ENV production

# I-install ang mga PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# I-set ang permissions para hindi mag-error ang logs/cache
RUN chown -R www-data:www-data /var/www/app/storage /var/www/app/bootstrap/cache