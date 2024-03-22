FROM php:8.1-apache

WORKDIR /var/www/html

RUN docker-php-source extract \
  && docker-php-ext-configure mysqli \
  && docker-php-ext-install mysqli \
  && docker-php-source delete

COPY . .
