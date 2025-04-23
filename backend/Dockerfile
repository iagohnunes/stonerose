FROM php:8.1-apache

# Habilita o mod_rewrite do Apache
RUN a2enmod rewrite

# Permite que o Apache leia .htaccess
RUN printf "<Directory /var/www/html/>\n    AllowOverride All\n</Directory>\n" >> /etc/apache2/apache2.conf

# Instala dependências do sistema para PostgreSQL
RUN apt-get update && apt-get install -y libpq-dev

# Instala as extensões PHP necessárias
RUN docker-php-ext-install pdo pdo_pgsql

# Copia o projeto para o container
COPY . /var/www/html/
