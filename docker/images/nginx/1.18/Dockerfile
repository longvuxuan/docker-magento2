FROM nginx:1.18-alpine

ARG APP_ID=1000

RUN addgroup -g "$APP_ID" app \
 && adduser -G app -u "$APP_ID" -h /var/www -s /bin/bash -S app
RUN touch /var/run/nginx.pid
RUN mkdir /sock

RUN apk add --no-cache \
  curl \
  nss-tools \
  openssl

ARG TARGETARCH

RUN cd /usr/local/bin/ \
  && curl -L https://github.com/FiloSottile/mkcert/releases/download/v1.4.3/mkcert-v1.4.3-linux-$TARGETARCH -o mkcert \
  && chmod +x mkcert && mkcert -install

COPY ./docker/images/nginx/1.18/setting/mage2.conf /etc/nginx/setting/
COPY ./docker/images/nginx/1.18/conf/default.conf /etc/nginx/conf.d/
COPY ./docker/images/nginx/1.18/certs/mage.test.pem /etc/nginx/certs/
COPY ./docker/images/nginx/1.18/certs/mage.test-key.pem /etc/nginx/certs/

RUN mkdir -p /etc/nginx/html /var/www/html /etc/nginx/certs \
  && chown -R app:app /etc/nginx /var/www /var/cache/nginx /etc/nginx/certs /var/run/nginx.pid /var/log /sock

USER app:app
VOLUME /var/www
WORKDIR /var/www/html
