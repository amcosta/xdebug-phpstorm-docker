FROM php:7.4-fpm
MAINTAINER Alex Moreno <alex.moreno.costa@gmail.com>

ARG ENV

RUN docker-php-ext-install pdo_mysql
RUN pecl install xdebug && docker-php-ext-enable xdebug

COPY docker/php.ini /usr/local/etc/php
COPY docker/docker-php-ext-xdebug.ini /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

RUN mkdir -p /var/www/html
WORKDIR /var/www/html

EXPOSE 80

