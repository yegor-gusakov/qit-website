<?php
/**
 * Template part for displaying posts on BlogPage
 *
 * @link    https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package qit
 */

$tags = wp_get_post_terms( get_the_id(), array( 'qit_posts_tags' ) );

?>
<div class="col-lg-4 col-sm-6 col-12 col-post">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <a href="<?php the_permalink() ?>">
            <div class="card justify-content-between border-0">
                <div class="card-img ">

                    <img src="<?= get_the_post_thumbnail_url() ?>"
                         class="card-img-top "
                         alt="<?= get_the_title() ?>">
                    <span class="date"><?= get_the_date( 'M j, Y' ); ?></span>
                </div>

                <div class="card-body">
                    <h4 class="card-title"><?= the_title() ?></h4>
                    <div class="card-body__footer">
                        <div class="tags">
							<?php
							foreach ( $tags as $tag ):
								?>
                                <span class="tag"><?= $tag->name ?></span>

							<?php
							endforeach;
							?>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </article>

</div>