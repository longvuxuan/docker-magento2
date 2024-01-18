FROM php:8.1.27-fpm

ARG APP_ID=1000

RUN groupadd -g "$APP_ID" app \
  && useradd -g "$APP_ID" -u "$APP_ID" -d /var/www -s /bin/bash app

RUN apt-get update && apt-get install -y  \
    git \
    curl \
    libpng-dev \
    libxml2-dev \
    file \
    gettext \
    zip \
    unzip \
    cron \
    default-mysql-client \
    gnupg \
    gzip \
    libbz2-dev \
    libfreetype6-dev \
    libicu-dev \
    libjpeg62-turbo-dev \
    libmagickwand-dev \
    libmcrypt-dev \
    libonig-dev \
    libpng-dev \
    libsodium-dev \
    libssh2-1-dev \
    libwebp-dev \
    libxslt1-dev \
    libzip-dev \
    lsof \
    mailutils \
    msmtp \
    nodejs \
    procps \
    vim \
    golang-go \
  && rm -rf /var/lib/apt/lists/*



RUN pecl channel-update pecl.php.net && pecl install \
    imagick \
    redis \
    ssh2-1.3.1 \
    xdebug \
  && pecl clear-cache \
  && rm -rf /tmp/pear

RUN docker-php-ext-configure \
    gd --with-freetype --with-jpeg --with-webp \
  && docker-php-ext-install \
    bcmath \
    bz2 \
    calendar \
    exif \
    gd \
    gettext \
    intl \
    mbstring \
    mysqli \
    opcache \
    pcntl \
    pdo_mysql \
    soap \
    sockets \
    sodium \
    sysvmsg \
    sysvsem \
    sysvshm \
    xsl \
    zip \
  && docker-php-ext-enable \
    imagick \
    redis \
    ssh2 \
    xdebug


RUN curl -sS https://getcomposer.org/installer | \
  php -- --install-dir=/usr/local/bin --filename=composer \

RUN composer self-update --2

# Configure MailHog
RUN go install github.com/mailhog/mhsendmail@latest
RUN echo 'sendmail_path="/usr/local/bin/mhsendmail --smtp-addr=mailhog:1025"' >> /usr/local/etc/php/conf.d/mail.ini

RUN mkdir -p /etc/nginx/html /var/www/html /sock \
  && chown -R app:app /etc/nginx /var/www /usr/local/etc/php/conf.d /sock

RUN mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"

COPY ./docker/images/php/settings/www.conf /usr/local/etc/php-fpm.d/
COPY ./docker/images/php/settings/php.ini /usr/local/etc/php/
COPY ./docker/images/php/settings/xdebug.ini /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
COPY ./docker/images/php/settings/error_reporting.ini /usr/local/etc/php/conf.d/error_reporting.ini

USER app:app
VOLUME /var/www
WORKDIR /var/www/html
