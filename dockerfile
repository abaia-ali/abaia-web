# Base PHP con Apache
FROM php:8.2-apache

# Instalar PostgreSQL PDO
RUN apt-get update && apt-get install -y libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql

# Copiar tu proyecto desde GitHub
COPY . /var/www/html/

# Asegurar permisos
RUN chown -R www-data:www-data /var/www/html

# Exponer puerto
EXPOSE 80
