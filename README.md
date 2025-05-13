# 🚀 TimeTracker

A tool to track time working on projects with role management and create project reports.

It is based on Kaido-Kit with Laravel & Filament.

## ✨ Features

- Erstellen von Projekten, auf die Zeiten gebucht werden können ☑️

- Buchen von Arbeitszeiten im viertel-Stunde-Rhythmus: Es wird immer aufwärts gerundet. Eine Minute => 15 min. ☑️

- Eingabe von Zeiten im Format “Xh Ym”, wobei X und Y Ganzzahlen sind ☑️

- Eingabe von Zeiten im Maschinenstundenformat (0,25 - 1 für eine Stunde) ☑️

- Zuweisung von Zeiten zu Tagen ☑️

- Nachträgliche Bearbeitung von Buchungen ☑️

- “Monatsabschluss” bei der eine Zusammenfassung generiert wird und bei dem die Zeiten dann unveränderlich sind ☑️

- Verifizierung der Implementierung mittels automatisierter Tests (only LoginTest done)

- (Optional) Rechteunterscheidung zwischen Administratoren und Benutzern (Benutzer können keinen Monatsabschluss machen
  und Projekte nicht löschen) ☑️

## 🚀 Quick Start

1. Sail build & start

    ```php
    ./vendor/bin/sail up -d 
    ```
2. Login into sail

    ```php
    ./vendor/bin/sail bash 
    ```

3. Install packages

    ```php
    composer install
    ```

4. Npm Install

    ```php
    npm install & npm run build 
    ```
   
5. Run setup. Includes creating users, roles and example data

    ```php
    composer setup
    ```

6. Go to login page (http://127.0.0.1/) and use user "admin@admin.com" with "password". Or use one of the developer
   accounts. (developer1@admin.com/password)

7. Ass admin you can create projects and reports, ass developer you can add time periods to projects and edit/delete
   them.

8. Run browser tests php artisan dusk & pest 

    ```php
   php artisan dusk 
    ```
   ```php
   php artisan test tests/Unit/CheckPeriodTraitTest.php
   ```

9. Run PHP CS Fixer and PHPStan 

    ```php
   ./vendor/bin/php-cs-fixer fix app
    ```
    ```php
   ./vendor/bin/phpstan analyse app
    ```
