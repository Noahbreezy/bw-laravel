# Project Setup Guide

Follow these steps to set up the project with seeders, MySQL, and storage link.

## Prerequisites

- PHP
- Composer
- MySQL
- Laravel

## Steps

1. **Clone the repository:**
    ```bash
    git clone https://github.com/yourusername/bw-laravel.git
    cd bw-laravel
    ```

2. **Install dependencies:**
    ```bash
    composer install
    npm install
    ```

3. **Copy the example environment file and configure it:**
    ```bash
    cp .env.example .env
    ```

4. **Generate an application key:**
    ```bash
    php artisan key:generate
    ```

5. **Set up the database:**
    - Create a MySQL database.
    - Update the `.env` file with your database credentials:
      ```env
      DB_CONNECTION=mysql
      DB_HOST=127.0.0.1
      DB_PORT=3306
      DB_DATABASE=your_database_name
      DB_USERNAME=your_database_user
      DB_PASSWORD=your_database_password
      ```

6. **Run the migrations and seeders:**
    ```bash
    php artisan migrate --seed
    ```

7. **Create a symbolic link for storage:**
    ```bash
    php artisan storage:link
    ```

8. **Start the development server:**
    ```bash
    php artisan serve
    ```

Your project should now be up and running. Access it at `http://localhost:8000`.
