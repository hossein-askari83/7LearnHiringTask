FROM php:8.2-fpm

USER root

WORKDIR /var/www/html

RUN apt-get update && apt-get install -y \
    nginx \
    libpng-dev \
    zlib1g-dev \
    libxml2-dev \
    libzip-dev \
    libonig-dev \
    libwebp-dev \
    libjpeg62-turbo-dev \
    libpng-dev libxpm-dev \
    zip \
    curl \
    unzip \
    libfreetype6-dev \
    libfreetype6-dev \
    && docker-php-ext-install pdo_mysql \
    && docker-php-ext-install mysqli \
    && docker-php-ext-install zip \
    && docker-php-ext-install -j$(nproc) iconv \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd


COPY vhost.conf /etc/nginx/sites-enabled/default

COPY . /var/www/html/
RUN chmod o+w ./storage/ -R

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer install
RUN composer require mbpcoder/laravel-api-versioning
RUN mkdir -p /var/www/html/storage/app/public

RUN php artisan migrate

RUN chown -R www-data:www-data /var/www/html 
