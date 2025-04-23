FROM php:8.1-apache

# Habilita mod_rewrite se necessário
RUN a2enmod rewrite

# Copia os arquivos pro diretório do Apache
COPY . /var/www/html/

# Copia .htaccess se você tiver
COPY .htaccess /var/www/html/
