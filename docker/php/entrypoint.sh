#!/bin/sh

composer install
php bin/console tailwind:build

php-fpm