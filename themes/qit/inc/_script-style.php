<?php
defined( 'ABSPATH' ) || exit;

/**
 * CSS files
 * @add_action
 * @wp_enqueue_scripts
 * @qit_styles
 */
add_action( 'wp_enqueue_scripts', 'qit_styles' );
function qit_styles() {
	/**
	 * Enqueue Style
	 * @wp_enqueue_style
	 */
    wp_enqueue_style( 'fonts-inter-qit', 'https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap', [], null );
    wp_enqueue_style( 'bootstrap-qit', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css', [], null );
    wp_enqueue_style( 'bundle-qit', TEMPLATE_PATH . '/assets/css/bundle.css', [], '1.2.6' );

}
/**
 * JS files
 * @add_action
 * @wp_enqueue_scripts
 * @qit_scripts
 */
add_action( 'wp_enqueue_scripts', 'qit_scripts' );
function qit_scripts() {

    /**
     * Jquery
     */
    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', TEMPLATE_PATH . '/assets/js/src/jquery/jquery.js', false, '3.4.2', false );
    wp_enqueue_script( 'jquery' );

	/**
	 * Enqueue Script
	 * @wp_enqueue_script
	 */
    wp_enqueue_script( 'bundle-qit', TEMPLATE_PATH . '/assets/js/bundle.js', ['jquery'], '1.1.0', true );
	wp_enqueue_script( 'bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js', ['jquery'], '3.4.2', true );

}
