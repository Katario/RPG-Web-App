# Start with PHP 8.3 FPM (FastCGI Process Manager)
FROM php:8.3-fpm

# Update package list and install dependencies
RUN apt-get update && apt-get install -y \
    curl \
    # Required for GD extension (images)
    libpng-dev \
    # Required for mbstring
    libonig-dev \
    # Required for XML handling
    libxml2-dev \
    # Required for Zip handling
    libzip-dev \
    # Required for PostGreSQL
    libpq-dev \
    # Required for intl extension
    libicu-dev \
    zip \
    unzip

# Clean up to reduce image size
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
# Each one serves specific purpose:
RUN docker-php-ext-install \
    pdo_pgsql \
    mbstring \
    # Image metadata
    exif \
    # Process control
    pcntl \
    # Better math functions
    bcmath \
    # Image manipulation
    gd \
    intl \
    zip \
    # Code caching for performance
    opcache

# Redis for caching/sessions
#RUN pecl install redis && docker-php-ext-enable redis

# Get Composer (PHP package manager)
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Add our PHP config
COPY ./docker/php/php.ini /usr/local/etc/php/conf.d/custom.ini

# Set working directory
WORKDIR /var/www/app

# What command to run
CMD ["php-fpm"]

# Document that we use port 9000
EXPOSE 9000
