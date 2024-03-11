# Use the official PHP image with Apache
FROM php:latest

# Install Apache and PHP extensions
RUN apt-get update && apt-get install -y \
    apache2 \
    && docker-php-ext-install pdo_mysql

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Set the COMPOSER_ALLOW_SUPERUSER environment variable
ENV COMPOSER_ALLOW_SUPERUSER=1

# Copy the Symfony app to the container
COPY . /var/www/html

# Set the working directory
WORKDIR /var/www/html

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Install Symfony dependencies
RUN composer install
RUN composer require nelmio/api-doc-bundle
RUN composer require symfony/twig-bundle
RUN composer require symfony/asset

# Expose port 80
EXPOSE 80

# Start Apache in the foreground
CMD ["/usr/sbin/apachectl", "-D", "FOREGROUND"]