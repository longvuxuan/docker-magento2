FROM php:7.4-fpm

RUN groupadd -g 1000 app \
 && useradd -g 1000 -u 1000 -d /var/www -s /bin/bash app

RUN mkdir -p /etc/nginx/html /var/www/html /sock \
  && chown -R app:app /etc/nginx /var/www /usr/local/etc/php/conf.d /sock

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
  zip \
  libnss3-tools \
  golang-go \
  && rm -rf /var/lib/apt/lists/*

# Configure the gd library
RUN docker-php-ext-configure \
  gd --with-freetype=/usr/include/ --with-jpeg=/usr/include/
RUN docker-php-ext-configure \
  opcache --enable-opcache

# Install required PHP extensions
RUN docker-php-ext-install -j$(nproc) \
  bcmath \
  bz2 \
  calendar \
  exif \
  gd \
  gettext \
  gmp \
  intl \
  mysqli \
  opcache \
  pdo_mysql \
  pspell \
  shmop \
  soap \
  sockets \
  sysvmsg \
  sysvsem \
  sysvshm \
  tidy \
  xmlrpc \
  xsl \
  zip \
  pcntl

RUN pecl install -o -f \
  geoip-1.1.1 \
  gnupg \
  igbinary \
  imagick \
  mailparse \
  msgpack \
  oauth \
  pcov \
  propro \
  raphf \
  redis \
  yaml

# Install xdebug
RUN pecl install xdebug-3.1.6 \
    && docker-php-ext-enable xdebug
#    && echo "error_reporting = E_ALL" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
#    && echo "display_startup_errors = On" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
#    && echo "display_errors = On" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
#    && echo "xdebug.remote_enable=1" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
#    && echo "xdebug.remote_connect_back=0" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
#    && echo "xdebug.remote_port=9000" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
#    && echo "xdebug.profiler_enable=1" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
#    && echo "xdebug.profiler_output_dir=/tmp/snapshots" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
#    && echo "xdebug.max_nesting_level=9999" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
#    && echo "xdebug.profiler_enable_trigger=1" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \

# Add aliases for xdebug control
RUN echo 'alias xoff="mv /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini.off && kill -USR2 1"' >> ~/.bashrc
RUN echo 'alias xon="mv /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini.off /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini && kill -USR2 1"' >> ~/.bashrc

RUN curl -sS https://getcomposer.org/installer | \
  php -- --install-dir=/usr/local/bin --filename=composer --version=1.10.22

RUN composer self-update --1

# Configure MailHog
RUN go get github.com/mailhog/mhsendmail
RUN echo 'sendmail_path="/usr/local/bin/mhsendmail --smtp-addr=mailhog:1025"' >> /usr/local/etc/php/conf.d/mail.ini

RUN mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"

RUN echo 'memory_limit = -1' >> "$PHP_INI_DIR/php.ini"

COPY ./docker/images/php/7.4/conf/www.conf /usr/local/etc/php-fpm.d/
COPY ./docker/images/php/7.4/conf/php.ini /usr/local/etc/php/
COPY ./docker/images/php/7.4/conf/xdebug.ini /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
COPY ./docker/images/php/7.4/conf/error_reporting.ini /usr/local/etc/php/conf.d/error_reporting.ini

USER app:app
VOLUME /var/www
WORKDIR /var/www/html
