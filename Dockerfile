# Use official PHP image
FROM php:8.2-apache

# Install PDO and PostgreSQL extensions
RUN docker-php-ext-install pdo pdo_pgsql

# Copy project files into the container
COPY . /var/www/html/

# Enable Apache rewrite module (if needed)
RUN a2enmod rewrite

# Expose port 80
EXPOSE 80
