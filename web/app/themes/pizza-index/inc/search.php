<?php
/**
 * Code for search functionality.
 *
 * @package pizza-index
 */

/**
 * AJAX fetch for search.
 */
function ajax_fetch() { ?>
    <script type="text/javascript">
        (function($) {
            $("#search").keyup(function() {
                const search = $("#search").val();

                // Get all checked checkboxes.
                const filter = [];
                $(".checkbox:checked").each(function() {
                    filter.push($(this).val());
                });

                $.ajax({
                    url: pizza_ajaxcalls.ajaxurl,
                    data: {
                        action: 'search_pizzas',
                        search: search,
                        filter: filter,
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

            $(".checkbox").change(function() {
                // Get all checked checkboxes.
                const filter = [];
                $(".checkbox:checked").each(function() {
                    filter.push($(this).val());
                });

                const search = $("#search").val();

                $.ajax({
                    url: pizza_ajaxcalls.ajaxurl,
                    data: {
                        action: 'search_pizzas',
                        filter: filter,
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
add_action( 'wp_footer', 'ajax_fetch' );

/**
 * Query for pizzas based on search query.
 */
function search_pizzas() {
    check_ajax_referer('ajax-nonce', 'nonce');

    $search = $_GET['search'];
    $filter = $_GET['filter'];

    // If no search query, show all pizzas
    if(!$search && !$filter) {
        show_all_pizzas();
        die();
    }

    $args = array(
        'post_type' => 'pizza',
        'posts_per_page' => -1,
    );

    // If search query, add to args.
    if($search) {
        $args['s'] = $search;
    }

    // If filter, add to args.
    if($filter) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'toppings',
                'field' => 'slug',
                'terms' => $filter,
                'operator' => 'AND'
            ),
        );
    }

    // Query and show pizzas accordingly.
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

    die();
}
add_action('wp_ajax_search_pizzas', 'search_pizzas');
add_action('wp_ajax_nopriv_search_pizzas', 'search_pizzas');
