#!/bin/bash

# if [ ! -f "vendor/autoload.php" ]; then
    # composer install --no-progress --no-interaction
# fi
composer install --no-progress --no-interaction
# migrate removed
# php artisan migrate
php artisan route:clear
php artisan route:cache
php artisan config:clear
php artisan config:cache
php artisan optimize
php artisan serve --port=8000 --host=0.0.0.0 --env=.env
