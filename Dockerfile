FROM php:8.4-fpm AS php-stage

WORKDIR /var/www/personal-website
RUN apt update && apt install -y \
    libfreetype-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    zlib1g-dev \
    libzip-dev \
    libwebp-dev \
    libicu-dev \
    unzip \
    vim \
    npm --no-install-recommends \
    && docker-php-ext-configure gd --with-freetype --with-webp --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install zip

RUN apt clean && rm -rf /var/lib/apt/lists/*
RUN docker-php-ext-install pdo_mysql zip exif pcntl intl gd

COPY --from=composer /usr/bin/composer /usr/local/bin/composer

RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www
COPY --chown=www:www . /var/www/personal-website
RUN chown www:www /var/www/personal-website

RUN composer install --no-dev
RUN npm install
RUN npm run build

USER www

EXPOSE 9000
CMD ["php-fpm"]