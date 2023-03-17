# ![Urlink Fcode](/public/assets/img/logo/logo.png "Optional Title")



> ### Example Laravel codebase containing **Urlink Fcode** examples (CRUD, Auth, advanced patterns and more) that adheres to the [Urlink-Fcode](https://gitlab.com/firstcodesa/urlink-fcode/-/tree/main) spec and API.

This repo is functionality not complete yet — PRs and issues welcome!

----------

# Getting started


## Description
__Urlink Fcode__ is a web application that helps you to collect all your data, communication and social media on one page.

If you are interested in building a unique **landing page** that you can easily manage, then you are in the right place.

## Installation

Please check the official Laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/6.x/installation) 

Clone the repository

    https://gitlab.com/firstcodesa/urlink-fcode.git

Switch to the repo folder

    cd urlink-fcode

update all the dependencies using composer

    composer update

Install all the dependencies using composer

    composer install

Copy the example **.env** file and make the required configuration changes in the **.env** file

    cp .env.example .env

Generate a new application key

    php artisan key:generate

Generate a new JWT authentication secret key

    php artisan jwt:secret

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000

**TL;DR command list**

    git clone git@github.com:gothinkster/laravel-realworld-example-app.git
    cd laravel-realworld-example-app
    composer install
    cp .env.example .env
    php artisan key:generate
    php artisan jwt:generate 
    
**Make sure you set the correct database connection information before running the migrations** [Environment variables](#environment-variables)

    php artisan migrate
    php artisan serve

## API Specification

This application adheres to the api specifications set by the [Fcode](fahad@fcode.sa) Company. This helps mix and match any backend with any other frontend without conflicts.

----------

# Code overview

## Dependencies

- [jwt-auth](https://github.com/tymondesigns/jwt-auth) - For authentication using JSON Web Tokens
- [laravel-cors](https://github.com/barryvdh/laravel-cors) - For handling Cross-Origin Resource Sharing (CORS)
- [Swagger](https://github.com/DarkaOnLine/L5-Swagger) - For annotations and generating documentation for (APIs)

## Folders

- `app` - Contains all the Eloquent models
- `app/Http/Controllers/API` - Contains all the api controllers
- `app/Http/Middleware` - Contains the JWT auth middleware
- `config` - Contains all the application configuration files
- `database/migrations` - Contains all the database migrations
- `API routes` - Contains all the api routes defined in api.php file
- `Web routes` - Contains all the web routes defined in web.php file

## Environment variables

- `.env` - Environment variables can be set in this file

***Note*** : You can quickly set the database information and other variables in this file and have the application fully working.

----------

# Testing API

Run the laravel development server

    php artisan serve

The api can now be accessed at

    http://localhost:8000/api

Request headers

| **Required** 	| **Key**              	| **Value**            	|
|----------	|------------------	|------------------	|
| Yes      	| Content-Type     	| application/json 	|
| Yes      	| Accept 	        | application/json 	|
| Optional 	| Authorization    	| Token {JWT}      	|

Refer the [api specification](#api-specification) for more info.

----------
 
# Authentication
 
This applications uses JSON Web Token (JWT) to handle authentication. The token is passed with each request using the `Authorization` header with `Token` scheme. The JWT authentication middleware handles the validation and authentication of the token. Please check the following sources to learn more about JWT.
 
- https://jwt.io/introduction/
- https://self-issued.info/docs/draft-ietf-oauth-json-web-token.html

----------

# Cross-Origin Resource Sharing (CORS)
 
This applications has CORS enabled by default on all API endpoints. The default configuration allows requests to help speed up your frontend testing (**especially with Swagger**). The CORS allowed origins can be changed by setting them in the config file. Please check the following sources to learn more about CORS.
 
- https://developer.mozilla.org/en-US/docs/Web/HTTP/Access_control_CORS
- https://en.wikipedia.org/wiki/Cross-origin_resource_sharing
- https://www.w3.org/TR/cors

----------------------------


# Swagger
 
This applications hasSwagger/OpenApi annotations and generating documentation,
in order to generate the Swagger/OpenApi documentation for your APIs. 
Swagger offers a set of annotations to declare and manipulate the output. These annotations can be added to your controller, model, or even a separate file.

**After the annotations have been added you can run php artisan l5-swagger:generate to generate the documentation.**

Alternatively, you can set L5_SWAGGER_GENERATE_ALWAYS to true in your .env file so that your documentation will automatically be generated. Make sure your settings in config/l5-swagger.php are complete.

The Swagger can now be accessed at

    http://localhost:8000/api/documentation


Please check the following sources to learn more about Swagger.
 
- https://github.com/DarkaOnLine/L5-Swagger/blob/master/README.md
- https://github.com/DarkaOnLine/L5-Swagger/wiki/Installation-&-Configuration

## License
**All rights reserved to Fcode company**

Direct communication is through the official email of the company
[fahad@fcode.sa](fahad@fcode.sa)