<?php
/**
 * Template for Pizza Index block.
 */
?>
<h1 class="pizzas-heading">
    <?php the_field('title'); ?>
</h1>

<div class="pizzas-container">
    <div class="pizzas-wrapper">
        <!-- Search field. -->
        <span class="search-wrapper">
            <img
                class="search-icon"
                src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/icons/search.svg"
                alt="Search icon"
            >

            <input type="text" id="search" name="search" placeholder="Search for pizzas...">
        </span>

        <!-- Show pizzas. -->
        <div id="pizzas">
            <?php show_all_pizzas(); ?>
        </div>
    </div>

    <!-- Filter by toppings. -->
    <div class="toppings">
        <h2 class="toppings-title">
            <?php esc_html_e( 'I want the following on my pizza:', 'pizza-index' ); ?>
        </h2>

        <ul class="toppings-list">
            <?php show_all_toppings(); ?>
        </ul>
    </div>
</div>