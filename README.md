# Delivery Time Feature

This project is a Delivery Time Feature developed using Symfony and Doctrine ORM.

## Requirements

- PHP 8.0 or higher
- Composer
- Symfony CLI (optional but recommended)
- MySQL or another supported database

## Setup

Follow these steps to set up the project:

1. **Clone the repository:**

   ```bash
   git clone https://github.com/katkamravikanth/delivery-time-feature.git
   cd delivery-time-feature
   ```

2. **Install dependencies:**
   `composer install`

3. **Configure the environment variables:**

   Copy the .env file to create a local environment configuration file:
   `cp .env .env.local`

   Edit the .env.local file to set your database connection details:

   ```bash
   DATABASE_URL="mysql://<username>:<password>@127.0.0.1:3306/<database>?serverVersion=mariadb-10.4.8&charset=utf8mb4"
   APP_SECRET=<Secret-Key>
   ```

4. **Create the database:**

   `php bin/console doctrine:database:create`

5. **Run migrations:**

   `php bin/console doctrine:migrations:migrate`

6. **Load fixture data:**

   `php bin/console doctrine:fixtures:load`

## Running the Application

To run the Symfony server, use the following command:

`symfony server:start`

Alternatively, you can use the built-in PHP server:

`php -S localhost:8000 -t public`

## Accessing the Route

# Estimate Delivery Time for an Order

To estimate the delivery time for an order, you can use the following endpoint:

GET `/order/1/estimate`

Example:

`curl http://localhost:8000/order/1/estimate`
