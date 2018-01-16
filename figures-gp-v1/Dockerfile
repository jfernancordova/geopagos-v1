FROM php:7.1-fpm-alpine

LABEL mantainer="José Fernando Cordova <jfernancordova@gmail.com>"

COPY doFigures.php /home/geopagos/
COPY figures /home/geopagos/figures/

RUN addgroup -S geopagos && adduser -S -g geopagos geopagos \
    && php -r "copy('https://getcomposer.org/installer', '/tmp/composer-setup.php');" \
    && php -r "if (hash_file('SHA384', '/tmp/composer-setup.php') === '544e09ee996cdf60ece3804abc52599c22b1f40f4323403c44d44fdfdd586475ca9813a858088ffbc1f233e9b180f061') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('/tmp/composer-setup.php'); } echo PHP_EOL;" \
    && php /tmp/composer-setup.php --install-dir=/usr/bin --filename=composer \
    && php -r "unlink('/tmp/composer-setup.php');" \
    && chown geopagos:geopagos /home/geopagos/doFigures.php \
    && chown -R geopagos:geopagos /home/geopagos/figures

USER geopagos

WORKDIR /home/geopagos

RUN cd figures && composer install

CMD ["/bin/ash"]

