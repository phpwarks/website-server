FROM php:7.1-alpine

RUN apk update
RUN apk add --update git unzip zlib-dev

RUN docker-php-ext-install -j$(getconf _NPROCESSORS_ONLN) opcache

RUN rm -rf /tmp/*

COPY . /var/www/html
WORKDIR /var/www/html

ENTRYPOINT php ./build/public/server.php
