# Start with PHP 8.3 FPM (FastCGI Process Manager)
FROM php:8.3-fpm

# Define a proper user to avoid permission issues
RUN addgroup --gid 1000 user
RUN adduser --disabled-password --gecos '' --uid 1000 --gid 1000 user
RUN usermod -aG www-data user

# Update package list and install dependencies
RUN apt-get update && apt-get install -y \
    curl vim ssh apt-utils build-essential wget bash \
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
    pgsql \
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

RUN pecl install pcov && \
    docker-php-ext-enable pcov

# Redis for caching/sessions
#RUN pecl install redis && docker-php-ext-enable redis

# Get Composer (PHP package manager)
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Add our PHP config
COPY ./docker/php/php.ini /usr/local/etc/php/conf.d/custom.ini

# Set working directory
WORKDIR /var/www/app

# Use the user created earlier
USER user

# What command to run
CMD ["php-fpm"]

# Document that we use port 9000
EXPOSE 9000
