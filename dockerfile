# Base PHP con Apache
FROM php:8.2-apache

# Instalar PostgreSQL PDO si lo necesitas
RUN apt-get update && apt-get install -y libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql

# Copiar proyecto
COPY . /var/www/html/

# Permisos
RUN chown -R www-data:www-data /var/www/html

EXPOSE 80
