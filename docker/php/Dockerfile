FROM php:7.4-fpm

RUN apt-get update && apt-get install -y \
    libpq-dev \
    git \
    unzip \
    && docker-php-ext-install pdo pdo_pgsql pgsql

WORKDIR /var/www/html

# create dirs by app
RUN mkdir -p /var/www/html/app/tmp/cache/persistent && \
    mkdir -p /var/www/html/app/tmp/cache/models && \
    mkdir -p /var/www/html/app/tmp/cache/views && \
    mkdir -p /var/www/html/app/tmp/cache && \
    chmod -R 775 /var/www/html/app/tmp

RUN chown -R www-data:www-data /var/www/html/app/tmp
