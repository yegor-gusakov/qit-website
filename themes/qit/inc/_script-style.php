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
    wp_enqueue_style( 'fonts-montserrat-qit', 'https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap', [], null );
    wp_enqueue_style( 'bootstrap-qit', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css', [], null );
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
	wp_register_script( 'bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js', ['jquery'], '3.4.2', true );

}
