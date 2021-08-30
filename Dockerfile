FROM php:7.4-fpm
CMD ["php-fpm7", "-F"]

RUN apt-get update -y && apt-get install -y openssl zip unzip git
RUN curl -sS https://getcomposer.org/installer | php 
RUN apt-get install -y python3 \
&& apt-get install -y python3-pip

WORKDIR /app
COPY . /app
COPY requirements.txt /app/
RUN pip install -r requirements.txt
