<?php
/**
 * Title: List of pizzas with search and filter based on toppings.
 * Slug: pizza-index/pizzas
 * Categories: pizza, pizzas, index
 */


?>

<h1 class="pizzas">Browse our pizzas</h1>

<!-- Search field -->
<span class="search-wrapper">
    <img class="search-icon" src="<?php echo get_template_directory_uri(); ?>/assets/icons/search.svg" alt="Search icon">
    <input type="text" id="search" name="search" placeholder="Search for pizzas...">
</span>

<div id="pizzas">
    <?php show_all_pizzas(); ?>
</div>