composer create-project --prefer-dist laravel/laravel crudapplication

CREATE DATABASE laravel_app;

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_app
DB_USERNAME=
DB_PASSWORD=

php artisan migrate

php artisan make:controller AuthController

Parent Layout File – /resources/views/layouts/layout.blade.php
Login View – /resources/views/auth/login.blade.php
Registration View – /resources/views/auth/register.blade.php
Dashboard View – /resources/views/dashboard.blade.php

 php artisan serve

 URL – http://127.0.0.1:8000/login

 RL – http://127.0.0.1:8000/registration



Laravel 8 CRUD

php artisan make:migration create_products_table --create=products

php artisan migrate


php artisan make:controller ProductController --resource --model=Product


app/Http/Controllers/ProductController.php 

 model at app/Models/Product.php






 php artisan serve
Open up the URL: http://127.0.0.1:8000/products






