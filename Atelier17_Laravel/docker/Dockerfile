FROM php:8.2-apache

#installation des extensions php
RUN apt-get update && apt-get install -y \
    git zip unzip libpng-dev \
    libzip-dev default-mysql-client

RUN docker-php-ext-install pdo pdo_mysql zip gd

#installation du module apache pour la reecriture des url
RUN a2enmod rewrite

WORKDIR /var/www

COPY . /var/www

# ajout de composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Installation de curl
RUN apt-get update && apt-get install -y curl

# Ajout du référentiel NodeSource
RUN curl -sL https://deb.nodesource.com/setup_12.x | bash -

# Installation de Node.js
RUN apt-get update && apt-get install -y nodejs npm


# On utilise composer ici pour installer les dépendances de notre projet
RUN COMPOSER_ALLOW_SUPERUSER=1 composer install --no-interaction --optimize-autoloader --no-dev

# On utilise npm ici pour installer les dépendances de nodejs
RUN npm install

EXPOSE 80

# Copier la configuration Apache personnalisée
COPY ./docker/apache.conf /etc/apache2/sites-available/000-default.conf

ENTRYPOINT [ "bash","./docker/docker.sh" ]
CMD ["apache2-foreground"]