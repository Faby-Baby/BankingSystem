# BankingSystem


Welcome to our Banking System website, built using the Laravel framework. This guide will help you set up and run the project on your local development machine.

## Prerequisites

Before you begin, make sure you have the following installed:
- PHP (version 7.4 or higher) https://windows.php.net/download#php-8.3 (Download VS16 x64 Thread Safe Zip 2024-Apr-10 15:13:46)
- Composer - https://getcomposer.org/download/
- PostgreSQL & PgAdmin 4 - https://www.postgresql.org/download/


## Installation

1. **Clone the repository**

   First, clone this repository to your local machine using the following Git command:

git clone https://github.com/Faby-Baby/BankingSystem.git




2. **Navigate into the project directory**

After cloning, change into the project directory:

cd BankingSystem


3. **Install dependencies**

Run the following command in the terminal to install the necessary PHP packages:

composer install


4. **Environment setup**

Copy the `.env.example` file to create a `.env` file. You can do this with the following command:

cp .env.example .env


5. **Database setup using pgAdmin4**

- **Create a new login role**: Open pgAdmin4, right-click on 'Login/Group Roles', and select 'Create' > 'Login/Group Role'. Enter a name and password for your role under the 'Definition' tab.

- **Create a database**: Right-click on 'Databases', and select 'Create' > 'Database'. Name your database and set the owner to the login role you just created.

After creating your database and role, update your `.env` file with your PostgreSQL settings:


DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=bankingsystem
DB_USERNAME=bankmanager
DB_PASSWORD=banker


6. **Generate application key**

Run the following command to generate a new application key:

php artisan key:generate



7. **Run migrations**

Execute the following command to create the database tables:

php artisan migrate

php artisan db:seed


8. **Start the server**

Finally, start the Laravel development server:

php artisan serve



This command will start the server on http://localhost:8000. Open this URL in your browser to view the application.

## Usage

Now that your project is set up, you can start using the Banking System website. Log in using the credentials provided or register as a new user to test the functionality.

For more details on Laravel and how to work with its features, refer to the official Laravel documentation: https://laravel.com/docs

## Troubleshooting

If you encounter any issues during the setup, make sure all the prerequisites are properly installed and that your `.env` file is configured correctly. Check the Laravel, Composer, and PostgreSQL documentation for further guidance.


9. **Register a new account to start manuevering website.**