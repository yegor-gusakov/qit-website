<?php
/**
 * Template part for displaying results in search pages
 *
 * @link    https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package qit
 */

?>
<section class="section section__post" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="container">
        <div class="section__post-row row">
            <header class="entry-header">
				<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">',
					esc_url( get_permalink() ) ), '</a></h2>' ); ?>

				<?php if ( 'post' === get_post_type() ) : ?>
                    <div class="entry-meta">
						<?php
						qit_posted_on();
						qit_posted_by();
						?>
                    </div><!-- .entry-meta -->
				<?php endif; ?>
            </header><!-- .entry-header -->
            <div class="entry-summary">
				<?php the_excerpt(); ?>
            </div><!-- .entry-summary -->
        </div>
    </div>
</section>
