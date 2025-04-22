FROM php:8.1-apache

# Copia todos os arquivos do seu projeto pro container
COPY . /var/www/html/

# Permite URLs amigáveis (opcional)
RUN a2enmod rewrite
