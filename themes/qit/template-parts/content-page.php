<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link    https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package qit
 */
global $wp_embed;

$content = $wp_embed->run_shortcode( get_field( 'content', false, false ) );

?>
<article class="post post-<?php the_ID(); ?>" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <section class="section section__heading">
        <div class="container">
            <div class="section__heading-row row">
                <div class="col-lg-10 col-sm-12 col-12">
					<?php if ( get_the_title() ): ?>
                        <div class="section__heading-row-title">
                            <h1><?php the_title() ?></h1>
                        </div>
					<?php endif ?>
                    <div class="section__heading-row-text">
                        <p><?= __( 'Last updated ', 'qit' )
						       . get_the_modified_date( 'M, Y' ) ?></p></div>
                </div>
				<?php if ( get_the_content() ): ?>
                    <div class="col-12 col-hr">
                        <hr>
                    </div>
				<?php endif; ?>
            </div>
        </div>
    </section>
	<?php if ( get_the_content() ): ?>

        <section class="section section__page section__page">
            <div class="container">
                <div class="section__content-row row">
                    <div class="col-12">
						<?php
						the_content();
						wp_link_pages(
							array(
								'before' => '<div class="page-links">'
								            . esc_html__( 'Pages:', 'qit' ),
								'after'  => '</div>',
							)
						);
						?>
                    </div>
                </div>
            </div>

        </section>
	<?php endif; ?>

</article>
