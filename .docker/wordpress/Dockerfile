FROM wordpress

RUN apt-get update -y \
  && apt-get install -y \
    libxml2-dev \
  && apt-get clean -y \
  && docker-php-ext-install soap pdo pdo_mysql

RUN pecl install xdebug-2.9.6 \
    && docker-php-ext-enable xdebug

# Enable remote debugging. See xdebug.ini for settings.
# This path probably doesn't change, but use `php -i` to find out if it does.
COPY xdebug.ini /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

ENTRYPOINT ["docker-entrypoint.sh"]
CMD ["apache2-foreground"]
