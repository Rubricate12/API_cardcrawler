# Card Crawler API (Backend)

## Introduction

This repository hosts the backend API for the [Card Crawler](https://github.com/maruffirdaus/card-crawler) application. This API is developed using the [Laravel](https://laravel.com/) PHP framework and utilizes [MySQL](https://www.mysql.com/) as its database.

The primary role of this API is to manage all data operations, implement business logic, and serve data to the Card Crawler frontend application.

**Frontend Repository:** [maruffirdaus/card-crawler](https://github.com/maruffirdaus/card-crawler)

## Features

This API provides the following core functionalities:
* User authentication (registration, login, logout).
* Leaderboard management
* Achievements management
* Endpoints for fetching data user,leaderboard, and achievements


## Technologies Used

* **Framework:** Laravel 11
* **Language:** PHP 8.4
* **Database:** MySQL
* **Package Manager:** Composer
* **API Authentication:** (Laravel Sanctum)

## Prerequisites

Before setting up the project, ensure you have the following installed on your development machine:
* PHP (version compatible with your Laravel version)
* Composer (PHP package manager)
* MySQL Server
* Git

## Installation and Setup

Follow these steps to get the API_cardcrawler backend up and running:

1.  **Clone the repository:**
    ```bash
    git clone [https://github.com/Rubricate12/API_cardcrawler.git](https://github.com/Rubricate12/API_cardcrawler.git)
    cd API_cardcrawler
    ```

2.  **Install PHP dependencies using Composer:**
    ```bash
    composer install
    ```

3.  **Create your environment file:**
    Copy the example environment file. This file will store your application's configuration, including database credentials.
    ```bash
    cp .env.example .env
    ```

4.  **Configure your `.env` file:**
    Open the `.env` file and update the following settings, at a minimum:
    ```ini
    APP_NAME="Card Crawler API"
    APP_ENV=local
    APP_KEY=
    APP_DEBUG=true
    APP_URL=http://localhost:8000 # Or your preferred local URL

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database_name # Replace with your actual database name
    DB_USERNAME=your_db_username   # Replace with your MySQL username
    DB_PASSWORD=your_db_password   # Replace with your MySQL password
    ```
    *Ensure you create a corresponding database in MySQL.*

5.  **Generate an application key:**
    This key is used for encryption and is essential for your Laravel application.
    ```bash
    php artisan key:generate
    ```
    *(This will fill the `APP_KEY` in your `.env` file)*

6.  **Run database migrations:**
    This command will create all the necessary tables in your database as defined in the `database/migrations` directory.
    ```bash
    php artisan migrate
    ```

7.  **Serve the application:**
    You can use Laravel's built-in development server:
    ```bash
    php artisan serve
    ```
    By default, the API will be available at `http://127.0.0.1:8000` or the port specified by the serve command.

## API Endpoints

The API routes are defined in the `routes/api.php` file. This file contains all the endpoints available for the frontend application to consume.


## Database

This project uses MySQL as its database.
* Ensure your MySQL server is running.
* Create a database for this project (e.g., `card_crawler_api_db`).
* Update the `DB_DATABASE`, `DB_USERNAME`, and `DB_PASSWORD` variables in your `.env` file with your MySQL credentials.
* The database schema is managed through Laravel's migration system, located in the `database/migrations` directory.
