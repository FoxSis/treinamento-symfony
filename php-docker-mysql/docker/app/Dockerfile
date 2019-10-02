FROM php:7.3-fpm

RUN apt-get update \
    && apt-get install -y \
	apt-utils \
        git \
        libxml2-dev \
        libmcrypt-dev \
        gettext \
        libxslt-dev \
        iproute2 \
        libicu-dev \
        curl \
        zip \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libc-client-dev \
        libkrb5-dev \
    && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install gd pdo_mysql calendar json zip

COPY ./docker/app/php.ini /usr/local/etc/php/php.ini
COPY ./docker/app/docker-entrypoint.sh /usr/local/bin/docker-entrypoint
RUN chmod +x /usr/local/bin/docker-entrypoint

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# https://getcomposer.org/doc/03-cli.md#composer-allow-superuser
ENV COMPOSER_ALLOW_SUPERUSER 1

WORKDIR /var/www/html

ENTRYPOINT ["docker-entrypoint"]
CMD ["php-fpm"]
