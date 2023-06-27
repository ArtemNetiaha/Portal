FROM php:8.2-fpm

RUN docker-php-ext-install mysqli

RUN apt-get update && apt-get install curl -y



RUN apt-get update \
     && apt-get install -y libzip-dev \
     && docker-php-ext-install zip

RUN apt-get update && \
    apt-get upgrade -y && \
    apt-get install -y git

RUN apt-get update && apt-get install -y openssh-client

RUN mkdir -p /root/.ssh && \
    chmod 0700 /root/.ssh && \
    ssh-keyscan github.com > /root/.ssh/known_hosts

RUN apt-get update && apt-get install -y vim

RUN git config --global user.name "PDL docker"

RUN git config --global user.email "pdl.docker@docker.com"

RUN pecl install xdebug-3.2.1 \
    && docker-php-ext-enable xdebug

#COPY *keys/id_rsa_shared /root/.ssh/id_rsa

RUN echo "Host 167.71.44.31\n\tStrictHostKeyChecking no\n" >> /root/.ssh/config
RUN echo "Host pdl-profit.com\n\tStrictHostKeyChecking no\n" >> /root/.ssh/config

RUN docker-php-ext-install mysqli pdo pdo_mysql && docker-php-ext-enable pdo_mysql

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www

CMD ["php-fpm"]