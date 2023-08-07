FROM php:8.1 as php
#one line
RUN apt-get update -y
RUN apt-get install -y unzip libpq-dev libcurl4-gnutls-dev
RUN docker-php-ext-install pdo pdo_mysql pdo_pgsql bcmath

WORKDIR /var/www
COPY . .
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN ["chmod","+x","Docker/entrypoint.sh"]
ENTRYPOINT ["Docker/entrypoint.sh"]