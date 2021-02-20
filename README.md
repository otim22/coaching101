## Coachin101

Getting in touch with a teacher of your choice and sharing knowledge.

This repo is functionality complete — PRs and issues welcome!

----------

# Getting started

## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/8.X/installation#installation)

Alternative installation is possible with local dependencies relying on [Valet](#valet). 

Clone the repository

    git clone https://github.com/otim22/coaching101.git
 
 Switch to the repo folder

    cd coaching101

Install all the dependencies using composer

    composer install
    
And all the frontend dependencies using npm

    npm install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate
    
Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000

**TL;DR command list**

    git clone https://github.com/otim22/coaching101.git
    cd coaching101
    composer install
    npm install
    cp .env.example .env
    php artisan key:generate
    
**Make sure you set the correct database connection information before running the migrations** [Environment variables](#environment-variables)

    php artisan migrate
    php artisan serve

## Database seeding

**Populate the database with seed data with relationships which includes users, subjects, categories, years, terms and others. This can help you to quickly start testing the api or couple a frontend and start using it with ready content.**

This step is optional but if need arises, open the DatabaseSeeder and set the property values as per your requirement

    database/seeds/DatabaseSeeder.php

Run the database seeder and you're done

    php artisan db:seed
 
***Note*** : It's recommended to have a clean database before seeding. You can refresh your migrations at any point to clean the database by running the following command be sure to seed again your data

    php artisan migrate:refresh

If you want to both refreshing and seeding then run

    php artisan migrate:refresh --seed
    
## Docker

To install with [Docker](https://www.docker.com), run following commands:

```
git clone https://github.com/otim22/coaching101.git
cd coaching101
cp .env.example.docker .env
docker run -v $(pwd):/app composer install
cd ./docker
docker-compose up -d
docker-compose exec php php artisan key:generate
docker-compose exec php php artisan migrate
docker-compose exec php php artisan db:seed
docker-compose exec php php artisan serve --host=0.0.0.0
```

The serve can be accessed at [http://localhost:8000/api](http://localhost:8000).

# Code overview

## Dependencies

- [laravel](https://laravel.com) - PHP Framework on which the application is built off
- [laravel-cors](https://github.com/barryvdh/laravel-cors) - For handling Cross-Origin Resource Sharing (CORS)
- [livewire](https://laravel-livewire.com) - For building reactive, dynamic interfaces using Laravel Blade as our templating language
- [bootstrap](https://getbootstrap.com) - CSS Framework which the application uses, And most of its dependencies such jQuery, popper, bootstrap-icons, font-awesome, videojs-playlist
- And a few other laravel packages. (spatie/laravel-collection-macros, spatie/laravel-medialibrary, spatie/laravel-permission, spatie/laravel-query-builder, spatie/laravel-searchable, spatie/laravel-sluggable, willvincent/laravel-rateable, laravelcollective/html, barryvdh/laravel-debugbar

## Environment variables

- `.env` - Environment variables can be set in this file

***Note*** : You can quickly set the database information and other variables in this file and have the application fully working.

----------

# Testing APP

Run the laravel development server

    php artisan serve
    
 
 The api can now be accessed at

    http://localhost:8000
