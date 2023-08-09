FROM php:8.2-cli
RUN pecl install xdebug-3.2.1 \
	&& docker-php-ext-enable xdebug
COPY . /usr/src/myapp
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN cd /usr/src/myapp && composer dump-autoload
WORKDIR /usr/src/myapp
CMD [ "php", "./app.php" ]