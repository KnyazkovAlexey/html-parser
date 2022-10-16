FROM php:8.0.0rc1-cli

RUN apt-get update && apt-get install -y curl

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN groupadd -g 1000 testuser
RUN useradd -u 1000 -ms /bin/bash -g testuser testuser

COPY --chown=testuser:testuser . /home/testuser/test

WORKDIR /home/testuser/test

USER testuser

RUN composer install
