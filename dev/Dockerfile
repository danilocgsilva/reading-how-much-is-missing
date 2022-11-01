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
openssl && \
    rm -rf /var/lib/apt/lists/* && \
    curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN docker-php-ext-install curl && \
    docker-php-ext-install zip
