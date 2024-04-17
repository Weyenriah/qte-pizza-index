<?php
/**
 * Title: List of pizzas with search and filter based on toppings.
 * Slug: pizza-index/pizzas
 * Categories: pizza, pizzas, index
 */


?>

<h1>Browse our pizzas</h1>

<!-- Search field -->
<input type="text" id="search" name="search" placeholder="Search for pizzas...">

<div id="pizzas">
    <?php show_all_pizzas(); ?>
</div>