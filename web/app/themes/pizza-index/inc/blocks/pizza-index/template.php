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
            <!-- Show favorites, only shown when not searched. -->
            <div class="pizzas-favorites">
                <?php
                if( have_rows('favorites' ) ) {
                    while( have_rows('favorites' ) ) {
                        the_row();

                        $pizza = get_sub_field('pizza');
                        $pizza_ID = $pizza->ID;
                        ?>
                        <article class="pizzas-favorite">
                            <img
                                src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/icons/pizza-white.svg"
                                alt="<?php echo esc_attr( get_the_title($pizza_ID) ); ?>"
                            >
                            <div>
                                <h2 class="pizza-title">
                                    <?php echo esc_html( get_the_title($pizza_ID) ); ?>
                                </h2>
                                <p class="pizza-description">
                                    <?php echo esc_html( get_field('description', $pizza_ID) ); ?>
                                </p>
                            </div>
                        </article>
                    <?php }
                } ?>
            </div>
            <!-- Show all pizzas. -->
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