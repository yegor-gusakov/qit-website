<?php
defined( 'ABSPATH' ) || exit;

/**
 * Save ACF Settings to Json
 *
 * @acf
 */
add_filter( 'acf/settings/save_json', 'qit_acf_json_save_point' );

function qit_acf_json_save_point( $path ) {

	$path = get_stylesheet_directory() . '/acf-json';

	return $path;

}

/**
 * Load ACF Settings to Json
 *
 * @acf
 */
add_filter( 'acf/settings/load_json', 'qit_acf_json_load_point' );

function qit_acf_json_load_point( $paths ) {

	unset( $paths[0] );
	$paths[] = get_stylesheet_directory() . '/acf-json';

	return $paths;

}

/**
 * Options page
 */
if ( function_exists( 'acf_add_options_page' ) ) {

	/**
	 * Theme Settings
	 */
	$parent = acf_add_options_page( array(
		'page_title' => __( 'Theme Settings', 'qit' ),
		'menu_title' => __( 'Theme Settings', 'qit' ),
		'menu_slug'  => 'theme_settings',
		'capability' => 'edit_posts',
		'position'   => '15.54',
		'post_id'    => 'theme_settings',
		'icon_url'   => 'dashicons-schedule',
		'redirect'   => false
	) );


	acf_add_options_page( array(
		'page_title' => __( 'Banners', 'qit' ),
		'menu_title' => __( 'Banners', 'qit' ),
		'menu_slug'  => 'qit_banners',
		'capability' => 'edit_posts',
		'position'   => '15.54',
		'post_id'    => 'qit_banners',
		'icon_url'   => 'dashicons-schedule',
		'redirect'   => false
	) );
}


function qit_register_blocks() {

	if ( function_exists( 'acf_register_block_type' ) ) {

		acf_register_block_type( array(
			'name'            => 'blog_tips',
			'title'           => __( 'Blog tips' ),
			'description'     => __( 'A custom blog tips block.' ),
			'render_template' => 'template-parts/parts/blocks/blog_tips/tip.php',
			'category'        => 'qit-blocks',
		) );
		acf_register_block_type( array(
			'name'            => 'blog_ads',
			'title'           => __( 'Blog ads' ),
			'description'     => __( 'A custom blog ads block.' ),
			'render_template' => 'template-parts/parts/blocks/blog_ads/ad.php',
			'category'        => 'qit-blocks',
		) );
		acf_register_block_type( array(
			'name'            => 'blog_notes',
			'title'           => __( 'Blog notes' ),
			'description'     => __( 'A custom blog notes block.' ),
			'render_template' => 'template-parts/parts/blocks/blog_notes/note.php',
			'category'        => 'qit-blocks',
		) );
		acf_register_block_type( array(
			'name'            => 'blog_post_insert',
			'title'           => __( 'Blog post insert' ),
			'description'     => __( 'A custom blog post insert block.' ),
			'render_template' => 'template-parts/parts/blocks/blog_insert/insert.php',
			'category'        => 'qit-blocks',
		) );
	}
}

add_action( 'enqueue_block_editor_assets', 'add_block_editor_assets', 10, 0 );
function add_block_editor_assets() {
	wp_enqueue_style( 'block_editor_css',
		get_template_directory_uri() . '/assets/admin/editor-blocks.css' );
}

add_action( 'acf/init', 'qit_register_blocks' );

add_filter( 'block_categories', 'custom_block_category', 10, 2 );
function custom_block_category( $default_categories, $post ) {

	if ( $post->post_type !== 'post' ) {
		return $default_categories;
	}

	return array_merge(
		$default_categories,
		[
			[
				'slug'  => 'qit-blocks',
				'title' => __( 'QIT', 'qit' ),
				'icon'  => 'wordpress'
				// Иконка для категории, можно передать null если иконка не нужна
			],
		]
	);

}