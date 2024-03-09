# Use the official PHP image with Apache
FROM php:latest

# Install Apache and other necessary packages
RUN apt-get update && apt-get install -y \
    apache2 \
    libapache2-mod-php \
    && docker-php-ext-install pdo_mysql

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Copy the Symfony project files into the container
COPY . /var/www/html

# Set the working directory
WORKDIR /var/www/html

# Install Symfony and other dependencies
RUN composer install

# Expose port 80 for Apache
EXPOSE 80

# Start Apache in the foreground
CMD ["apache2-foreground"]
