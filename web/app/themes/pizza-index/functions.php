<?php
/**
 * Enqueue scripts and styles.
 */
add_action('wp_enqueue_scripts', 'my_register_script_method');
function my_register_script_method () {
    wp_register_script( 'jquery', includes_url( '/js/jquery/jquery.js' ), false, NULL, true );
    wp_enqueue_script( 'jquery' );

    wp_localize_script(
        'jquery',
        'pizza_ajaxcalls',
        array(
            'ajaxurl' => admin_url( 'admin-ajax.php' ),
            'nonce' => wp_create_nonce( 'ajax-nonce' ),
        )
    );
}

/**
 * Register custom post type for Pizzas.
 *
 * @link https://developer.wordpress.org/reference/functions/register_post_type/
 */
function pizza_index_custom_post_type() {
	register_post_type('pizza',
		array(
			'labels'      => array(
				'name'          => __('Pizzas', 'textdomain'),
				'singular_name' => __('Pizza', 'textdomain'),
			),
            'public'      => true,
            'has_archive' => false,
            'supports'   => array('title', 'custom-fields', 'thumbnail'),
            'taxonomies' => array('toppings'),
            'show_in_rest' => true,
		)
	);
}
add_action('init', 'pizza_index_custom_post_type');

/**
 * Register custom taxonomy for Toppings.
 *
 * @link https://developer.wordpress.org/reference/functions/register_taxonomy/
 */
function pizza_index_custom_taxonomy() {
    register_taxonomy('toppings', 'pizza',
        array(
            'labels' => array(
                'name'          => __('Toppings', 'textdomain'),
                'singular_name' => __('Topping', 'textdomain'),
            ),
            'hierarchical' => true,
        )
    );
}
add_action('init', 'pizza_index_custom_taxonomy');

/**
 * Register fields from Extended ACF.
 */
require_once 'inc/pizza-fields.php';

/**
 * Add AJAX fetch.
 */
require_once 'inc/ajax-search.php';