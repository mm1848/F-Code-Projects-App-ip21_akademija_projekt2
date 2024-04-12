# Crypto Prices

Crypto Prices is a Laravel-based project that allows users to view real-time cryptocurrency prices via the Coinbase API. This application provides an interactive web interface where users can manage their favorite cryptocurrencies and view prices dynamically.

## Features

- **Web Interface**: Interactive user registration and login.
- **Manage Favorites**: Users can select and manage their favorite cryptocurrencies.
- **Real-time Updates**: Prices update in real time using the Coinbase API.

## Requirements

- PHP 7.4 or higher.
- MySQL or MariaDB.
- Composer for managing PHP dependencies.
- Laravel 8.x or newer.

## Installation

To install the Crypto Prices application, follow these steps:

1. Clone the repository to your local machine:
   ```bash
   git clone <url-to-your-repository>

2. Install PHP and Laravel dependencies by running Composer in the project's root directory:
   ``bash
   composer install

3. Set up your environment file:
- Copy the .env.example file to .env.
- Configure your database settings within the .env file.

4. Run the Laravel migrations to set up the database:
- php artisan migrate

## Running the Web Application
- Serve the application using Laravel's built-in server:
   ```bash
   php artisan serve

- Access the web interface by navigating to http://localhost:8000 in your web browser.

## Notes

- The application allows for user-specific customization and displays cryptocurrency prices in a more interactive manner.
- Ensure your server meets all required dependencies and version specifications before installation.

### Key Updates
1. **Features**: Described the web-specific features such as user registration, login, and real-time updates.
2. **Installation and Setup**: Streamlined instructions focusing on setting up Laravel, including environment configuration and database migrations.
3. **Running the Application**: Provided straightforward instructions for launching the app using Laravel's built-in server, which is suitable for development purposes.

This README is tailored to guide users through setting up and using your Laravel web application efficiently, emphasizing the interactivity and real-time capabilities of the web interface.