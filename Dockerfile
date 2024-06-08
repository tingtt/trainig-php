###
### composer install
###
FROM composer:2.7 as dependencies

WORKDIR /app

COPY . .
RUN composer install

###
### npm install & build via vite
###

FROM node:22.2.0-alpine3.20 as vite-builder

WORKDIR /app

COPY ./package*.json ./
RUN npm install

COPY . .
RUN npm run build

###
### Run nginx & php-fpm
###

FROM nginx:alpine
RUN apk update && apk add --update \
  php83 php83-dom php83-mbstring php83-curl php83-mysqli \
  php83-fpm php83-redis php83-zip php83-gd php83-pdo_mysql \
  php83-tokenizer php83-sqlite3 php83-pdo_sqlite

ENV WORKDIR=/usr/share/nginx/html
COPY --from=vite-builder /app/ ${WORKDIR}/
COPY --from=dependencies /app/vendor/ ${WORKDIR}/vendor/
RUN chown -R nginx:nginx ${WORKDIR}/
RUN chmod 777 -R ${WORKDIR}/storage/
COPY ./.docker/nginx.conf /etc/nginx/conf.d/default.conf
COPY ./.docker/run.sh /usr/local/bin/run.sh
RUN chmod +x /usr/local/bin/run.sh
ENTRYPOINT [ "/usr/local/bin/run.sh" ]
