<?php
/**
 * Title: List of pizzas with search and filter based on toppings.
 * Slug: pizza-index/pizzas
 * Categories: pizza, pizzas, index
 */

?>

<h1 class="pizzas">Browse our pizzas</h1>

<div class="pizzas-container">
    <div class="pizzas-wrapper">
        <!-- Search field -->
        <span class="search-wrapper">
            <img class="search-icon" src="<?php echo get_template_directory_uri(); ?>/assets/icons/search.svg" alt="Search icon">
            <input type="text" id="search" name="search" placeholder="Search for pizzas...">
        </span>

        <div id="pizzas">
            <?php show_all_pizzas(); ?>
        </div>
    </div>

    <!-- Filter by toppings -->
    <div class="toppings">
        <h2 class="toppings-title">
            I want the following on my pizza:
        </h2>

        <ul class="toppings-list">
            <?php show_all_toppings(); ?>
        </ul>
    </div>
</div>