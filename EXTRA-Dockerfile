FROM php:8.2.3 as php

RUN apt-get update -y
RUN apt-get install -y unzip libpq-dev libcurl4-gnutls-dev
RUN docker-php-ext-install pdo pdo_mysql bcmath

#RUN pecl install -o -f redis \
    #&& rm -rf /tmp/pear \
    #&& docker-php-ext-enable redis

WORKDIR /var/www
COPY . .
COPY --from=composer:2.5.4 /usr/bin/composer /usr/bin/composer

ENV PORT=8000


#RUN chmod +x entrypoint.sh
#RUN chmod +x entrypoint.sh

ENTRYPOINT [ "sh", "docker/entrypoint.sh" ]
#ENTRYPOINT [ "docker/entrypoint.sh"]

#==========================================================================
#node

FROM node:18.14.0 as node

WORKDIR /var/www
COPY . .

RUN npm install --global cross-env 
RUN npm install

VOLUME /var/www/node_modules