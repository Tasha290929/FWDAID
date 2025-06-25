# Используем официальный образ PHP + Apache
FROM php:8.2-apache

# Установка зависимостей
RUN apt-get update && apt-get install -y \
    libzip-dev zip unzip git \
    && docker-php-ext-install pdo_mysql zip

# Установка Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Копируем проект в контейнер
COPY . /var/www/html

# Установка зависимостей проекта
WORKDIR /var/www/html
RUN composer install --no-dev --optimize-autoloader

# Генерация ключа приложения
RUN php artisan key:generate

# Разрешение прав
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Открываем порт Apache
EXPOSE 80
