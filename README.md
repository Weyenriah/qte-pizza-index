# Pizza Index Codetest
This is my custom codetest for qte development. Why did I create a pizza index? I wanted to list items that are similar but could be 1. Searched on based on name and 2. Filtered by differences (toppings in this case).

Specifications I set upon myself was:
* Search and filter should be made using AJAX.
* There should be atleast 1 field made using ACF Extended.

Usually I would've wanted to create something a little bit more fancy, but due to me not having ACF Pro I had to get creative with the small toolkit provided by the free version.

## Install using WP CLI
1. Install WP CLI to your command line: https://make.wordpress.org/cli/handbook/guides/installing/
2. `composer install`
3. `docker compose up`
4. `wp server`
5. Now you should be able to go to http://localhost:8080/wp/wp-admin/. Do the Wordpress installation.

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
