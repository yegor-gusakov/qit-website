<?php
defined( 'ABSPATH' ) || exit;

/**
 * CSS files
 *
 * @add_action
 * @wp_enqueue_scripts
 * @qit_styles
 */
add_action( 'wp_enqueue_scripts', 'qit_styles' );
function qit_styles() {
	/**
	 * Enqueue Style
	 *
	 * @wp_enqueue_style
	 */
	wp_enqueue_style( 'bootstrap',
		'https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css',
		[], null );
//	wp_enqueue_style( 'bootstrap-content', 'https://cdn.rawgit.com/afeld/bootstrap-toc/v1.0.1/dist/bootstrap-toc.min.css', ['bootstrap'], null );
	wp_enqueue_style( 'bundle-qit', TEMPLATE_PATH . '/assets/css/bundle.css',
		[ 'bootstrap' ], '1.2.6' );

}

/**
 * JS files
 *
 * @add_action
 * @wp_enqueue_scripts
 * @qit_scripts
 */
add_action( 'wp_enqueue_scripts', 'qit_scripts' );
function qit_scripts() {
	global $wp_query;

	/**
	 * Jquery
	 */

	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', 'https://code.jquery.com/jquery-3.6.0.min.js',
		false, '3.6.0', false );
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'bootstrap',
		'https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js',
		[ 'jquery' ], '3.4.2', true );
	wp_enqueue_script( 'header-qit', TEMPLATE_PATH . '/assets/js/header.js',
		[ 'jquery' ], '1.2.0', true );
	wp_enqueue_script( 'videoplayer-qit',
		TEMPLATE_PATH . '/assets/js/videoplayer.js', [ 'jquery' ], '1.2.0',
		true );
	wp_enqueue_script( 'bundle-qit', TEMPLATE_PATH . '/assets/js/bundle.js',
		[ 'jquery', 'bootstrap' ], '1.2.0', true );

	if ( is_page( [ 4296, 421 ] ) ):
		wp_enqueue_script( 'pricing-qit',
			TEMPLATE_PATH . '/assets/js/pricing.js', [ 'jquery', 'bootstrap' ],
			'1.2.0', true );
		wp_enqueue_script( 'pricing-2-qit',
			TEMPLATE_PATH . '/assets/js/pricing-2.js',
			[ 'jquery', 'bootstrap' ], '1.2.0', true );

	endif;
	wp_enqueue_script( 'modals-qit',
		TEMPLATE_PATH . '/assets/js/testimonials.js', [ 'jquery', 'bootstrap' ],
		'1.2.0', true );
	/**
	 * Enqueue Script
	 *
	 * @wp_enqueue_script
	 */

	/**
	 * Enqueue Script post filters
	 */
	wp_register_script( 'qit-loadmore',
		get_stylesheet_directory_uri() . '/assets/js/script/loadmore.js',
		array( 'jquery', 'bundle-qit' ), '', true );
	wp_localize_script( 'qit-loadmore', 'qit_loadmore_params', array(
		'ajaxurl'      => site_url() . '/wp-admin/admin-ajax.php',
		'posts'        => json_encode( $wp_query->query_vars ),
		'current_page' => $wp_query->query_vars['paged']
			? $wp_query->query_vars['paged'] : 1,
		'max_page'     => $wp_query->max_num_pages
	) );
	if ( is_archive() ):
		wp_enqueue_script( 'qit-loadmore' );
	endif;
	wp_enqueue_script( 'qit-videoplayer',
		get_stylesheet_directory_uri() . '/assets/js/script/videoplayer.js',
		[ 'jquery', 'bundle-qit' ], '3.4.2', true );
	if ( is_singular( 'qit_open_position' ) ):
		wp_enqueue_script( 'qit-open-position', get_stylesheet_directory_uri()
		                                        . '/assets/js/script/open-position.js',
			[ 'jquery', 'bundle-qit' ], '3.4.2', true );
	endif;
	if ( ! is_front_page() && is_home() || is_single() ) :
		wp_enqueue_script( 'qit-blog',
			get_stylesheet_directory_uri() . '/assets/js/script/blog.js',
			[ 'jquery', 'bundle-qit' ], '3.4.2', true );
	endif;
	if ( is_page_template( 'templates/referral-program.php' ) ):
		wp_enqueue_script( 'qit-referral', get_stylesheet_directory_uri()
		                                   . '/assets/js/script/referal-program.js',
			[ 'jquery', 'bundle-qit' ], '3.4.2', true );
	endif;

	wp_enqueue_script( 'tuts/js', get_stylesheet_directory_uri()
	                              . '/assets/js/script/blog-pagination&filtration.js',
		[ 'jquery' ], null, true );
	wp_localize_script( 'tuts/js', 'bobz', array(
		'nonce'    => wp_create_nonce( 'bobz' ),
		'ajax_url' => admin_url( 'admin-ajax.php' )
	) );
}