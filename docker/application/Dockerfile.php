# Service: PHP

ARG PHP_VERSION=8.3

FROM php:${PHP_VERSION}-fpm

RUN apt-get update && apt-get install -y \
        libpq-dev \
        libzip-dev \
        unzip \
        git \
    && docker-php-ext-install \
        pdo_mysql \
        pdo_pgsql \
    && pecl install redis \
    && docker-php-ext-enable redis \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www/html

CMD ["php-fpm", "-F"]