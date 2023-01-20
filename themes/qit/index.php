<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link    https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package qit
 */
?>

<?php
get_header();
?>

<?php

$sections = get_field( 'content', get_option( 'page_for_posts' ) );
if ( $sections ) :
	foreach ( $sections as $section ) :

		// TODO Old Version WP
		set_query_var( 'blog_field', $section );
		get_template_part(
			'template-parts/pages/blog/_blog',
			$section['acf_fc_layout']
		);

	endforeach;
endif;
$categories = get_categories();

?>

    <section id="posts" class="section section__blog">
        <div class="container">
            <div class="section__blog-row row justify-content-center">
                <h6 class="section__blog-row-badge m-0 w-auto text-white text-uppercase">
					<?= __( 'articles',
						'qit' ) ?>                </h6>
            </div>
            <div class="section__blog-row row text-center">
                <h2 class="section__blog-row-title"><?= __( 'Insights',
						'qit' ) ?></h2>
            </div>

            <div class="section__blog-row row">

				<?php echo do_shortcode('[ajax_filter_posts per_page="12"]'); ?>

            </div>

        </div>

    </section><!-- #main -->

<?php
get_footer();
