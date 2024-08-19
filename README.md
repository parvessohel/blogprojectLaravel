SpeechCraft blog Laravel Project Instructions...

Introduction:

This Laravel application is a simple blog platform that allows users to register, log in, and manage blog posts. The project includes user authentication, CRUD operations for blog posts, category management, and image uploads.

Features:

1. Admin Authentication: Admin registration, login, and password management.
2. User Authentication: User registration, login, and password management.
3. Blog Post CRUD: Create, read, update, and delete blog posts.
4. Category Management: Admins can manage categories (create, update, delete).
5. Image Upload: Users can upload images with their blog posts.

Setup Instructions to run the project downloaded from Git:


1. Cloning the Repository

First, clone the repository to your local machine using the following command:
```bash
git clone https://github.com/parvessohel/blogprojectLaravel/tree/master
```
Replace https://github.com/parvessohel/blogprojectLaravel/tree/master


2. List of technologies and tools that are used in this project:

Backend Technologies:

A. Framework: Laravel 10.
B. Programming language: PHP 8.3
C. Database: MySQL 8.0.
D. Dependency manager for PHP: Composer.

Frontend Technologies:

A. HTML5
B. CSS3
C. Bootstrap 5


Development Tools:

A. Git

Database Tools:

A. phpMyAdmin
B. MySQL

Authentication & Security:

A. Laravel Breeze

Image Handling:

A. Intervention Image
B. Laravel Filesystem


3. Installing Dependencies:

Navigate to the project directory and install the necessary dependencies:
Insert the following commands on the terminal.
cd <project-directory>
composer install
npm install


4. Setting Up the Database:

A. Environment Configuration: Copy the `.env.example` file to create a new `.env` file:
    ```bash
    cp .env.example .env
    ```
B. Database Configuration: Open the `.env` file and set the following variables to match your local database configuration:
    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database_name
    DB_USERNAME=your_database_username
    DB_PASSWORD=your_database_password
    ```

C. Generate Application Key: Run the following command to generate the application key:
    ```bash
    php artisan key:generate
    ```

D. Run Migrations: Execute the migrations to set up the database schema:

    ```bash
    php artisan migrate

    ```

5. Starting the Development Server:

To start the development server, run the following command:

```bash
php artisan serve
```
The application will be accessible at `http://127.0.0.1:8000/`.

Additional Commands:

Run Seeders: If you have seeders, you can run them using:
    ```bash
    php artisan db:seed
    ```
Running Tests**: If you have unit or feature tests, you can run them using:
    ```bash
    php artisan test
    ```

Conclusion:

The SpeechCraft Blog Laravel application should now be up and running. You can start developing and extending the features as needed. If you encounter any issues, please refer to me at this email address: pargamerx1264@gamil.com