FROM php:8.1-apache

# Habilita mod_rewrite
RUN a2enmod rewrite

# Garante que .htaccess seja lido
RUN printf "<Directory /var/www/html/>\n    AllowOverride All\n</Directory>\n" >> /etc/apache2/apache2.conf

# Instala PDO e extensões (ajuste conforme necessário)
RUN docker-php-ext-install pdo pdo_pgsql


# Copia os arquivos do projeto
COPY . /var/www/html/
