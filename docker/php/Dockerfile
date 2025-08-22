FROM php:8.3-fpm

RUN mkdir -p /var/www/backend

WORKDIR /var/www/backend

ARG UID
ARG GID
ARG UNAME

RUN apt-get update && apt-get install --no-install-recommends -y \
    nano \
    libxml2-dev \
    nodejs \
    npm \
    libicu-dev \
    libonig-dev \
    libzip-dev \
    libpng-dev \
    libpq-dev \
    libjpeg-dev \
    zlib1g-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libwebp-dev \
    zip \
    unzip \
    git \
    mariadb-client \
    libmagickwand-dev \
    libmagickcore-dev \
    && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp \
    && docker-php-ext-configure intl \
    && docker-php-ext-install -j$(nproc) \
        intl \
        mbstring \
        zip \
        mysqli \
        pdo \
        pdo_mysql \
        pcntl \
        gd \
        exif \
        pdo_pgsql \
        pgsql

RUN pecl install xdebug && docker-php-ext-enable xdebug

RUN groupadd --gid ${GID} ${UNAME} \
    && useradd --home-dir "/home/${UNAME}" --create-home --uid ${UID} \
    --gid ${GID} --shell /bin/bash --skel /dev/null ${UNAME}

RUN echo "${UNAME} ALL=(ALL) NOPASSWD: ALL" >> /etc/sudoers
RUN usermod -a -G www-data ${UNAME}

COPY --from=composer:2.8.10 /usr/bin/composer /usr/bin/composer

#COPY ./backend .
COPY ./entrypoint.sh /entrypoint.sh

USER ${UNAME}

ENTRYPOINT ["/entrypoint.sh"]
