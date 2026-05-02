FROM php:8.2-fpm-alpine

# Cài đặt các gói hệ thống cần thiết
RUN apk add --no-cache \
    curl \
    libpng-dev \
    libxml2-dev \
    zip \
    unzip \
    oniguruma-dev \
    nodejs \
    npm

# Cài đặt các PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Cài đặt extension Redis qua PECL
RUN apk add --no-cache $PHPIZE_DEPS linux-headers \
    && pecl install redis \
    && docker-php-ext-enable redis

# Cài đặt Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Đặt thư mục làm việc
WORKDIR /var/www/html
