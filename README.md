## Installation Guide

Please follow these steps to install simple commenting system

-   clone project.
-   run composer update
-   cp .env-example .env
-   set database information
-   run migration using php artisan migrate
-   set fake data using php artisan db:seed
-   run composer run dev
-   default admin user is admin@example.com and password is password

### Category data is cached so, after creating category if it is not showing please run http://127.0.0.1:8000/clear-cache to clear cache
