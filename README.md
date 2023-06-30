# E-commerce API Documentation

### Table of Contents
Introduction
System Requirements
Installation and Setup
Configuration
User Authentication
Product APIs
Review APIs

### Introduction
The E-commerce API is a RESTful web service built with Laravel, providing endpoints for managing products, reviews, and user authentication. This documentation describes the available APIs and their usage.

### System Requirements
Before using the E-commerce API, ensure that your system meets the following requirements:

PHP version 7.4 or higher
MySQL version 5.7 or higher
Composer (PHP package manager)


### Installation and Setup
Follow these steps to install and set up the E-commerce API:

Clone the project repository from GitHub:

* git clone https://github.com/pratikranaa/ecom_api_laravel.git
* cd ecom_api_laravel

Create a copy of the .env.example file and name it .env:

* cp .env.example .env

Generate an application key:
* php artisan key:generate

Configure the database connection in the .env file. Provide the necessary credentials for your MySQL database:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password

Run the database migrations to create the required tables:
* php artisan migrate

Start the development server:
* php artisan serve

### Configuration
The configuration for the E-commerce API is stored in the .env file located at the project root. This file contains environment-specific settings such as database connection details and application key.

You can modify the .env file to customize the configuration according to your requirements.

### User Authentication
The E-commerce API uses Laravel Jetstream and Livewire for user authentication. The following endpoints are available for user authentication:

POST /register: Creates a new user account.
POST /login: Authenticates a user and returns an access token.
POST /logout: Invalidates the user's access token and logs out the user.

### Product APIs
The E-commerce API provides the following endpoints for managing products:

GET /api/products: Retrieves a list of products.
GET /api/products/{id}: Retrieves details of a specific product.
POST /api/products: Creates a new product.
PUT /api/products/{id}: Updates details of a specific product.
DELETE /api/products/{id}: Deletes a specific product.

### Review APIs

The E-commerce API allows users to review products. The following endpoints are available for managing reviews:

GET /api/products/{id}/reviews: Retrieves reviews for a specific product.
POST /api/products/{id}/reviews: Creates a new review for a specific product.
PUT /api/reviews/{id}: Updates details of a specific review.
DELETE /api/reviews/{id}: Deletes a specific review.

