ARG PHP_EXTENSIONS="pdo_sqlite intl"
FROM thecodingmachine/php:8.1-v4-slim-apache AS php

USER root

WORKDIR /var/www/html

# install pickle
RUN apt-get update && apt-get install -y bash wget
RUN wget -O phive.phar https://phar.io/releases/phive.phar
RUN wget -O phive.phar.asc https://phar.io/releases/phive.phar.asc
RUN gpg --keyserver hkps://keys.openpgp.org --recv-keys 0x9D8A98B29B2D5D79
RUN gpg --verify phive.phar.asc phive.phar
RUN chmod +x phive.phar
RUN sudo mv phive.phar /usr/local/bin/phive

USER docker

RUN echo 'y' | phive install --force-accept-unsigned --trust-gpg-keys 67F861C3D889C656 phpDocumentor
