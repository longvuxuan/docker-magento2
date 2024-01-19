FROM nginx:1.24-alpine

ARG APP_ID
ARG DOMAIN

RUN addgroup -g "$APP_ID" app \
 && adduser -G app -u "$APP_ID" -h /var/www -s /bin/bash -S app
RUN touch /var/run/nginx.pid
RUN mkdir /sock

RUN apk add --no-cache \
  curl \
  nss-tools \
  openssl

COPY ./docker/nginx/setting/mage2.conf /etc/nginx/setting/
COPY ./docker/nginx/conf/default.conf /etc/nginx/conf.d/
COPY ./docker/nginx/certs/${DOMAIN}.pem /etc/nginx/certs/
COPY ./docker/nginx/certs/${DOMAIN}-key.pem /etc/nginx/certs/

RUN mkdir -p /etc/nginx/html /var/www/html /etc/nginx/certs \
  && chown -R app:app /etc/nginx /var/www /var/cache/nginx /etc/nginx/certs /var/run/nginx.pid /var/log /sock

USER app:app
VOLUME /var/www
WORKDIR /var/www/html
