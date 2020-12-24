FROM php:7.4-apache

RUN apt-get update \
   && apt-get install -y libzip-dev wget \
   && apt install -y libxml2-dev \
   && apt-get install -y zip \
   && apt-get install -y vim \
   && apt-get install -y libfreetype6-dev libjpeg62-turbo-dev libpng-dev \
   && apt-get install -y libpq-dev \
   && docker-php-ext-install mysqli \
   && docker-php-ext-install pgsql \
   && docker-php-ext-install zip \
   && docker-php-ext-install xmlrpc \
   && docker-php-ext-install soap \
   && docker-php-ext-install gd \
   && docker-php-ext-install opcache \
   && docker-php-ext-install intl \
   && docker-php-ext-install pdo pdo_mysql \
   && apt-get install -y software-properties-common \
   && apt-get install -y certbot python-certbot-apache \
   && pecl install xdebug \
   && docker-php-ext-enable xdebug \
   && curl -sS https://getcomposer.org/installer | php \
   && mv composer.phar /usr/local/bin/composer \
   && chmod +x /usr/local/bin/composer \
   && wget -O phpunit https://phar.phpunit.de/phpunit-9.phar \
   && mv phpunit /usr/local/bin/phpunit \
   && chmod +x /usr/local/bin/phpunit \
   && echo "xdebug.idekey=PHPSTORM" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
   && echo "xdebug.client_host=host.docker.internal" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
   && echo "xdebug.start_with_request=yes" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
   && echo "xdebug.mode=debug" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
   && echo "xdebug.client_port = 9003" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
   && echo "xdebug.discover_client_host = 0" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

#RUN openssl req -x509 -nodes -days 365 -newkey rsa:2048 -keyout /etc/ssl/private/ssl-cert-snakeoil.key -out /etc/ssl/certs/ssl-cert-snakeoil.pem -subj "/C=AT/ST=Vienna/L=Vienna/O=Security/OU=Development/CN=localhost"

COPY ./docker/ssl/ssl-cert-snakeoil.pem /etc/ssl/certs/ssl-cert-snakeoil.pem
COPY ./docker/ssl/ssl-cert-snakeoil.key /etc/ssl/private/ssl-cert-snakeoil.key
COPY ./docker/php.ini /usr/local/etc/php/php.ini
COPY ./docker/site.conf /etc/apache2/sites-available/site.conf
RUN a2dissite 000-default \
    && a2ensite site \
    && a2enmod rewrite \
    && a2enmod ssl
