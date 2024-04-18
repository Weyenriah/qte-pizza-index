# Pizza Index Codetest
This is my custom codetest for qte development. Why did I create a pizza index? I wanted to list items that are similar but could be 1. Searched on based on name and 2. Filtered by differences (toppings in this case).

Specifications I set upon myself was:
* Search and filter should be made using AJAX.
* There should be atleast 1 field made using ACF Extended.

Usually I would've wanted to create something a little bit more fancy, but due to me not having ACF Pro I had to get creative with the small toolkit provided by the free version.

## Install using WP CLI
1. Install WP CLI to your command line: https://make.wordpress.org/cli/handbook/guides/installing/
2. Run `cp .env.local .env`
3. Run `composer install`
4. Run `docker compose up`
5. Run `wp server`
6. Now you should be able to go to [http://localhost:8080/wp/wp-admin/](http://localhost:8080/wp/wp-admin/). Do the Wordpress installation.
7. Activate Advanced Custom Fields Pro in Plugins.
8. Change your theme to "Pizza Index".
9. Add pizzas (you can use below data if you want).
10. Try the page out on [localhost:8080](http://localhost:8080/)

## Data you could use, if you want to
Add these pizzas to the Pizza Post Type.
```
Hawaii
```
```
A pizza made with ham, tomato sauce and pineapple.
```
---
```
Vesuvius
```
```
A pizza made with ham and tomato sauce.
```
---
```
Kebab Pizza
```
```
A pizza made with the finest kebab meat, tomato sauce and onion.
```
