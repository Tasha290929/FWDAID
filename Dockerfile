# Используем официальный образ PHP с Apache
FROM php:8.2-apache

# Установим необходимые зависимости
RUN apt-get update && apt-get install -y \
    libzip-dev zip unzip git \
    && docker-php-ext-install pdo_mysql zip

# Установим Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Копируем проект Laravel из папки market
COPY ./market /var/www/html

# Копируем .env (можно на основе .env.example)
COPY ./market/.env.example /var/www/html/.env

# Устанавливаем рабочую директорию
WORKDIR /var/www/html

# Устанавливаем зависимости без dev
RUN composer install --no-dev --optimize-autoloader

# Генерируем ключ приложения
RUN php artisan key:generate

# Устанавливаем права для папок хранения
RUN chown -R www-data:www-data /var/wwFROM php:8.2-apache

RUN apt-get update && apt-get install -y \
    libzip-dev zip unzip git \
    && docker-php-ext-install pdo_mysql zip

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY ./market /var/www/html

COPY ./market/.env.example /var/www/html/.env

WORKDIR /var/www/html

RUN composer install --no-dev --optimize-autoloader

RUN php artisan key:generate

RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Переключаем DocumentRoot Apache на public
RUN sed -i 's|/var/www/html|/var/www/html/public|g' /etc/apache2/sites-available/000-default.conf

RUN a2enmod rewrite

EXPOSE 80
w/html/storage /var/www/html/bootstrap/cache

# Открываем порт 80
EXPOSE 80
