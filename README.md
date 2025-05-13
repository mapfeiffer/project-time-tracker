# 🚀 TimeTracker

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


1. Install packages

    ```php
    composer install
    ```
   
2. Sail build & start

    ```php
    ./vendor/bin/sail up -d 
    ```
3. Login into sail

    ```php
    ./vendor/bin/sail bash 
    ```

4. Install packages

    ```php
    composer install
    ```

5. Npm Install

    ```php
    npm install & npm run build 
    ```
   
6. Run setup. Includes creating users, roles and example data

    ```php
    composer setup
    ```

7. Go to login page (http://127.0.0.1/) and use user "admin@admin.com" with "password". Or use one of the developer
   accounts. (developer1@admin.com/password)

8. Ass admin you can create projects and reports, ass developer you can add time periods to projects and edit/delete
   them.

9. Run browser tests php artisan dusk & pest 

    ```php
    php artisan dusk:install && php artisan dusk 
    ```
   ```php
   php artisan test tests/Unit/CheckPeriodTraitTest.php
   ```

10. Run PHP CS Fixer and PHPStan 

    ```php
   ./vendor/bin/php-cs-fixer fix app
    ```
    ```php
   ./vendor/bin/phpstan analyse app
    ```
