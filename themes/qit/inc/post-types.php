<?php

function qit_post_types_and_tax() {
	qit_register_taxonomies();
	qit_register_post_types();
}

function qit_register_taxonomies() {

	/**
	 * Start taxonomy for open positions
	 */
	register_taxonomy( 'qit_open_position_tags', [ 'qit_open_position' ], [
		'label'             => 'Tags',
		'labels'            => [
			'name'              => 'Tags',
			'singular_name'     => 'Tag',
			'search_items'      => 'Search Tags',
			'all_items'         => 'All tags',
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
		'description'       => '',
		'public'            => true,
		'hierarchical'      => true,
		'rewrite'           => true,
		'capabilities'      => array(),
		'meta_box_cb'       => null,
		'show_admin_column' => false,
		'show_in_rest'      => null,
		'rest_base'         => null,
	] );
	register_taxonomy( 'qit_open_position_categories', [ 'qit_open_position' ],
		[
			'label'             => 'Categories',
			'labels'            => [
				'name'              => 'Categories',
				'singular_name'     => 'Category',
				'search_items'      => 'Search Category',
				'all_items'         => 'All categories',
				'view_item '        => 'View Category',
				'parent_item'       => 'Parent Category',
				'parent_item_colon' => 'Parent Category:',
				'edit_item'         => 'Edit Category',
				'update_item'       => 'Update Category',
				'add_new_item'      => 'Add New Category',
				'new_item_name'     => 'New Category',
				'menu_name'         => 'Category',
				'back_to_items'     => '← Back to Categories',
			],
			'description'       => '',
			'public'            => true,
			'hierarchical'      => true,
			'rewrite'           => true,
			'capabilities'      => array(),
			'meta_box_cb'       => null,
			'show_admin_column' => false,
			'show_in_rest'      => null,
			'rest_base'         => null,
		] );
	register_taxonomy( 'qit_open_position_levels', [ 'qit_open_position' ], [
		'label'             => 'Levels',
		'labels'            => [
			'name'              => 'Levels',
			'singular_name'     => 'Level',
			'search_items'      => 'Search Level',
			'all_items'         => 'All levels',
			'view_item '        => 'View Level',
			'parent_item'       => 'Parent Level',
			'parent_item_colon' => 'Parent Level:',
			'edit_item'         => 'Edit Level',
			'update_item'       => 'Update Level',
			'add_new_item'      => 'Add New Level',
			'new_item_name'     => 'New Level Name',
			'menu_name'         => 'Levels',
			'back_to_items'     => '← Back to Levels',
		],
		'description'       => '',
		'public'            => true,
		'hierarchical'      => true,
		'rewrite'           => true,
		'capabilities'      => array(),
		'meta_box_cb'       => null,
		'show_admin_column' => false,
		'show_in_rest'      => null,
		'rest_base'         => null,
	] );

	/**
	 * End taxonomy for open positions
	 */

	/**
	 * Start taxonomy for cases
	 */
	register_taxonomy( 'qit_cases_technologies', [ 'qit_cases' ], [
		'label'             => 'Languages',
		'labels'            => [
			'name'              => 'Technologies',
			'singular_name'     => 'Technology',
			'search_items'      => 'Search Technologies',
			'all_items'         => 'All technologies',
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
		'description'       => '',
		'public'            => true,
		'hierarchical'      => true,
		'rewrite'           => true,
		'capabilities'      => array(),
		'meta_box_cb'       => null,
		'show_admin_column' => false,
		'show_in_rest'      => null,
		'rest_base'         => null,
	] );
	register_taxonomy( 'qit_cases_platforms', [ 'qit_cases' ], [
		'label'             => 'Platforms',
		'labels'            => [
			'name'              => 'Platforms',
			'singular_name'     => 'Platform',
			'search_items'      => 'Search Platforms',
			'all_items'         => 'All platforms',
			'view_item '        => 'View Platforms',
			'parent_item'       => 'Parent Platforms',
			'parent_item_colon' => 'Parent Platforms:',
			'edit_item'         => 'Edit Platforms',
			'update_item'       => 'Update Platform',
			'add_new_item'      => 'Add New Platform',
			'new_item_name'     => 'New Platform Name',
			'menu_name'         => 'Platforms',
			'back_to_items'     => '← Back to Platforms',
		],
		'description'       => '',
		'public'            => true,
		'hierarchical'      => true,
		'rewrite'           => true,
		'capabilities'      => array(),
		'meta_box_cb'       => null,
		'show_admin_column' => false,
		'show_in_rest'      => null,
		'rest_base'         => null,
	] );
	register_taxonomy( 'qit_cases_expertise', [ 'qit_cases' ], [
		'label'             => 'Expertise',
		'labels'            => [
			'name'              => 'Expertise',
			'singular_name'     => 'Expertise',
			'search_items'      => 'Search Expertise',
			'all_items'         => 'All expertises',
			'view_item '        => 'View Expertise',
			'parent_item'       => 'Parent Expertise',
			'parent_item_colon' => 'Parent Expertise:',
			'edit_item'         => 'Edit Expertise',
			'update_item'       => 'Update Expertise',
			'add_new_item'      => 'Add New Expertise',
			'new_item_name'     => 'New Expertise Name',
			'menu_name'         => 'Expertise',
			'back_to_items'     => '← Back to Expertise',
		],
		'description'       => '',
		'public'            => true,
		'hierarchical'      => true,
		'rewrite'           => true,
		'capabilities'      => array(),
		'meta_box_cb'       => null,
		'show_admin_column' => false,
		'show_in_rest'      => null,
		'rest_base'         => null,
	] );
	register_taxonomy( 'qit_cases_services', [ 'qit_cases' ], [
		'label'             => 'Services',
		'labels'            => [
			'name'              => 'Services',
			'singular_name'     => 'Service',
			'search_items'      => 'Search Services',
			'all_items'         => 'All services',
			'view_item '        => 'View Services',
			'parent_item'       => 'Parent Services',
			'parent_item_colon' => 'Parent Services:',
			'edit_item'         => 'Edit Services',
			'update_item'       => 'Update Services',
			'add_new_item'      => 'Add New Services',
			'new_item_name'     => 'New Services Name',
			'menu_name'         => 'Services',
			'back_to_items'     => '← Back to Services',
		],
		'description'       => '',
		'public'            => true,
		'hierarchical'      => true,
		'rewrite'           => true,
		'capabilities'      => array(),
		'meta_box_cb'       => null,
		'show_admin_column' => false,
		'show_in_rest'      => null,
		'rest_base'         => null,
	] );
	register_taxonomy( 'qit_cases_tags', [ 'qit_cases' ], [
		'label'             => 'Tags',
		'labels'            => [
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
		'description'       => '',
		'public'            => true,
		'hierarchical'      => true,
		'rewrite'           => true,
		'capabilities'      => array(),
		'meta_box_cb'       => null,
		'show_admin_column' => false,
		'show_in_rest'      => null,
		'rest_base'         => null,
	] );
	/**
	 * End taxonomy for cases
	 */

	/**
	 * Start taxonomy for reviews
	 */
	register_taxonomy( 'qit_review_tags', [ 'qit_reviews' ], [
		'label'             => 'Tags',
		'labels'            => [
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
		'description'       => '',
		'public'            => true,
		'hierarchical'      => true,
		'rewrite'           => true,
		'capabilities'      => array(),
		'meta_box_cb'       => null,
		'show_admin_column' => false,
		'show_in_rest'      => null,
		'rest_base'         => null,
	] );
	register_taxonomy( 'qit_review_cat', [ 'qit_reviews' ], [
		'label'             => 'Review categories',
		'labels'            => [
			'name'              => 'Review categories',
			'singular_name'     => 'Review categories',
			'search_items'      => 'Search Review categories',
			'all_items'         => 'All Review categories',
			'view_item '        => 'View Review categories',
			'parent_item'       => 'Parent Review categories',
			'parent_item_colon' => 'Parent Review categories:',
			'edit_item'         => 'Edit Review categories',
			'update_item'       => 'Update Review categories',
			'add_new_item'      => 'Add New Review categories',
			'new_item_name'     => 'New Review categories Name',
			'menu_name'         => 'Review categories',
			'back_to_items'     => '← Back to Review categories',
		],
		'description'       => '',
		'public'            => true,
		'hierarchical'      => true,
		'rewrite'           => true,
		'capabilities'      => array(),
		'meta_box_cb'       => null,
		'show_admin_column' => false,
		'show_in_rest'      => null,
		'rest_base'         => null,
	] );
	/**
	 * End taxonomy for reviews
	 */

	/**
	 * Start taxonomy for technologies
	 */
	register_taxonomy( 'qit_technologies_direction', [ 'qit_technologies' ], [
		'label'             => 'Technology direction',
		'labels'            => [
			'name'              => 'Technology direction',
			'singular_name'     => 'Technology direction',
			'search_items'      => 'Search Technology direction',
			'all_items'         => 'All Technology direction',
			'view_item '        => 'View Technology direction',
			'parent_item'       => 'Parent Technology direction',
			'parent_item_colon' => 'Parent Technology direction:',
			'edit_item'         => 'Edit Technology direction',
			'update_item'       => 'Update Technology direction',
			'add_new_item'      => 'Add New Technology direction',
			'new_item_name'     => 'New Technology direction Name',
			'menu_name'         => 'Technology direction',
			'back_to_items'     => '← Back to Technology direction',
		],
		'description'       => '',
		'public'            => true,
		'hierarchical'      => true,
		'rewrite'           => true,
		'capabilities'      => array(),
		'meta_box_cb'       => null,
		'show_admin_column' => false,
		'show_in_rest'      => null,
		'rest_base'         => null,


	] );
	/**
	 * End taxonomy for technologies
	 */
	/**
	 * Remove taxonomy tags for blog
	 */
	register_taxonomy( 'post_tag', [] );
	/**
	 * Start taxonomy for technologies
	 */
	/**
	 * Start taxonomy tags for blog
	 */
	register_taxonomy( 'qit_posts_tags', [ 'post' ], [
		'label'             => 'Tags',
		'labels'            => [
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
		'description'       => '',
		'public'            => true,
		'hierarchical'      => true,
		'rewrite'           => true,
		'capabilities'      => array(),
		'meta_box_cb'       => null,
		'show_admin_column' => false,
		'show_in_rest'      => null,
		'rest_base'         => null,
	] );

}

function qit_register_post_types() {
	/**
	 * Start post type open position
	 */
	register_post_type( 'qit_open_position', [
		'label'         => null,
		'labels'        => [
			'name'               => 'Open Positions',
			'singular_name'      => 'Position',
			'add_new'            => 'Add Position',
			'add_new_item'       => 'Adding Position',
			'edit_item'          => 'Edit Position',
			'new_item'           => 'New Position',
			'view_item'          => 'Watch Position',
			'search_items'       => 'Search Position',
			'not_found'          => 'Not found',
			'not_found_in_trash' => 'Not found',
			'parent_item_colon'  => '',
			'menu_name'          => 'Open Positions',
		],
		'description'   => '',
		'public'        => true,
		'show_in_menu'  => null,
		'show_in_rest'  => null,
		'rest_base'     => null,
		'menu_position' => null,
		'menu_icon'     => null,
		'hierarchical'  => false,
		'supports'      => [ 'title', 'editor', 'thumbnail', 'excerpt' ],
		// 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'    => [ 'qit_open_positions_tags' ],
		'has_archive'   => true,
		'rewrite'       => array( 'slug' => 'open-positions' ),
		'query_var'     => true,
	] );
	/**
	 * End post type open position
	 */

	/**
	 * Start post type cases
	 */
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
		'show_in_rest'  => null,
		'rest_base'     => null,
		'menu_position' => null,
		'menu_icon'     => null,
		'hierarchical'  => false,
		'supports'      => [ 'title', 'editor', 'thumbnail', 'excerpt' ],
		// 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'    => [ 'qit_cases_technologies', 'qit_cases_tags' ],
		'has_archive'   => true,
		'rewrite'       => array( 'slug' => 'cases' ),
		'query_var'     => true,
	] );
	/**
	 * End post type cases
	 */

	/**
	 * Start post type reviews
	 */
	register_post_type( 'qit_reviews', [
		'label'               => null,
		'labels'              => [
			'name'               => 'Reviews',
			'singular_name'      => 'Review',
			'add_new'            => 'Add Review',
			'add_new_item'       => 'Adding Review',
			'edit_item'          => 'Edit Review',
			'new_item'           => 'New Review',
			'view_item'          => 'Watch Review',
			'search_items'       => 'Search Review',
			'not_found'          => 'Not found',
			'not_found_in_trash' => 'Not found',
			'parent_item_colon'  => '',
			'menu_name'          => 'Reviews',
		],
		'description'         => '',
		'show_in_menu'        => null,
		'show_in_rest'        => null,
		'rest_base'           => null,
		'menu_position'       => null,
		'menu_icon'           => null,
		'hierarchical'        => false,
		'supports'            => [ 'title', 'excerpt', 'thumbnail' ],
		// 'title','editor','author','thumbnail','','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => [ 'qit_review_tags', 'qit_review_cat' ],

		'query_var'           => false,
		'public' => false,  // it's not public, it shouldn't have it's own permalink, and so on
		'publicly_queryable' => true,  // you should be able to query it
		'show_ui' => true,  // you should be able to edit it in wp-admin
		'exclude_from_search' => true,  // you should exclude it from search results
		'show_in_nav_menus' => false,  // you shouldn't be able to add it to menus
		'has_archive' => false,  // it shouldn't have archive page
		'rewrite' => false,  // it shouldn't have rewrite rules
	] );
	/**
	 * End post type reviews
	 */

	/**
	 * Start post type technologies
	 */
	register_post_type( 'qit_technologies', [
		'label'               => null,
		'labels'              => [
			'name'               => 'Technologies',
			'singular_name'      => 'Technology',
			'add_new'            => 'Add Technology',
			'add_new_item'       => 'Adding Technology',
			'edit_item'          => 'Edit Technology',
			'new_item'           => 'New Technology',
			'view_item'          => 'Watch Technology',
			'search_items'       => 'Search Technology',
			'not_found'          => 'Not found',
			'not_found_in_trash' => 'Not found',
			'parent_item_colon'  => '',
			'menu_name'          => 'Technologies',
		],
		'description'         => '',
		'show_in_menu'        => null,
		'show_in_rest'        => null,
		'rest_base'           => null,
		'menu_position'       => null,
		'menu_icon'           => null,
		'hierarchical'        => false,
		'supports'            => [ 'title', 'excerpt', 'thumbnail' ],
		'taxonomies'          => [ 'qit_technologies_direction' ],

		'query_var'           => false,
		'public' => false,  // it's not public, it shouldn't have it's own permalink, and so on
		'publicly_queryable' => true,  // you should be able to query it
		'show_ui' => true,  // you should be able to edit it in wp-admin
		'exclude_from_search' => true,  // you should exclude it from search results
		'show_in_nav_menus' => false,  // you shouldn't be able to add it to menus
		'has_archive' => false,  // it shouldn't have archive page
		'rewrite' => false,  // it shouldn't have rewrite rules
	] );
	/**
	 * End post type technologies
	 */

	/**
	 * Start post type FAQ
	 */
	register_post_type( 'qit_FAQ', [
		'label'       => null,
		'labels'      => [
			'name'               => 'FAQ',
			'singular_name'      => 'FAQ',
			'add_new'            => 'Add FAQ',
			'add_new_item'       => 'Adding FAQ',
			'edit_item'          => 'Edit FAQ',
			'new_item'           => 'New FAQ',
			'view_item'          => 'Watch FAQ',
			'search_items'       => 'Search FAQ',
			'not_found'          => 'Not found',
			'not_found_in_trash' => 'Not found',
			'parent_item_colon'  => '',
			'menu_name'          => 'FAQ',
		],
		'description' => '',

		'show_in_menu'        => null,
		'show_in_rest'        => null,
		'rest_base'           => null,
		'menu_position'       => null,
		'menu_icon'           => null,
		'hierarchical'        => false,
		'supports'            => [ 'title', 'editor' ],
		'taxonomies'          => [],

		'query_var'           => false,
		'public' => false,  // it's not public, it shouldn't have it's own permalink, and so on
		'publicly_queryable' => true,  // you should be able to query it
		'show_ui' => true,  // you should be able to edit it in wp-admin
		'exclude_from_search' => true,  // you should exclude it from search results
		'show_in_nav_menus' => false,  // you shouldn't be able to add it to menus
		'has_archive' => false,  // it shouldn't have archive page
		'rewrite' => false,  // it shouldn't have rewrite rules
	] );
	/**
	 * End post type FAQ
	 */
	/**
	 * Start post type Blog Ads
	 */
	register_post_type( 'qit_blog_ads', [
		'label'               => null,
		'labels'              => [
			'name'               => 'Blog Ads',
			'singular_name'      => 'Blog Ad',
			'add_new'            => 'Add ads',
			'add_new_item'       => 'Adding ads',
			'edit_item'          => 'Edit ad',
			'new_item'           => 'New ad',
			'view_item'          => 'Watch ad',
			'search_items'       => 'Search ad',
			'not_found'          => 'Not found',
			'not_found_in_trash' => 'Not found',
			'parent_item_colon'  => '',
			'menu_name'          => 'Blog Ads',
		],
		'description'         => '',
		'show_in_menu'        => null,
		'show_in_rest'        => null,
		'rest_base'           => null,
		'menu_position'       => null,
		'menu_icon'           => null,
		'hierarchical'        => false,
		'supports'            => [ 'title' ],
		'taxonomies'          => [],
		'query_var'           => false,

		'public' => false,  // it's not public, it shouldn't have it's own permalink, and so on
		'publicly_queryable' => true,  // you should be able to query it
		'show_ui' => true,  // you should be able to edit it in wp-admin
		'exclude_from_search' => true,  // you should exclude it from search results
		'show_in_nav_menus' => false,  // you shouldn't be able to add it to menus
		'has_archive' => false,  // it shouldn't have archive page
		'rewrite' => false,  // it shouldn't have rewrite rules
	] );
	/**
	 * End post type Blog Ads
	 */

}