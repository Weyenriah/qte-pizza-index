<?php
/**
 * Enqueue scripts and styles.
 */
function my_register_script_method () {
    // Enqueue scripts
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

    // Enqueue styles
    wp_enqueue_style( 'main', get_template_directory_uri() . '/assets/styles/main.css' );
    wp_enqueue_style( 'search', get_template_directory_uri() . '/assets/styles/search.css' );
    wp_enqueue_style( 'pizza', get_template_directory_uri() . '/assets/styles/pizza.css' );
    wp_enqueue_style( 'toppings', get_template_directory_uri() . '/assets/styles/toppings.css' );

}
add_action('wp_enqueue_scripts', 'my_register_script_method');

/**
 * Register custom post type for Pizzas.
 * I registered this CPT before I got the Extended ACF plugin to work, I keep it here due to time and
 * to show that I can register a CPT without a plugin.
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
            'supports'   => array('title', 'custom-fields' ),
            'taxonomies' => array('toppings'),
            'show_in_rest' => true,
		)
	);
}
add_action('init', 'pizza_index_custom_post_type');

/**
 * Register custom taxonomy for Toppings.
 * Same as the CPT.
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
 * Register render functions.
 */
require 'inc/render.php';

/**
 * Register fields from Extended ACF.
 */
require 'inc/fields.php';

/**
 * Add AJAX search fetch.
 */
require 'inc/search.php';

/**
 * Add blocks.
 */
require 'inc/blocks/pizza-index/pizza-index.php';