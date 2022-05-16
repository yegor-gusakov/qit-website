<?php
defined( 'ABSPATH' ) || exit;

/**
 * Save ACF Settings to Json
 * @acf
 */
add_filter('acf/settings/save_json', 'qit_acf_json_save_point');

function qit_acf_json_save_point( $path ) {

    $path = get_stylesheet_directory() . '/acf-json';
    return $path;

}

/**
 * Load ACF Settings to Json
 * @acf
 */
add_filter('acf/settings/load_json', 'qit_acf_json_load_point');

function qit_acf_json_load_point( $paths ) {

    unset($paths[0]);
    $paths[] = get_stylesheet_directory() . '/acf-json';
    return $paths;

}

/**
 * Options page
 */
if (function_exists('acf_add_options_page')) {

    /**
     * Theme Settings
     */
	$parent = acf_add_options_page(array(
        'page_title'    => __('Theme Settings', 'qit'),
        'menu_title'    => __('Theme Settings', 'qit'),
        'menu_slug'     => 'theme_settings',
        'capability'    => 'edit_posts',
        'position'      => '15.54',
        'post_id'       => 'theme_settings',
        'icon_url'      => 'dashicons-schedule',
        'redirect'      => false
    ));

}
