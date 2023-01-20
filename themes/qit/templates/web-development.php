<?php /* Template Name: WebDevelopment */ ?>

<?php
defined( 'ABSPATH' ) || exit;
get_header();

while ( have_posts() ) : // Start of the loop.

	the_post();

	/**
	 * Sections
	 */
	$sections = get_field( 'content', get_the_ID() );

	if( $sections ) :
		foreach ( $sections as $section ) :

			// TODO Old Version WP
			set_query_var( 'web_development_field', $section );
			get_template_part(
				'template-parts/pages/web-development/_web-development',
				$section['acf_fc_layout']
			);

		endforeach;
	endif;

endwhile; // End of the loop.

get_footer();
