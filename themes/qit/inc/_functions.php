<?php
/**
 * QIT functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link       https://codex.wordpress.org/Theme_Development
 * @link       https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 * @package    WordPress
 * @subpackage QIT
 * @since      QIT 1.0
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since QIT 1.0
 */
if ( ! isset( $content_width ) ) {
	$content_width = 660;
}


if ( ! function_exists( 'qit_setup' ) ) :

	function qit_setup() {

		/*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on qit, use a find and replace
         * to change 'qit' to the name of your theme in all the template files
         */
		load_theme_textdomain( 'qit', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
		add_theme_support( 'title-tag' );

		/*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * See: https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
         */
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 825, 510, false );


		/*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption'
		) );

		/*
         * Enable support for Post Formats.
         *
         * See: https://codex.wordpress.org/Post_Formats
         */
		add_theme_support( 'post-formats', array(
			'aside',
			'image',
			'video',
			'quote',
			'link',
			'gallery',
			'status',
			'audio',
			'chat'
		) );

		add_theme_support( 'custom-header',
			apply_filters( 'qit_custom_header_args', array(
				'width'  => 954,
				'height' => 1300,
			) ) );


		$gallery_thumbnail = get_gallery_thumbnail_size();
		add_image_size( 'team_thumbnail', 141, 154, true );
		add_image_size( 'gallery_thumbnail', $gallery_thumbnail['width'],
			$gallery_thumbnail['height'], true );
	}
endif; // qit_setup
add_action( 'after_setup_theme', 'qit_setup' );

function get_gallery_thumbnail_size() {
	return array(
		'width'  => 871,
		'height' => 565
	);
}


function qit_init() {
	qit_post_types_and_tax();
	register_my_widgets();

	if ( class_exists( 'MultiPostThumbnails' ) ) {
		new MultiPostThumbnails(
			array(
				'label'     => 'List thumbnail',
				'id'        => 'list-thumbnail',
				'post_type' => 'team'
			)
		);

		$post_id = 0;
		if ( isset( $_GET['post'] ) ) {
			$post_id = absint( $_GET['post'] );
		}

	}
}

add_action( 'init', 'qit_init' );

/**
 * Customize
 */


add_action( 'wp_print_styles', 'qit_deregister_styles', 100 );
function qit_deregister_styles() {
	wp_deregister_style( 'wp-emoji-release' );
}

function cc_mime_types( $mimes ) {
	$mimes['svg'] = 'image/svg+xml';

	return $mimes;
}

add_filter( 'upload_mimes', 'cc_mime_types' );
define( 'ALLOW_UNFILTERED_UPLOADS', true );


/**
 * Menu Links
 */
function _namespace_menu_item_class( $classes, $item ) {
	$classes[] = "nav-item ";

	return $classes;
}

add_filter( 'nav_menu_css_class', '_namespace_menu_item_class', 10, 2 );
function _namespace_modify_menuclass( $ulclass ) {
	return preg_replace( '/<a /', '<a class="nav-link"', $ulclass );
}

add_filter( 'wp_nav_menu', '_namespace_modify_menuclass' );

function submenu_class( $menu ) {

	$menu = preg_replace( '/ class="sub-menu"/',
		'/ class="sub-menu dropdown-menu border-0 " /', $menu );

	return $menu;

}

add_filter( 'wp_nav_menu', 'submenu_class' );

add_filter( 'wp_nav_menu_items', 'add_button_last_item_menu', 10, 2 );
function add_button_last_item_menu( $items, $args ) {
	if ( $args->theme_location == 'main_menu'
	     || $args->theme_location == 'main_mobile_menu'
	) {
		$items .= '<li><button class="btn mx-auto button d-block d-lg-none globalModalQuote"
                        type="button">'
		          . __( 'contact us' ) . '</button></li>';
	}

	return $items;
}

function my_wpcf7_form_elements( $html ) {
	$text = 'How did you hear about us?';
	$html = str_replace( '<option value="">---</option>',
		'<option value=""  disabled="disabled" selected="selected">' . $text
		. '</option>', $html );

	return $html;
}

add_filter( 'wpcf7_form_elements', 'my_wpcf7_form_elements' );

/**
 * Related posts
 */
function rekki_related_posts() {
	$args      = array(
		'posts_per_page' => 6,
		'post_in'        => get_the_tag_list(),
		'post__not_in'   => [ get_the_ID() ]
	);
	$the_query = new WP_Query( $args );
	while ( $the_query->have_posts() ) : $the_query->the_post();

		get_template_part( 'template-parts/content' );

	endwhile;
	echo '';
	wp_reset_postdata();
}

/**
 * Social sharing buttons
 */
// Function to handle the thumbnail request
function get_the_post_thumbnail_src( $img ) {
	return ( preg_match( '~\bsrc="([^"]++)"~', $img, $matches ) ) ? $matches[1]
		: '';
}

function wpvkp_social_buttons( $content ) {
	global $post;
	if ( is_singular() || is_home() ) {

		// Get current page URL
		$sb_url = urlencode( get_permalink() );

		// Get current page title
		$sb_title = str_replace( ' ', '%20', get_the_title() );

		// Get Post Thumbnail for pinterest
		$sb_thumb = get_the_post_thumbnail_src( get_the_post_thumbnail() );


		/**
		 * Social urls
		 **/

		$twitterURL  = 'https://twitter.com/intent/tweet?text=' . $sb_title
		               . '&amp;url=' . $sb_url . '&amp;via=wpvkp';
		$facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='
		               . $sb_url;
		$linkedInURL = 'https://www.linkedin.com/shareArticle?mini=true&url='
		               . $sb_url . '&amp;title=' . $sb_title;
		/**
		 * Social Icons
		 */
		$twitterIcon  = get_stylesheet_directory()
		                . '/assets/userfiles/icons-share/twitter.svg';
		$facebookIcon = get_stylesheet_directory()
		                . '/assets/userfiles/icons-share/facebook.svg';
		$linkedInIcon = get_stylesheet_directory()
		                . '/assets/userfiles/icons-share/linkedin.svg';

		// Add sharing button at the end of page/page content
		$content .= '<div class="social-box align-items-md-center justify-content-center justify-content-sm-start">';
		$content .= '<a class="col-2 sbtn s-linkedin" href="' . $linkedInURL
		            . '" target="_blank" rel="nofollow">'
		            . file_get_contents( $linkedInIcon ) . '</a>';


		$content .= '<a class="col-1 sbtn s-twitter" href="' . $twitterURL
		            . '" target="_blank" rel="nofollow">'
		            . file_get_contents( $twitterIcon ) . '</a>';
		$content .= '<a class="col-1 sbtn s-facebook" href="' . $facebookURL
		            . '" target="_blank" rel="nofollow">'
		            . file_get_contents( $facebookIcon ) . '</a>';

		$content .= '</div>';

		return $content;
	} else {
		// if not a post/page then don't include sharing button
		return $content;
	}
}

add_shortcode( 'rekki_socials', 'wpvkp_social_buttons' );


/**
 * LoadMoreCases and filters
 **/
add_action( 'wp_ajax_loadmorebutton', 'qit_loadmore_ajax_handler' );
add_action( 'wp_ajax_nopriv_loadmorebutton', 'qit_loadmore_ajax_handler' );
function qit_loadmore_ajax_handler() {

	// prepare our arguments for the query
	$params                   = json_decode( stripslashes( $_POST['query'] ),
		true ); // query_posts() takes care of the necessary sanitization
	$params['paged']          = $_POST['page']
	                            + 1; // we need next page to be loaded
	$params['post_status']    = 'publish';
	$params['post_type']      = 'qit_cases';
	$params['posts_per_page'] = 6;
	$params['orderby']        = 'date';
	$params['order']          = 'DESC';

	if ( ! empty( $_POST['Platforms-filter'] ) ) {
		$platform = $_POST['Platforms-filter'];
	}

	if ( ! empty( $_POST['Expertise-filter'] ) ) {
		$expertise = $_POST['Expertise-filter'];
	}
	if ( ! empty( $_POST['Services-filter'] ) ) {
		$service = $_POST['Services-filter'];
	}
// if $state variable is selected.
	$taxquery = array(
		'relation' => 'AND',
	);

	if ( ! empty( $platform ) || isset( $platform ) ) :
		array_push( $taxquery, array(
			'taxonomy' => 'qit_cases_platforms',
			'field'    => 'id',
			'terms'    => $platform,
			'orderby'  => 'menu_order',
			'order'    => 'DESC',
		) );
	endif;

// if $suburbs variable is selected.
	if ( ! empty( $expertise ) || isset( $expertise ) ) :
		array_push( $taxquery, array(
			'taxonomy' => 'qit_cases_expertise',
			'field'    => 'id',
			'terms'    => $expertise,
			'orderby'  => 'menu_order',
			'order'    => 'DESC',
		) );

	endif;
	if ( ! empty( $service ) || isset( $service ) ) :
		array_push( $taxquery, array(
			'taxonomy' => 'qit_cases_services',
			'field'    => 'id',
			'terms'    => $service,
			'orderby'  => 'menu_order',
			'order'    => 'DESC',
		) );

	endif;
	if ( ! empty( $taxquery ) ) {
		$params['tax_query'] = $taxquery;
	}
// for taxonomies / categories

	query_posts( $params );
	if ( have_posts() ) :
		while ( have_posts() ): the_post();
			get_template_part( 'template-parts/parts/cases/cases' );

		endwhile;
	endif;
	die;
}

add_action( 'wp_ajax_cases_filter', 'qit_filter_function' );
add_action( 'wp_ajax_nopriv_cases_filter', 'qit_filter_function' );
function qit_filter_function() {

	// example: date-ASC
	$order  = explode( '-', $_POST['qit_order_by'] );
	$params = array(
		'post_type'      => 'qit_cases',
		'paged'          => $_POST['page'] + 1,
		// we need next page to be loaded
		'posts_per_page' => 6,
		'post_status'    => 'publish',
		// when set to -1, it shows all posts
		'orderby'        => 'date',
		'order'          => 'DESC',
	);

	if ( ! empty( $_POST['Platforms-filter'] ) ) {
		$platform = $_POST['Platforms-filter'];
	}

	if ( ! empty( $_POST['Expertise-filter'] ) ) {
		$expertise = $_POST['Expertise-filter'];
	}
	if ( ! empty( $_POST['Services-filter'] ) ) {
		$service = $_POST['Services-filter'];
	}
// if $state variable is selected.
	$taxquery = array(
		'relation' => 'AND',
	);

	if ( ! empty( $platform ) || isset( $platform ) ) :
		array_push( $taxquery, array(
			'taxonomy' => 'qit_cases_platforms',
			'field'    => 'id',
			'terms'    => $platform,
			'orderby'  => 'menu_order',
			'order'    => 'DESC',
		) );
	endif;

// if $suburbs variable is selected.
	if ( ! empty( $expertise ) || isset( $expertise ) ) :
		array_push( $taxquery, array(
			'taxonomy' => 'qit_cases_expertise',
			'field'    => 'id',
			'terms'    => $expertise,
			'orderby'  => 'menu_order',
			'order'    => 'DESC',
		) );

	endif;
	if ( ! empty( $service ) || isset( $service ) ) :
		array_push( $taxquery, array(
			'taxonomy' => 'qit_cases_services',
			'field'    => 'id',
			'terms'    => $service,
			'orderby'  => 'menu_order',
			'order'    => 'DESC',
		) );

	endif;
	if ( ! empty( $taxquery ) ) {
		$params['tax_query'] = $taxquery;
	}
// for taxonomies / categories
	global $wp_query;

	$query = new WP_Query( $params );

	if ( $query->have_posts() ) :
		ob_start(); // start buffering because we do not need to print the posts now

		// run the loop
		while ( $query->have_posts() ):$query->the_post();
			get_template_part( 'template-parts/parts/cases/cases' );
		endwhile;

		$posts_html = ob_get_contents(); // we pass the posts to variable
		ob_end_clean(); // clear the buffer
	else:
		ob_start(); // start buffering because we do not need to print the posts now

		get_template_part( 'template-parts/parts/not-found/not-found',
			'cases' );
		$posts_html = ob_get_contents(); // we pass the posts to variable

		ob_end_clean(); // clear the buffer

	endif;


	echo json_encode( array(
		'posts'       => json_encode( $wp_query->query_vars ),
		'max_page'    => $wp_query->max_num_pages,
		'found_posts' => $wp_query->found_posts,
		'content'     => $posts_html
	) );

	die();
}

/**
 * LoadMorePositions and filters
 **/
add_action( 'wp_ajax_loadmorebuttonpositions',
	'qit_loadmore_position_ajax_handler' );
add_action( 'wp_ajax_nopriv_loadmorebuttonpositions',
	'qit_loadmore_position_ajax_handler' );
function qit_loadmore_position_ajax_handler() {

	// prepare our arguments for the query
	$params                = json_decode( stripslashes( $_POST['query'] ),
		true ); // query_posts() takes care of the necessary sanitization
	$params['paged']       = $_POST['page']
	                         + 1; // we need next page to be loaded
	$params['post_status'] = 'publish';
	$params['post_type']   = 'qit_open_position';

	$params['posts_per_page'] = 6;
	$params['orderby']        = 'date';
	$params['order']          = 'DESC';


	if ( ! empty( $_POST['Categories-filter'] ) ) {
		$categories = $_POST['Categories-filter'];
	}

	if ( ! empty( $_POST['Levels-filter'] ) ) {
		$levels = $_POST['Levels-filter'];
	}


// if $state variable is selected.
	$taxquery = array(
		'relation' => 'AND',
	);

	if ( ! empty( $categories ) || isset( $categories ) ) :
		array_push( $taxquery, array(
			'taxonomy' => 'qit_open_position_categories',
			'field'    => 'id',
			'terms'    => $categories,
			'orderby'  => 'menu_order',
			'order'    => 'DESC',
		) );
	endif;

// if $suburbs variable is selected.
	if ( ! empty( $levels ) || isset( $levels ) ) :
		array_push( $taxquery, array(
			'taxonomy' => 'qit_open_position_levels',
			'field'    => 'id',
			'terms'    => $levels,
			'orderby'  => 'menu_order',
			'order'    => 'DESC',
		) );

	endif;

	if ( ! empty( $taxquery ) ) {
		$params['tax_query'] = $taxquery;
	}
// for taxonomies / categories

	query_posts( $params );
	if ( have_posts() ) :
		while ( have_posts() ): the_post();
			get_template_part( 'template-parts/parts/open-positions/position' );

		endwhile;
	endif;
	die;
}

add_action( 'wp_ajax_position_filter', 'qit_filter_positions_function' );
add_action( 'wp_ajax_nopriv_position_filter', 'qit_filter_positions_function' );
function qit_filter_positions_function() {

	// example: date-ASC
	$order  = explode( '-', $_POST['qit_order_by'] );
	$params = array(
		'post_type'      => 'qit_open_position',
		'paged'          => $_POST['page'] + 1,
		// we need next page to be loaded
		'posts_per_page' => 6,
		'post_status'    => 'publish',
		// when set to -1, it shows all posts
		'orderby'        => 'date',
		'order'          => 'DESC',
	);

	if ( ! empty( $_POST['Categories-filter'] ) ) {
		$categories = $_POST['Categories-filter'];
	}

	if ( ! empty( $_POST['Levels-filter'] ) ) {
		$level = $_POST['Levels-filter'];
	}

// if $state variable is selected.
	$taxquery = array(
		'relation' => 'AND',
	);

	if ( ! empty( $categories ) || isset( $categories ) ) :
		array_push( $taxquery, array(
			'taxonomy' => 'qit_open_position_categories',
			'field'    => 'id',
			'terms'    => $categories,
			'orderby'  => 'menu_order',
			'order'    => 'DESC',
		) );
	endif;

// if $suburbs variable is selected.
	if ( ! empty( $level ) || isset( $level ) ) :
		array_push( $taxquery, array(
			'taxonomy' => 'qit_open_position_levels',
			'field'    => 'id',
			'terms'    => $level,
			'orderby'  => 'menu_order',
			'order'    => 'DESC',
		) );

	endif;

	if ( ! empty( $taxquery ) ) {
		$params['tax_query'] = $taxquery;
	}
// for taxonomies / categories
	global $wp_query;

	$query = new WP_Query( $params );

	if ( $query->have_posts() ) :
		ob_start(); // start buffering because we do not need to print the posts now

		// run the loop
		while ( $query->have_posts() ):$query->the_post();
			get_template_part( 'template-parts/parts/open-positions/position' );
		endwhile;

		$posts_html = ob_get_contents(); // we pass the posts to variable
		ob_end_clean(); // clear the buffer
	else:
		ob_start(); // start buffering because we do not need to print the posts now

		get_template_part( 'template-parts/parts/not-found/not-found',
			'positions' );
		$posts_html = ob_get_contents(); // we pass the posts to variable

		ob_end_clean(); // clear the buffer

	endif;


	echo json_encode( array(
		'posts'       => json_encode( $wp_query->query_vars ),
		'max_page'    => $wp_query->max_num_pages,
		'found_posts' => $wp_query->found_posts,
		'content'     => $posts_html
	) );

	die();
}


/**
 * Table of content
 **/
function insert_table_of_contents( $content ) {

	// used to determine the location of the
	// table of contents when $fixed_location is set to false
	$html_comment = "<!--insert-toc-->";
	// checks if $html_comment exists in $content
	$comment_found = strpos( $content, $html_comment ) ? true : false;
	// set to true to insert the table of contents in a fixed location
	// set to false to replace $html_comment with $table_of_contents
	$fixed_location = true;

	// return the $content if
	// $comment_found and $fixed_location are false
	if ( ! $fixed_location && ! $comment_found ) {
		return $content;
	}

	// exclude the table of contents from all pages
	// other exclusion options include:
	// in_category($id)
	// has_term($term_name)
	// is_single($array)
	// is_author($id)
	if ( is_page() & ! is_page_template( 'templates/sidebar.php' ) ) {
		return $content;
	}

	// regex to match all HTML heading elements 2-6
	$regex = "~(<h([2-6]))(.*?>(.*)<\/h[2-6]>)~";

	// preg_match_all() searches the $content using $regex patterns and
	// returns the results to $heading_results[]
	//
	// $heading_results[0][] contains all matches in full
	// $heading_results[1][] contains '<h2-6'
	// $heading_results[2][] contains '2-6'
	// $heading_results[3][] contains '>heading title</h2-6>
	// $heading_results[4][] contains the title text
	preg_match_all( $regex, $content, $heading_results );
	// return $content if less than 3 heading exist in the $content
	$num_match = count( $heading_results[0] );
	if ( $num_match < 1 ) {
		return $content;
	}

	// declare local variable
	$link_list = "";
	// loop through $heading_results

	$start_col = '<div class="col-lg-3 col-md-4 sticky-md-top col-navigation">';

	$end_col = '</div>';
	// opening nav tag
	$start_nav = "<nav class='table-of-content' id='table-of-content'>";
	// closing nav tag
	$end_nav = "</nav>";
	// title
	$title = "<h2>Table of Contents</h2>";

	// wrap links in '<ul>' element
	$link_list = "<ul>" . $link_list . "</ul>";

	// piece together the table of contents
	$table_of_contents = $start_col . $start_nav . $link_list
	                     . $end_nav . $end_col;
	$content_wrapper   = '<div class="'
	                     . ( is_page_template( 'templates/sidebar.php' )
			? 'col-lg-9 col-md-6' : 'col-lg-8 col-md-6' ) . ' col-content" >'
	                     . $content . '</div>';
	// if $fixed_location is true and
	// $comment_found is false
	// insert the table of contents at a fixed location
	if ( $fixed_location && ! $comment_found ) {
		// location of first paragraph
		$first_paragraph = strpos( $content, '</p>', 0 ) + 4;
		// location of second paragraph
		$second_paragraph = strpos( $content, '</p>', $first_paragraph );

		// insert $table_of_contents after $second_paragraph
		return substr_replace( $content_wrapper, $table_of_contents,
			0, 0 );
	}
	// if $fixed_location is false and
	// $comment_found is true
	else {
		// replace $html_comment with the $table_of_contents
		return str_replace( $html_comment, $table_of_contents, $content );
	}
}

add_filter( 'the_content', 'insert_table_of_contents');
function excerpt( $limit ) {
	$excerpt = explode( ' ', get_the_excerpt(), $limit );
	if ( count( $excerpt ) >= $limit ) {
		array_pop( $excerpt );
		$excerpt = implode( " ", $excerpt ) . '...';
	} else {
		$excerpt = implode( " ", $excerpt );
	}
	$excerpt = preg_replace( '`[[^]]*]`', '', $excerpt );

	return $excerpt;
}

function content( $limit ) {
	$content = explode( ' ', get_the_content(), $limit );
	if ( count( $content ) >= $limit ) {
		array_pop( $content );
		$content = implode( " ", $content ) . '...';
	} else {
		$content = implode( " ", $content );
	}
	$content = preg_replace( '/[.+]/', '', $content );
	$content = apply_filters( 'the_content', $content );
	$content = str_replace( ']]>', ']]&gt;', $content );

	return $content;
}


add_shortcode( 'global_modal_shortcode', 'global_modal_shortcode' );
function global_modal_shortcode() {
	ob_start();
	get_template_part( 'template-parts/parts/modals/modal-quote2' );
	$var = ob_get_contents();
	ob_end_clean();

	return $var;

}

/**
 * Remove autocomplete urls redirect
 */
remove_filter( 'template_redirect', 'redirect_canonical' );

function redirect_to_home() {
	if ( ! is_admin() && is_home() ) {
		wp_redirect( home_url() );
		exit();
	}
}

//add_action('template_redirect', 'redirect_to_home');


// Remove unwanted SVG filter injection WP
remove_action( 'wp_enqueue_scripts', 'wp_enqueue_global_styles' );
remove_action( 'wp_body_open', 'wp_global_styles_render_svg_filters' );


//--- blog pagination and filtration
/**
 * AJAC filter posts by taxonomy term
 */
function vb_filter_posts() {

	if ( ! isset( $_POST['nonce'] ) ) {

	}

	/**
	 * Default response
	 */
	$response = [
		'status'  => 500,
		'message' => 'Something is wrong, please try again later ...',
		'content' => false,
		'found'   => 0
	];

	$tax  = sanitize_text_field( $_POST['params']['tax'] );
	$term = sanitize_text_field( $_POST['params']['term'] );
	$page = intval( $_POST['params']['page'] );
	$qty  = intval( $_POST['params']['qty'] );


	if ( $term == 'all-terms' ) :

		$tax_qry[] = [
			'taxonomy' => $tax,
			'field'    => 'slug',
			'terms'    => $term,
			'operator' => 'NOT IN'
		];

	else :

		$tax_qry[] = [
			'taxonomy' => $tax,
			'field'    => 'slug',
			'terms'    => $term,
		];

	endif;

	/**
	 * Setup query
	 */
	$args = [
		'paged'          => $page,
		'post_type'      => 'post',
		'post_status'    => 'publish',
		'posts_per_page' => $qty,
		'tax_query'      => $tax_qry
	];

	$qry = new WP_Query( $args );

	ob_start();
	if ( $qry->have_posts() ) :
		while ( $qry->have_posts() ) : $qry->the_post();
			get_template_part( 'template-parts/content',
				get_post_type() ); endwhile;

		/**
		 * Pagination
		 */
		vb_ajax_pager( $qry, $page );

		$response = [
			'status' => 200,
			'found'  => $qry->found_posts
		];


	else :

		$response = [
			'status'  => 201,
			'message' => 'No posts found'
		];

	endif;

	$response['content'] = ob_get_clean();

	die( json_encode( $response ) );

}

add_action( 'wp_ajax_do_filter_posts', 'vb_filter_posts' );
add_action( 'wp_ajax_nopriv_do_filter_posts', 'vb_filter_posts' );


/**
 * Shortocde for displaying terms filter and results on page
 */
function vb_filter_posts_sc( $atts ) {

	$a = shortcode_atts( array(
		'tax'      => 'category',
		// Taxonomy
		'terms'    => false,
		// Get specific taxonomy terms only
		'active'   => false,
		// Set active term by ID
		'per_page' => 12,
		// How many posts per page,
		'pager'    => 'pager'
		// 'pager' to use numbered pagination || 'infscr' to use infinite scroll
	), $atts );

	$result = null;
	$terms  = get_terms( $a['tax'] );

	if ( count( $terms ) ) :
		ob_start();
		?>
        <div id="container-async" data-paged="<?php echo $a['per_page']; ?>"
             class="sc-ajax-filter">
            <ul class="section__blog-nav nav nav-tabs border-0 nav-filter"
                id="postTags" role="tablist">
                <li class="section__blog-nav-item nav-item active"
                    role="presentation">
                    <a href="javascript:void(0)"
                       data-filter="category"
                       data-term="all-terms" data-page="1"
                       class="nav-link ">
						<?= __( 'All', 'qit' ) ?>
                    </a>
                </li>
				<?php foreach ( $terms as $term ) :
					?>
                    <li class="section__blog-nav-item nav-item "
                        role="presentation">
                        <a href="<?php echo get_term_link( $term,
							$term->taxonomy ); ?>" class="nav-link"
                           data-filter="<?php echo $term->taxonomy; ?>"
                           data-term="<?php echo $term->slug; ?>" data-page="1">
							<?php echo $term->name; ?>
                        </a>
                    </li>
				<?php endforeach; ?>
            </ul>

            <div class="content row">
				<?php
				// the query
				$the_query = new WP_Query( array(
					'posts_per_page' => 12,
				) );
				?>

				<?php if ( $the_query->have_posts() ) : ?>
					<?php while ( $the_query->have_posts() ) : $the_query->the_post();

						get_template_part( 'template-parts/content',
							get_post_type() );
					endwhile;
					wp_reset_postdata(); ?>

				<?php endif; ?>
				<?php vb_ajax_pager( $the_query, '1' ); ?>

            </div>
        </div>

		<?php $result = ob_get_clean();
	endif;

	return $result;
}

add_shortcode( 'ajax_filter_posts', 'vb_filter_posts_sc' );


/**
 * Pagination
 */
function vb_ajax_pager( $query = null, $paged = 1 ) {

	if ( ! $query ) {
		return;
	}
	$next_arrow
		= get_stylesheet_directory()
		  . '/assets/userfiles/icons/arrow-right.svg';
	$prev_arrow
		= get_stylesheet_directory()
		  . '/assets/userfiles/icons/arrow-left.svg';

	$paginate = paginate_links( [
		'base'    => '%_%',
		'type'    => 'array',
		'total'   => $query->max_num_pages,
		'format'  => '#page=%#%',
		'current' => max( 1, $paged ),

		'show_all'  => false,
		'end_size'  => 1,
		'mid_size'  => 4,
		'prev_next' => true,
		'prev_text' => file_get_contents( $prev_arrow ),
		'next_text' => file_get_contents( $next_arrow ),
	] );

	if ( $query->max_num_pages > 1 ) : ?>
        <div class="col-lg-12 section__blog-row__pagination">
            <nav class="pagination">
				<?php foreach ( $paginate as $page ) : ?>
                    <li><?php echo $page; ?></li>
				<?php endforeach; ?>
            </nav>
        </div>
	<?php endif;
}

register_taxonomy_for_object_type( 'qit_posts_tags', 'post' );


add_action( 'template_redirect', 'redirect_cpt_singular_posts' );
function redirect_cpt_singular_posts() {
	if ( is_singular( [
			'qit_reviews',
			'qit_technologies',
			'qit_FAQ',
			'qit_blog_ads'
		] )
	     || is_page( [ 'vacancy', 'vacancy/^[1-9][0-9]?$|^100$' ] )
	) {
		global $wp_query;
		$wp_query->set_404();
		status_header( 410 );
		get_template_part( 404 );
		exit();
	}
}