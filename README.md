## Dependencies
php 8.1^\
composer 2.3.10^\
npm 6.14.13^\
postgres || mysql

## Setup
Create empty database (postgres or mysql)\
Example: first_app

Copy .env.example file to .env file\
Set database credentials (mysql/postgres) to created database

Also add second app link to connection\
REDIRECT_APP=LINK_TO_APP

Add second database credentials, when second project will be setup. (check .env.example)

## Run:
composer i\
php artisan key:generate\
php artisan migrate\
php artisan migrate --seed\
npm i\
npm run dev\
php artisan serve
