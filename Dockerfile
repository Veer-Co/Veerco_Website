FROM php:8.1-fpm

# Arguments defined in docker-compose.yml
ARG user
ARG uid=1000

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip

RUN apt-get install -y nodejs npm

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Create system user to run Composer and Artisan Commands
RUN useradd -G www-data,root -u $uid -m /home/$user $user

# Set working directory
WORKDIR /var/www

COPY . .

ENV HOME /home/$user


# Add Node.js to PATH environment variable
ENV PATH=$PATH:$HOME/$user/node_modules/.bin

# Set HOME environment variable

# Post build instructions
RUN npm install 
