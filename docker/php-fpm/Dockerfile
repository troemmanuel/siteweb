FROM php:8-fpm
ENV TZ=Europe/Paaris

RUN  docker-php-ext-install pdo pdo_mysql \
     && docker-php-ext-enable pdo_mysql