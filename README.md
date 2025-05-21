# 🚀 Project time tracker

A tool to track working time on projects with role management and create project reports.

It is based on Kaido-Kit (https://github.com/siubie/kaido-kit) with Laravel & Filament and was an application test.

![PHP Version](https://img.shields.io/badge/PHP-8.2-blue?style=flat-square&logo=php)
![Laravel Version](https://img.shields.io/badge/Laravel-12.0-red?style=flat-square&logo=laravel)
![Filament Version](https://img.shields.io/badge/Filament-3.2-purple?style=flat-square)

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

Before beginning with the installation, you will need the following

- Docker 
- Composer 

### Clone the repository 

- Open your terminal or command prompt
- Navigate to the directory where you want to save the project
- Use the git clone command followed by the repository URL

```php
git clone https://github.com/mapfeiffer/project-time-tracker.git
```

### Copy example env file to .env 

```php
cp .env.example .env 
```

### Install composer packages

```php
composer install
```

### Sail build & start

```php
./vendor/bin/sail up -d 
```

### Login into laravel container

```php
./vendor/bin/sail bash 
```

### Run mpm install and build 

```php
npm install
```
```
npm run build 
```

### Run setup. Includes creating users, roles and example data

```php
composer setup
```

### Create an App key 

```php
php artisan key:generate
```
   
### Using 

- Go to login page (http://127.0.0.1/) and login as "admin@admin.com" with password "password". 
- Or use one of the developer accounts. (developer1@admin.com & password).
- As an administrator, you can create projects and reports. 
- As a developer, you can add time periods to projects and edit/delete them.
- As an administrator, you can change access for any user. For example, you can give a user administrator permissions. 

## 🧪 Testing

### Run browser tests with dusk

```php
php artisan dusk:install 
php artisan dusk 
```
    
### Run PHPUnit test 

```php
php artisan test tests/Unit/CheckPeriodTraitTest.php
```

## 🧹 Code style and static code analysis  

### Run PHP CS Fixer 

```php
./vendor/bin/php-cs-fixer fix app
```
    
### Run PHPStan

```php
./vendor/bin/phpstan analyse app
```
