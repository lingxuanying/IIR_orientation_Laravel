/app/wait_for_it.sh db:3306
php artisan key:generate
php artisan migrate
php artisan serve --host=0.0.0.0 --port=8000