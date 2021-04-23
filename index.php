<?php
/**
 * Plugin Name: CP Filter
 * Description: Wordpress filter plugin.
 * Version: 0.0.1
 * Author: creativepaddy
 * Plugin Slug: cp-filter
 */

include plugin_dir_path(__FILE__).'/includes/general.php';
include plugin_dir_path(__FILE__).'/includes/shortcodes.php';
include plugin_dir_path(__FILE__).'/includes/cp-filter.php';

function cp_filter_enqueue_script() {
    $localize = array(
        'ajaxurl' => admin_url( 'admin-ajax.php' )
    );
    wp_enqueue_script( 'cp-filter-script', plugin_dir_url( __FILE__ ) . 'assets/script.js', array('jquery'), '1.0.0' );
    wp_localize_script( 'cp-filter-script', 'cp_filter', $localize);
}
add_action( 'wp_enqueue_scripts', 'cp_filter_enqueue_script' );