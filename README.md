# Pizza Index Codetest
This is my custom codetest for qte development. Why did I create a pizza index? I wanted to list items that are similar but could be 1. Searched on based on name and 2. Filtered by differences (toppings in this case).

Specifications I set upon myself was:
* Search and filter should be made using AJAX.
* There should be atleast 1 field made using ACF Extended.

The website is made using Bedrock, because it was an easy way to use Composer to handle plugins instead of the Wordpress Admin UI.

## Interesting files
The interesting files are located at `/web/app/themes/pizza-index`.

## Install using WP CLI
You'll need to install WP CLI (https://make.wordpress.org/cli/handbook/guides/installing/), mysql/mysql-client, Docker and Composer for this to work.

1. Clone the repo.
2. Run `cp .env.local .env`
3. Run `composer install`
4. Run `docker compose up`
5. OPTIONAL! Run to add example DB: `mysql -u root -p -h 127.0.0.1 --port 3306 mydb < example_db.sql`, password is `root`.
6. Run `wp server`
7. Log in at: [http://localhost:8080/wp/wp-admin](http://localhost:8080/wp/wp-admin)
8. See page at: [http://localhost:8080](http://localhost:8080)

## Wordpress Login when using DB Dump
Username: `root`

Password: `root`
