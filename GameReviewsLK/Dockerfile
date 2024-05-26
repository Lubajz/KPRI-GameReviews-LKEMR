FROM php:8.1-apache

RUN docker-php-ext-install pdo pdo_mysql

RUN pecl install xdebug && docker-php-ext-enable xdebug \
    && echo "\n\
    xdebug.client_host=host.docker.internal \n\
    xdebug.mode=debug \n\
    xdebug.start_with_request=yes \n\
    xdebug.discover_client_host=0 \n\
    xdebug.remote_handler = "dbgp" \n\
    xdebug.client_port=9003 \n\
    xdebug.log = /var/www/html/xdebug.log \n\
    " >> /usr/local/etc/php/conf.d/docker-php-xdebug.ini

# pracovní adresář
WORKDIR /var/www/html

# adresář pro XSL soubory
RUN mkdir -p /var/www/html/src/xsl/

RUN apt-get update && \
    apt-get install -y libxslt-dev && \
    docker-php-ext-install xsl

# soubory do kontejneru
COPY www/html/ /var/www/html/

# oprávnění pro adresář /var/www/html
RUN mkdir -p /var/www/html/xml && \
    chown -R www-data:www-data /var/www/html && \
    chmod -R 755 /var/www/html

