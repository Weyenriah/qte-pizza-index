# Pizza Index Codetest
This is my custom codetest for qte development. Why did I create a pizza index? I wanted to list items that are similar but could be 1. Searched on based on name and 2. Filtered by differences (toppings in this case).

Specifications I set upon myself was:
* Search and filter should be made using AJAX.
* There should be atleast 1 field made using ACF Extended.

The website is made using Bedrock, because it was an easy way to use Composer to handle plugins instead of the Wordpress Admin UI.

## Install using WP CLI
You'll need to install WP CLI (https://make.wordpress.org/cli/handbook/guides/installing/), mysql/mysql-client, Docker and Composer for this to work.

1. Clone the repo.
3. Run `cp .env.local .env`
4. Run `composer install`
5. Run `docker compose up`
6. Run `mysql -u root -p -h 127.0.0.1 --port 3306 mydb < example_db.sql`, password is `root`.
7. Run `wp server`
8. Try the page out on [localhost:8080](http://localhost:8080/)

## Wordpress Login when using DB Dump
Username: `root`

Password: `root`
