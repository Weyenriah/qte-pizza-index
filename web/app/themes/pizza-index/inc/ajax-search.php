<?php
/**
 * AJAX fetch for search.
 */

add_action( 'wp_footer', 'ajax_fetch' );
function ajax_fetch() { ?>
    <script type="text/javascript">
        (function($) {
            $("#search").keyup(function() {
                var search = $("#search").val();
                $.ajax({
                    url: pizza_ajaxcalls.ajaxurl,
                    data: {
                        action: 'search_pizzas',
                        search: search,
                        nonce: pizza_ajaxcalls.nonce
                    },
                    success:function(data) {
                        $("#pizzas").html(data);
                    },
                    error: function(data) {
                        console.log(data);
                    }
                });
            });
        })(jQuery);
    </script>
<?php }

/**
 * Query for pizzas based on search query.
 */
add_action('wp_ajax_search_pizzas', 'search_pizzas');
add_action('wp_ajax_nopriv_search_pizzas', 'search_pizzas');
function search_pizzas() {
    check_ajax_referer('ajax-nonce', 'nonce');

    $search = $_GET['search'];

    // If no search query, show all pizzas
    if(!$search) {
        show_all_pizzas();
        die();
    }

    // If search query, show pizzas based on search query.
    $args = array(
        'post_type' => 'pizza',
        'posts_per_page' => -1,
        's' => $search
    );

    $query = new WP_Query($args);

    if($query->have_posts()) {
        while($query->have_posts()): $query->the_post();
            the_pizza();
        endwhile;
        wp_reset_postdata();
    } else {
        echo 'No pizzas found';
    }

    die();
}

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
        while($query->have_posts()): $query->the_post();
            the_pizza();
        endwhile;
        wp_reset_postdata();
    } else {
        echo 'No pizzas found';
    }
}

function the_pizza() {
    echo
        '<article class="pizza">'
            . '<img src="' . get_template_directory_uri() . '/assets/icons/pizza.svg" alt="' . get_the_title() . '">'
            . '<div>'
                . '<h2 class="pizza-title">' . get_the_title() . '</h2>'
                . '<p class="pizza-description">' . get_field('description') . '</p>'
            . '</div>'
        . '</article>'
    ;
}