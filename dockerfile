FROM php:7.2-apache

RUN a2enmod rewrite
RUN mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf
RUN service apache2 restart
