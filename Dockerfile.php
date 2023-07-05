# Use the official PHP image with Apache
FROM php:apache

# Install required dependencies
RUN apt-get update && apt-get install -y \
    zip \
    unzip \
    git \
    libmcrypt-dev

# Install PDO MySQL extension for PHP
RUN docker-php-ext-install pdo pdo_mysql

# Copy the Apache config file to enable mod_rewrite (if needed)
COPY apache.conf /etc/apache2/sites-available/000-default.conf

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Copy working files into the container's web directory
COPY . /var/www/html/

# Set the working directory
WORKDIR /var/www/html

# Install Node.js and npm
RUN curl -sL https://deb.nodesource.com/setup_14.x | bash -
RUN apt-get install -y nodejs npm

# Copy Composer files into the container
COPY composer.json composer.lock /var/www/html/

# Install project dependencies
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer install --no-interaction --no-scripts
RUN npm install


# Set file and project permissions and  Use the root user for Apache (for development purposes only)
USER root
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache


# Expose port 80
EXPOSE 80

# Start Apache with the foreground option
CMD ["apache2-foreground"]
