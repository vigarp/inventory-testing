# Invenotry

## Getting Started

To get the Laravel server running locally:  

* Clone this repo with `git clone https://github.com/vigarp/inventory-testing.git inventory`

* `cd inventory`

* `composer install` to install all required dependencies

* Create a `.env` file and add following:

```sh
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_inventory
DB_USERNAME=yourmysqlusername
DB_PASSWORD=yourmysqluserpassword
```

* open your terminal as in this backend directory, then create a new database named `db_inventory`:

```
mysql> CREATE DATABASE db_inventory;
```

* exit from mysql interface:

```
mysql> exit
```

* then import the db_inventory.sql file with this command:

```
mysql -u yourusername -p db_inventory < db_inventory.sql
```

* Then `php artisan serve` to start the local server
