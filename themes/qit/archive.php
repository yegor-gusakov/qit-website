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

    <section id="primary" class="section section__blog">
        <div class="container">
            <div class="section__blog-row row">
                <div class="section__blog-row row justify-content-center">
                    <h6 class="section__blog-row-badge m-0 w-auto text-white text-uppercase"><?= __( 'news',
							'qit' ) ?></h6>
                </div>
            </div>
            <div class="section__blog-row row text-center">
                <h2 class="section__blog-row-title"><?= __( 'Insights',
						'qit' ) ?></h2>
            </div>
            <div class="section__blog-row row">
                <ul class="section__blog-nav nav nav-tabs border-0"
                    id="postTags" role="tablist">
                    <li class="section__blog-nav-item nav-item"
                        role="presentation">
                        <a href="<?= get_permalink( get_option( 'page_for_posts' ) )
						             . '#primary' ?>"
                           class="nav-link"><?= __( 'All',
								'qit' ) ?></a>
                    </li>
					<?php
					foreach ( $categories as $key => $category ):
//                        print_r($category->name);
						$page_id = get_queried_object_id();
						?>
                        <li class="section__blog-nav-item nav-item "
                            role="presentation">
                            <a href="<?= get_category_link( $category->term_id )
							             . '#primary' ?>" class="nav-link <?= ( $page_id
                                                                                == $category->term_id )
	                            ? 'active' : '' ?>"><?= $category->name ?></a>
                        </li>
					<?php

					endforeach;

					?>
                </ul>


					<?php

					$args = array(
						'cat' => $page_id,
					);

					$query = new WP_Query( $args );

					if ( $query->have_posts() ) :
						$next_arrow
							= get_stylesheet_directory()
							  . '/assets/userfiles/icons/arrow-right.svg';
						$prev_arrow
						   = get_stylesheet_directory()
						     . '/assets/userfiles/icons/arrow-left.svg';

						while ( $query->have_posts() ) : $query->the_post();
							get_template_part( 'template-parts/content',
								get_post_type(),
								array( 'id' => $category->term_id ) );
						endwhile;
						$args = [
//						'base'         => '%_%',
//						'format'       => '?page=%#%',
//						'total'        => 10,
//						'current'      => 0,
							'show_all'  => false,
							'end_size'  => 1,
							'mid_size'  => 4,
							'prev_next' => true,
							'prev_text' => file_get_contents( $prev_arrow ),
							'next_text' => file_get_contents( $next_arrow ),
//						'type'         => 'plain',
//						'add_args'     => False,
//						'add_fragment' => '',
//						'before_page_number' => '',
//						'after_page_number'  => ''
						];

						?>
                        <div class="col-12"></div>
                        <div class="col-lg-3 section__blog-row__pagination">
                            <nav class="pagination">
								<?php echo paginate_links( $args ) ?>
                            </nav>
                        </div>
					<?php
					else :

						get_template_part( 'template-parts/content',
							'none' );

					endif;

					wp_reset_postdata();

					?>
                </div>

        </div>

    </section><!-- #main -->

<?php
get_footer();
