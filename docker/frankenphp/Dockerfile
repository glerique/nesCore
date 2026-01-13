# docker/frankenphp/Dockerfile
FROM dunglas/frankenphp:latest

# Extensions PHP de base
RUN install-php-extensions \
    opcache \
    apcu \
    intl \
    zip

# Configuration PHP
RUN echo "opcache.enable=1" >> /usr/local/etc/php/conf.d/opcache.ini && \
    echo "display_errors=On" >> /usr/local/etc/php/conf.d/custom.ini && \
    echo "error_reporting=E_ALL" >> /usr/local/etc/php/conf.d/custom.ini && \
    echo "xdebug.mode=coverage" >> /usr/local/etc/php/conf.d/custom.ini

WORKDIR /app

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy composer files and install dependencies
COPY composer.json composer.lock* ./
RUN composer install --no-dev --optimize-autoloader

COPY docker/frankenphp/Caddyfile /etc/caddy/Caddyfile