# 🚀 Project time tracker

A tool to track working time on projects with role management and create project reports.

It is based on Kaido-Kit with Laravel & Filament and was an application test.

## ✨ Features

- Creating projects for which time can be booked ☑️

- Booking working hours in quarter-hour increments: Always round upwards. One minute => 15 minutes. ☑️

- Enter times in the format “Xh Ym”, where X and Y are integers ☑️

- Entering times in machine hour format (0.25 - 1 for one hour) ☑️

- Assigning times to days ☑️

- Subsequent processing of bookings ☑️

- “Month-end closing” where a summary is generated and the times are then unchangeable ☑️

- Verification of the implementation using automated tests

- Rights differentiation between administrators and users (users cannot perform monthly closings or delete projects) ☑️

## 🚀 Quick Start

1. Copy example env file to .env 

    ```php
    cp .env.example .env 
    ```

2. Install composer packages

    ```php
    composer install
    ```

3. Sail build & start

    ```php
    ./vendor/bin/sail up -d 
    ```
   
4. Login into laravel container

    ```php
    ./vendor/bin/sail bash 
    ```

5. Run mpm install and build 

    ```php
    npm install
    ```
    ```
    npm run build 
    ```

6. Run setup. Includes creating users, roles and example data

    ```php
    composer setup
    ```
   
7. Create App key 

    ```php
    artisan key:generate
   ```
   
8. Go to login page (http://127.0.0.1/) and login as "admin@admin.com" with password "password". 
Or use one of the developer accounts. (developer1@admin.com & password)


9. As an administrator, you can create projects and reports. As a developer, you can add time periods to projects and edit/delete
   them.

## 🧪 Testing

1. Run browser tests with dusk

    ```php
    php artisan dusk:install 
    php artisan dusk 
    ```
    
2. Run PHPUnit test 
   ```php
   php artisan test tests/Unit/CheckPeriodTraitTest.php
   ```

## 🧹 Code style and static code analysis  

1. Run PHP CS Fixer 

    ```php
    ./vendor/bin/php-cs-fixer fix app
    ```
    
2. Run PHPStan
    ```php
    ./vendor/bin/phpstan analyse app
    ```
