FROM php:7.4-fpm

# Install nodejs
RUN curl -sL https://deb.nodesource.com/setup_12.x | bash

RUN apt-get update \
    && apt-get install -y --no-install-recommends \
        git \
        vim \
        libmemcached-dev \
        libz-dev \
        libpq-dev \
        libjpeg-dev \
        libpng-dev \
        libfreetype6-dev \
        libssl-dev \
        libmcrypt-dev \
        libzip-dev \
        unzip \
        zip \
        nodejs \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-configure zip \
    && docker-php-ext-install \
        gd \
        exif \
        opcache \
        pdo_mysql \
        pdo_pgsql \
        pcntl \
        zip \
    && rm -rf /var/lib/apt/lists/*;

RUN docker-php-ext-install -j$(nproc) gd

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /usr/src/app/
COPY . /usr/src/app/
RUN composer install
RUN npm install
CMD php artisan serve --host=0.0.0.0 --port=8181
EXPOSE 8181
