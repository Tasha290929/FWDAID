# Используем официальный образ PHP с Apache
FROM php:8.2-apache

# Устанавливаем необходимые системные зависимости и расширения PHP для MySQL и PostgreSQL
RUN apt-get update && apt-get install -y \
    libzip-dev zip unzip git libpq-dev \
    && docker-php-ext-install pdo_mysql pdo_pgsql zip \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Устанавливаем Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Копируем проект Laravel
COPY ./market /var/www/html

# Копируем .env (лучше потом на проде подменять реальным .env)
COPY ./market/.env.example /var/www/html/.env

# Устанавливаем рабочую директорию
WORKDIR /var/www/html

# Устанавливаем зависимости composer без dev и оптимизируем автозагрузчик
RUN composer install --no-dev --optimize-autoloader

# Генерируем ключ приложения Laravel
RUN php artisan key:generate

# Задаём правильные права на storage и bootstrap/cache
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Переключаем DocumentRoot Apache на public
RUN sed -i 's|/var/www/html|/var/www/html/public|g' /etc/apache2/sites-available/000-default.conf

# Включаем модуль rewrite Apache
RUN a2enmod rewrite

# Открываем порт 80 для HTTP
EXPOSE 80
