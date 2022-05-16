<?php

function qit_register_post_types() {
	register_taxonomy( 'qit_cases_technologies', [ 'qit_cases' ], [
		'label'        => 'Languages',
		'labels'       => [
			'name'              => 'Technologies',
			'singular_name'     => 'Technology',
			'search_items'      => 'Search Technologies',
			'all_items'         => 'All Technologies',
			'view_item '        => 'View Technology',
			'parent_item'       => 'Parent Technology',
			'parent_item_colon' => 'Parent Technology:',
			'edit_item'         => 'Edit Technology',
			'update_item'       => 'Update Technology',
			'add_new_item'      => 'Add New Technology',
			'new_item_name'     => 'New Technology Name',
			'menu_name'         => 'Technologies',
			'back_to_items'     => '← Back to Technologies',
		],
		'description'  => '',
		'public'       => true,
		'hierarchical' => true,

		'rewrite'           => true,
		'capabilities'      => array(),
		'meta_box_cb'       => null,
		'show_admin_column' => false,

		'show_in_rest'      => null,

		'rest_base'         => null,


	] );register_taxonomy( 'qit_cases_tags', [ 'qit_cases' ], [
		'label'        => 'Tags',
		'labels'       => [
			'name'              => 'Tags',
			'singular_name'     => 'Tag',
			'search_items'      => 'Search Tags',
			'all_items'         => 'All Tags',
			'view_item '        => 'View Tags',
			'parent_item'       => 'Parent Tags',
			'parent_item_colon' => 'Parent Tags:',
			'edit_item'         => 'Edit Tags',
			'update_item'       => 'Update Tags',
			'add_new_item'      => 'Add New Tag',
			'new_item_name'     => 'New Tag Name',
			'menu_name'         => 'Tags',
			'back_to_items'     => '← Back to Tags',
		],
		'description'  => '',
		'public'       => true,
		'hierarchical' => true,

		'rewrite'           => true,
		'capabilities'      => array(),
		'meta_box_cb'       => null,
		'show_admin_column' => false,

		'show_in_rest'      => null,

		'rest_base'         => null,


	] );
	register_post_type( 'qit_cases', [
		'label'         => null,
		'labels'        => [
			'name'               => 'Cases',
			'singular_name'      => 'Cases',
			'add_new'            => 'Add Case',
			'add_new_item'       => 'Adding Case',
			'edit_item'          => 'Edit Case',
			'new_item'           => 'New Case',
			'view_item'          => 'Watch Case',
			'search_items'       => 'Search Case',
			'not_found'          => 'Not found',
			'not_found_in_trash' => 'Not found',
			'parent_item_colon'  => '',
			'menu_name'          => 'Cases',
		],
		'description'   => '',
		'public'        => true,
		'show_in_menu'  => null,
		// показывать ли в меню адмнки
		'show_in_rest'  => null,
		// добавить в REST API. C WP 4.7
		'rest_base'     => null,
		// $post_type. C WP 4.7
		'menu_position' => null,
		'menu_icon'     => null,
		//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
		'hierarchical'  => false,
		'supports'      => [ 'title', 'editor', 'thumbnail','excerpt' ],
		// 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'    => [],
		'has_archive'   => true,
		'rewrite' => array('slug' => 'cases'),
		'query_var'     => true,
	] );
}