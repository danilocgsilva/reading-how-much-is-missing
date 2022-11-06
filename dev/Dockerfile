FROM php:8.1.12-bullseye

RUN apt-get -y update && \
    apt-get -y --no-install-recommends install \
libzip-dev \
build-essential \
curl \
libonig-dev \
libcurl4 \
libcurl4-openssl-dev \
zip \
openssl \
vim && \
    rm -rf /var/lib/apt/lists/* && \
    curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN pecl install xdebug && docker-php-ext-enable xdebug
COPY docker-php-ext-xdebug.ini /usr/local/etc/php/conf.d

RUN docker-php-ext-install curl && \
    docker-php-ext-install zip

WORKDIR /app
