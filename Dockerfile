FROM php:8.2-apache

# mysqli for MySQL
RUN docker-php-ext-install mysqli

# optional: nicer errors/compat
RUN a2enmod rewrite

WORKDIR /var/www/html
COPY . /var/www/html

# Apache listens on 80 inside container; Render routes traffic.

