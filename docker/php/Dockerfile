FROM php:7.4-apache

# Instala dependências do sistema
RUN apt-get update && apt-get install -y \
    libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql pgsql

# Habilita mod_rewrite (CI3 usa)
RUN a2enmod rewrite

# Ajusta o DocumentRoot (opcional, mas recomendado)
ENV APACHE_DOCUMENT_ROOT /var/www/html

RUN sed -ri -e 's!/var/www/html!/var/www/html!g' /etc/apache2/sites-available/*.conf
