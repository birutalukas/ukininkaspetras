<?php

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| our theme. We will simply require it into the script here so that we
| don't have to worry about manually loading any of our classes later on.
|
*/

if (! file_exists($composer = __DIR__.'/vendor/autoload.php')) {
    wp_die(__('Error locating autoloader. Please run <code>composer install</code>.', 'sage'));
}

require $composer;

/*
|--------------------------------------------------------------------------
| Register The Bootloader
|--------------------------------------------------------------------------
|
| The first thing we will do is schedule a new Acorn application container
| to boot when WordPress is finished loading the theme. The application
| serves as the "glue" for all the components of Laravel and is
| the IoC container for the system binding all of the various parts.
|
*/

if (! function_exists('\Roots\bootloader')) {
    wp_die(
        __('You need to install Acorn to use this theme.', 'sage'),
        '',
        [
            'link_url' => 'https://roots.io/acorn/docs/installation/',
            'link_text' => __('Acorn Docs: Installation', 'sage'),
        ]
    );
}

\Roots\bootloader()->boot();

/*
|--------------------------------------------------------------------------
| Register Sage Theme Files
|--------------------------------------------------------------------------
|
| Out of the box, Sage ships with categorically named theme files
| containing common functionality and setup to be bootstrapped with your
| theme. Simply add (or remove) files from the array below to change what
| is registered alongside Sage.
|
*/

collect(['setup', 'filters'])
    ->each(function ($file) {
        if (! locate_template($file = "app/{$file}.php", true, true)) {
            wp_die(
                /* translators: %s is replaced with the relative file path */
                sprintf(__('Error locating <code>%s</code> for inclusion.', 'sage'), $file)
            );
        }
    });

add_action('wp_ajax_ajax_add_to_cart', 'handle_ajax_add_to_cart');
add_action('wp_ajax_nopriv_ajax_add_to_cart', 'handle_ajax_add_to_cart');

function handle_ajax_add_to_cart() {
    if ( !isset($_POST['security']) || !wp_verify_nonce($_POST['security'], 'ajax_nonce') ) {
        wp_send_json_error( array( 'message' => 'Invalid nonce' ) );
    }

    // Handle adding to cart logic here
    // Example of adding the product to the cart:
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];
    
    // Add product to cart
    WC()->cart->add_to_cart( $product_id, $quantity );

    // Respond back with success
    wp_send_json_success( array(
        'message' => 'Product added to cart!',
        'product_id' => $product_id,
    ));
}

add_action('wp_ajax_get_cart_count', 'get_cart_count_ajax');
add_action('wp_ajax_nopriv_get_cart_count', 'get_cart_count_ajax');

function get_cart_count_ajax() {
    wp_send_json_success([
        'count' => WC()->cart->get_cart_contents_count(),
    ]);
    wp_die(); // Important!
    
}
