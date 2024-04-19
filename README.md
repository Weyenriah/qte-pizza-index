# Pizza Index Codetest
This is my custom codetest for qte development. Why did I create a pizza index? I wanted to list items that are similar but could be 1. Searched on based on name and 2. Filtered by differences (toppings in this case).

Specifications I set upon myself was:
* Search and filter should be made using AJAX.
* There should be atleast 1 field made using ACF Extended.

## Install using WP CLI
1. Install WP CLI to your command line: https://make.wordpress.org/cli/handbook/guides/installing/
2. Run `cp .env.local .env`
3. Run `composer install`
4. Run `docker compose up`
5. Run `mysql -u root -p -h 127.0.0.1 --port 3306 mydb < example_db.sql`, password is `root`.
6. Run `wp server`
7. Try the page out on [localhost:8080](http://localhost:8080/)

## Wordpress Login when using DB Dump
Username: `root`

Password: `root`
