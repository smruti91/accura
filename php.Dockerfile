FROM php:8.3-apache

# Install MySQL extensions for PHP
RUN docker-php-ext-install pdo pdo_mysql mysqli

# Enable Apache mod_rewrite if needed
RUN a2enmod rewrite

# Set working directory
WORKDIR /var/www/html