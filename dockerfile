# Usamos PHP 8.1 con Apache
FROM php:8.1-apache

# Instalar mysqli y extensiones necesarias
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Copiar todo tu proyecto al contenedor
COPY . /var/www/html/

# Dar permisos correctos al directorio web
RUN chown -R www-data:www-data /var/www/html/

# Exponer el puerto 80
EXPOSE 80
