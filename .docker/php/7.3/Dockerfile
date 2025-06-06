FROM php:7.3-fpm

RUN groupadd -g 1000 app \
 && useradd -g 1000 -u 1000 -d /var/www -s /bin/bash app

# Install dependencies
RUN apt-get update \
  && apt-get upgrade -y \
  && apt-get install -y --no-install-recommends \
  apt-utils \
  sendmail-bin \
  sendmail \
  sudo \
  vim \
  iproute2 \
  git \
  gnupg2 \
  ca-certificates \
  lsb-release \
  software-properties-common \
  libbz2-dev \
  libjpeg62-turbo-dev \
  libpng-dev \
  libfreetype6-dev \
  libgeoip-dev \
  wget \
  libgmp-dev \
  libgpgme11-dev \
  libmagickwand-dev \
  libmagickcore-dev \
  libicu-dev \
  libldap2-dev \
  libpspell-dev \
  libtidy-dev \
  libxslt1-dev \
  libyaml-dev \
  libzip-dev \
  libonig-dev \
  libsodium-dev \
  pkg-config \
  zip \
  libnss3-tools \
  && rm -rf /var/lib/apt/lists/*

# Configure the gd library
RUN docker-php-ext-configure \
  gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/
RUN docker-php-ext-configure \
  opcache --enable-opcache

RUN docker-php-ext-install \
    bcmath \
    bz2 \
    ctype \
    dom \
    calendar \
    exif \
    gd \
    gettext \
    intl \
    iconv \
    mbstring \
    mysqli \
    opcache \
    pcntl \
    pdo_mysql \
    soap \
    sockets \
    # sodium \
    sysvmsg \
    sysvsem \
    sysvshm \
    xsl \
    zip

# Install xdebug
RUN pecl channel-update pecl.php.net && pecl install xdebug-3.1.6 \
    && docker-php-ext-enable xdebug

RUN curl -sS https://getcomposer.org/installer | \
  php -- --install-dir=/usr/local/bin --filename=composer --version=1.10.22

RUN composer self-update --1

RUN mkdir -p /etc/nginx/html /var/www/html /sock \
  && chown -R app:app /etc/nginx /var/www /usr/local/etc/php/conf.d /sock

RUN mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"

USER app:app
VOLUME /var/www
WORKDIR /var/www/html
