FROM phpbrew/phpbrew
MAINTAINER Oliver Lundquist "mail@oliverlundquist.com"

# Setup
RUN apt-get update && apt-get install -y \
        curl \
        gnupg2 \
        git \
        procps \
        ffmpeg \
        tmux \
        libfreetype6-dev \
        libonig-dev \
        libmcrypt-dev \
        libpng-dev \
        libzip-dev \
        zip \
        php7.2-xml \
        libonig-dev \
    && rm -rf /var/lib/apt/lists/*

# Install PHP
RUN phpbrew self-update \
    && phpbrew update \
    && phpbrew install 7.4.33 \
    && phpbrew install 8.2.11

# Cleanup PHP Builds
RUN phpbrew clean php-7.4.33 \
    && phpbrew clean php-8.2.11

# Install Composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php -r "if (hash_file('sha384', 'composer-setup.php') === 'e21205b207c3ff031906575712edab6f13eb0b361f2085f1f1237b7126d785e826a450292b6cfd1d64d92e6563bbde02') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;" \
    && php composer-setup.php \
    && php -r "unlink('composer-setup.php');" \
    && mv composer.phar /usr/local/bin/composer \
    && chmod 755 /usr/local/bin/composer
