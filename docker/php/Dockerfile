FROM php:8.3-apache

RUN docker-php-ext-install \
    mysqli \
    pdo \
    pdo_mysql

RUN apt-get update && apt-get install -y --no-install-recommends \
    bash \
    mc \
    telnet \
    zip \
    unzip \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* # cleans up the cache

RUN curl -sS https://getcomposer.org/installer -o composer-setup.php
RUN php composer-setup.php --install-dir=/usr/local/bin --filename=composer

# Enable apache
RUN a2enmod rewrite
ADD . /var/www/html