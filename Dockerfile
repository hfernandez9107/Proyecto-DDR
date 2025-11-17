FROM php:8.2-fpm

# Instalar extensiones necesarias
RUN apt-get update && apt-get install -y \
    git unzip libzip-dev libpq-dev \
    && docker-php-ext-install zip pdo pdo_mysql

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copiar proyecto
WORKDIR /var/www/html
COPY . .

# Instalar dependencias Laravel
RUN composer install --no-dev --no-interaction --prefer-dist

# Generar clave
RUN php artisan key:generate

# Exponer puerto
EXPOSE 8000

# Ejecutar Laravel
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
