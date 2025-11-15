FROM php:8.2-apache

COPY . /var/www/html/

RUN chown -R www-data: /var/www/html

