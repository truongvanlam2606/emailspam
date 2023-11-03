## Project: Test System
## Language: PHP Laravel

## Installation Instructions

1. copy .env.example

2. Create database mysql.

3. install composer
- composer install

3. Run data

- php artisan migrate
- php artisan db:seed
- php artisan db:seed --class=SurveySeeder

4. Optimize

- php artisan storage:link
- php artisan optimize:clear

5. start server

- php artisan serve

 * NOTE : Run php artisan server => error path image 
 Please configure the virtual domain to avoid the error of the image path

## Build FE
1. npm i 
2. add MIX_APP_URL= APP_URL (domain) to .env file
3.  - npm run watch-poll 
    - npm run dev
    - npm run prod

* NOTE: npm run watch-poll to server hot reload (dev on local), npm run dev to build env dev, npm run prop to build for production


## Login admin

- path : /admin
- Account:
    + email: admin@gmail.com
    + pass:  12345678

## file postman
- https://www.getpostman.com/collections/74b8f0aa374351a8a751
