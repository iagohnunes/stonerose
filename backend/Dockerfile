FROM php:8.1-apache

# Copia todos os arquivos do seu projeto pro container
COPY . /var/www/html/

# Permite URLs amig�veis (opcional)
RUN a2enmod rewrite

RUN docker-php-ext-install pdo pdo_mysql

RUN echo "<Directory /var/www/html/>
    AllowOverride All
</Directory>" >> /etc/apache2/apache2.conf
