<?php
/*
 * Dedicated: Reviews
 */
defined( 'ABSPATH' ) || exit;

/**
 * Fields
 */
$field       = get_query_var( 'dedicated_team_field' );
$badge       = $field['badge'];
$title       = $field['title'];
$arrow_left  = get_template_directory_uri()
               . '/assets/userfiles/icons/arrow-left.svg';
$arrow_right = get_template_directory_uri()
               . '/assets/userfiles/icons/arrow-right.svg';

$arrow2_left  = get_template_directory_uri()
                . '/assets/userfiles/icons/arrow2left.svg';
$arrow2_right = get_template_directory_uri()
                . '/assets/userfiles/icons/arrow2right.svg';
$taxonomy     = 'qit_review_cat';
$post_type    = 'qit_reviews';
$args         = [
	'post_type' => $post_type,
	'tax_query' => [
		[
			'taxonomy' => $taxonomy,
			'field'    => 'slug',
			'terms'    => 'has-video',
			'operator' => 'IN'
		]
	]
];

$query        = new WP_Query( $args );

if ( $query->have_posts() ) :?>
    <section class="section section__reviews" id="reviews">
        <div class="container">
			<?php if ( $badge ): ?>
                <div class="section__reviews-row  row justify-content-center p-0">
                    <h6 class="section__reviews-row-badge  m-0 w-auto text-uppercase"><?= $badge ?></h6>
                </div>
			<?php endif; ?>
			<?php if ( $title ): ?>
                <div class="section__reviews-row row text-center p-0 ">
                    <h2 class="section__reviews-row-title"><?= $title ?></h2>
                </div>
			<?php endif; ?>
			<?php if ( $query->have_posts() ): ?>
                <div class="section__reviews-row row pt-0">
                    <div class="section__reviews-row-with swiper swiper-with">
                        <div class="swiper-wrapper">
							<?php while ( $query->have_posts() ) :
								$query->the_post(); ?>
								<?php get_template_part( 'template-parts/parts/reviews/reviews',
								'with' ); ?>
							<?php endwhile;
							wp_reset_postdata(); ?>
                        </div>
                        <div class="col-lg-3 d-flex justify-content-between swiper-arrows offset-lg-2 d-none">
                            <div class="swiper-button-prev"><?= file_get_contents( $arrow_left ) ?></div>
                            <div class="swiper-button-next"><?= file_get_contents( $arrow_right ) ?></div>
                        </div>
                    </div>
					<?php while ( $query->have_posts() ) :
						$query->the_post();
						get_template_part( 'template-parts/parts/modals/modal',
							'review' ); ?>
					<?php endwhile; ?>
                </div>
			<?php endif; ?>
            <div class="section__reviews-row row justify-content-center">
                <div class="col-12 col-md-6 text-center">
                    <button class="btn button globalModalQuote"><?= __( 'GET A QUOTE FOR YOUR PROJECT',
							'qit' ) ?></button>
                </div>
            </div>
			<?php /**?>
                <?php if ( $query2->have_posts() ): ?>
			    <div class="section__reviews-row row">
			    <div class="section__reviews-row-without swiper swiper-without">
			    <div class="swiper-wrapper">
                <?php
			    while ( $query2->have_posts() ) :$query2->the_post(); ?>
			    <?php get_template_part( 'template-parts/parts/reviews/reviews', 'without' ); ?>
			    <?php endwhile; wp_reset_postdata(); ?>
			    </div>
			    <div class="swiper-button-next"><?= file_get_contents( $arrow2_right ) ?></div>
			    <div class="swiper-button-prev"><?= file_get_contents( $arrow2_left ) ?></div>
                </div>
			    </div>
			    <?php endif; ?>
			    <?**/
			?>
        </div>
    </section>
<?php endif; ?>