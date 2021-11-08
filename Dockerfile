# base image
FROM php:7.4-fpm

# arguements deined in docker-compose.yml
# new user to execute artisan and composer commands
# while developing the application
ARG user
# uid ensures the user inside the container has the
# same uid as your system user
ARG uid

# install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip

# clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Get latest composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# create system user to run Composer and Artisan commands
RUN useradd -G www-data,root -u $uid -d /home/$user $user
RUN mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user

# set working directory
WORKDIR /var/www

USER $user
