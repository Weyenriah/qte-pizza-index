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
function the_pizza() { ?>
    <article class="pizza">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/pizza.svg" alt="<?php the_title(); ?>">
        <div>
            <h2 class="pizza-title"><?php the_title(); ?></h2>
            <p class="pizza-description"><?php the_field('description'); ?></p>
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
            <input class="checkbox" type="checkbox" id="<?php echo $term->slug; ?>" name="<?php echo $term->slug; ?>" value="<?php echo $term->slug; ?>">
            <label for="<?php echo $term->slug; ?>"><?php echo $term->name; ?></label>
        </li>
    <?php }
}