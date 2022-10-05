FROM php:8.1-apache

RUN apt-get update && docker-php-ext-install pdo_mysql mysqli

RUN apt-get install -y locales && apt-get clean && rm -rf /var/lib/apt/lists/*
RUN sed -i -E 's/# (ja_JP.UTF-8)/\1/' /etc/locale.gen && locale-gen
ENV LANG ja_JP.UTF-8

COPY ./php.ini /usr/local/etc/php/
