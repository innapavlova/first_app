## Setup
Create empty database (postgres, mysql)

Copy .env.example file to .env file\
Set database credentials

Example:\
DB_CONNECTION=pgsql\
DB_HOST=127.0.0.1\
DB_PORT=5432\
DB_DATABASE=first_app\
DB_USERNAME=postgres\
DB_PASSWORD=

Also add second app link\
REDIRECT_APP=LINK

## Run:
composer i\
php artisan key:generate\
php artisan migrate\
php artisan migrate --seed\
npm i\
npm run dev\
php artisan serve
