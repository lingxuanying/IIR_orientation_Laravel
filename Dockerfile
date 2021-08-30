FROM php:7.4-fpm
CMD ["php-fpm7", "-F"]

RUN apt-get update -y && apt-get install -y openssl zip unzip git
RUN curl -sS https://getcomposer.org/installer | php 
RUN apt-get install -y python3 \
&& apt-get install -y python3-pip

COPY php.ini /app/
COPY php.ini /usr/local/etc/php/conf.d/docker-php-ext-sodium.ini

WORKDIR /app
COPY . /app
COPY requirements.txt /app/
RUN pip install -r requirements.txt

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php composer-setup.php
RUN mv composer.phar /usr/local/bin/composer
RUN composer update
