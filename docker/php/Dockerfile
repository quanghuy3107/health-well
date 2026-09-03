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
    npm \
    openssl-dev

# Cài đặt các PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Cài đặt extension Redis và MongoDB qua PECL
RUN apk add --no-cache $PHPIZE_DEPS linux-headers \
    && pecl install redis mongodb \
    && docker-php-ext-enable redis mongodb

# Cài đặt Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Đặt thư mục làm việc
WORKDIR /var/www/html
# Match Laravel image validation limit (5 MB).
RUN printf "upload_max_filesize=5M\npost_max_size=6M\nmax_file_uploads=20\n" > /usr/local/etc/php/conf.d/uploads.ini

# Copy entrypoint script
COPY docker/php/entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

ENTRYPOINT ["entrypoint.sh"]
CMD ["php-fpm"]
