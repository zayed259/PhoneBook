<h1 align="center">PhoneBook</h1>


----------

# Getting started

## Installation

Clone the repository

    git clone https://github.com/zayed259/PhoneBook.git

Switch to the repository folder

    cd PhoneBook

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    copy .env.example .env

Generate a new application key

    php artisan key:generate
    
Link storage to the public folder

    php artisan storage:link

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate


Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000

**TL;DR command list**

    git clone https://github.com/zayed259/PhoneBook.git
    cd PhoneBook
    composer install
    cp .env.example .env
    php artisan key:generate
    php artisan storage:link
    
**Make sure you set the correct database connection information before running the migrations** [Environment variables](#environment-variables)

    php artisan migrate
    php artisan serve

## Folders

- `app` - Contains all the Eloquent models
- `app/Http/Controllers` - Contains all the controllers
- `app/Http/Middleware` - Contains the middleware
- `config` - Contains all the application configuration files
- `database/migrations` - Contains all the database migrations
- `database/seeds` - Contains the database seeder
- `routes` - Contains all the web routes defined in web.php file
- `resources` - Contains all the view blade file
- `public` - Contains all the assets file, storage link folder
- `tests` - Contains all the application tests

## Environment variables

- `.env` - Environment variables can be set in this file

***Note*** : You can quickly set the database information and other variables in this file and have the application fully working.

----------

## Contributing

Feel free to contribute this repository.

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to me via [zayedbd24@gmail.com](mailto:zayedbd24@gmail.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).