# BankingSystem



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

- **Create a new login role**: Open pgAdmin4, right-click on 'Login/Group Roles', and select 'Create' > 'Login/Group Role'. Enter 'bankmanager' as the name and 'banker' as the password for your role under the 'Definition' tab. Ensure 'able to login' is selected.

- **Create a database**: Right-click on 'Databases', and select 'Create' > 'Database'. Name your database as 'bankingsystem' and set the owner to the login role you just created.

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
Two accounts have been made to facilitate use of the application after running `php artisan db:seed`.
Email and Password are as follows:

Client: jane@example.com, password
Employee: john@example.com, password



# Introduction to the Banking System

Welcome to the Faster Than Light Banking System built using a Laravel framework is a robust software application designed to streamline and enhance the efficiency of banking operations. This system provides a secure and centralized platform for both customers and bank employees to manage financial activities with reliability and precision.

## Overview of the Banking System

Faster than Light Banking System is crafted to handle a range of essential banking operations, from account management to complex transactions processing. It serves as a comprehensive solution for modern banking needs, ensuring that all interactions are secure, efficient, and user-friendly.

## Key Features

### User Authentication
- **Secure Access**: Both customers and bank employees can access the system with secure login functionality, ensuring that all operations are protected by strong authentication measures.
- **Role-Based Access**: Different user roles are supported, each with specific access rights and permissions, allowing for tailored user experiences and operational control.

### Account Management
- **Account Operations**: Customers can open new accounts such as savings, checking, and loans, while bank employees can manage these accounts, including viewing, editing, and closing them as needed.
- **Maintenance and Updates**: Employees can perform maintenance tasks such as updating contact details or changing account statuses to ensure up-to-date and accurate account management.

### Transactions Processing
- **Diverse Transactions**: The system supports deposits, withdrawals, fund transfers, bill payments, and currency exchanges.
- **Real-Time Processing**: Transactions are processed in real time, ensuring immediate updates to account balances and transaction histories.

### Customer Service
- **Self-Service Portal**: Customers have access to balance inquiries, transaction histories, and account statements, enabling them to manage their finances independently.
- **Employee Assistance Tools**: Bank employees can assist customers with inquiries, resolve account issues, and facilitate requests for additional services using the system’s comprehensive tools.

### Security Measures
- **Data Protection**: The system implements robust security protocols, including encryption of data transmissions and secure storage of sensitive information.
- **Monitoring and Audit Trails**: Authentication mechanisms and audit trails are in place to monitor system access and activity, safeguarding against unauthorized access and malicious activities.

## Goals and Expectations

FTL aims to provide a seamless interface for banking operations, catering to both the operational needs of bank employees and the service expectations of customers. By utilizing this platform, users can expect a secure, efficient, and responsive banking experience that meets the demands of modern financial transactions and services.

Thank you for choosing Faster Than Light Banking. We are committed to delivering a reliable and effective solution for your banking needs.


## Prerequisites

Before you begin, make sure you have the following installed:
- PHP (version 7.4 or higher) https://windows.php.net/download#php-8.3 (Download VS16 x64 Thread Safe Zip 2024-Apr-10 15:13:46)
- Composer - https://getcomposer.org/download/
- PostgreSQL & PgAdmin 4 - https://www.postgresql.org/download/

