<?php
/**
 * All of these functions are used to render html.
 */

/**
 * Query to show all pizzas.
 */
function show_all_pizzas() {
    $args = array(
        'post_type' => 'pizza',
        'posts_per_page' => -1
    );

    $query = new WP_Query($args);

    if($query->have_posts()) {
        while($query->have_posts()) {
            $query->the_post();
            the_pizza();
        }
        wp_reset_postdata();
    } else {
        echo '<p class="no-pizzas"> No pizzas found :(</p>';
    }
}

/**
 * Display a pizza.
 */
function the_pizza() {
    $pizza_ID = get_the_ID();
    ?>
    <article class="pizza">
        <img
            src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/icons/pizza.svg"
            alt="<?php the_title(); ?>"
        >
        <div>
            <h2 class="pizza-title">
                <?php the_title(); ?>
            </h2>
            <p class="pizza-description">
                <?php the_field( 'description', $pizza_ID ); ?>
            </p>
            <ul class="pizza-descriptives">
                <?php
                if( have_rows( 'descriptives', $pizza_ID ) ) {
                    while( have_rows( 'descriptives', $pizza_ID ) ) {
                        the_row();
                        ?>
                        <li class="pizza-descriptive">
                            <?php the_sub_field( 'word' ); ?>
                        </li>
                    <?php }
                } ?>
            </ul>
        </div>
    </article>
<?php }

/**
 * Query to show all toppings.
 */
function show_all_toppings() {
    $terms = get_terms('toppings');

    foreach($terms as $term) { ?>
        <li class="toppings-list-item">
            <input
                class="checkbox"
                type="checkbox"
                id="<?php echo esc_attr( $term->slug ); ?>"
                name="<?php echo esc_attr( $term->slug ); ?>"
                value="<?php echo esc_attr( $term->slug ); ?>"
            >
            <label for="<?php echo esc_attr( $term->slug ); ?>">
                <?php echo esc_html( $term->name ); ?>
            </label>
        </li>
    <?php }
}