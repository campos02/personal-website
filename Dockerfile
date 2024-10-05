FROM php:fpm AS php-stage
RUN apt update && apt install -y \
    libfreetype-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    zlib1g-dev \
    libzip-dev \
    libwebp-dev \
    unzip \
    && docker-php-ext-configure gd --with-freetype --with-webp --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install zip

RUN apt clean && rm -rf /var/lib/apt/lists/*
RUN docker-php-ext-install pdo_mysql zip exif pcntl
RUN docker-php-ext-install gd

COPY . /var/www/personal-website
WORKDIR /var/www/personal-website
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer
RUN composer install --optimize-autoloader --no-dev

FROM node:current-alpine AS npm-stage
COPY --from=php-stage /var/www/personal-website /var/www/personal-website
WORKDIR /var/www/personal-website
RUN npm install
RUN npm run build

FROM php-stage
COPY --from=npm-stage /var/www/personal-website /var/www/personal-website
RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www
COPY --chown=www:www . /var/www
USER www

EXPOSE 9000
CMD ["php-fpm"]