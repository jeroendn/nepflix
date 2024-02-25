FROM php:8.3-apache

RUN docker-php-ext-install \
    mysqli \
    pdo \
    pdo_mysql

RUN apt update

RUN apt install -y \
    mc

# Enable apache
RUN a2enmod rewrite
ADD . /var/www/html