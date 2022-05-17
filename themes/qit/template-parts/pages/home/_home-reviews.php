<?php
/*
 * Home: Reviews
 */
defined( 'ABSPATH' ) || exit;

/**
 * Fields
 */
$field = get_query_var( 'home_field' );
$badge = $field['badge'];
$title = $field['title'];


$arrow_left  = get_stylesheet_directory()
               . '/assets/userfiles/icons/arrow-left.svg';
$arrow_right = get_stylesheet_directory()
               . '/assets/userfiles/icons/arrow-right.svg';
$taxonomy    = 'qit_review_cat';
$post_type   = 'qit_reviews';
$args        = [
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
$args2       = [
	'post_type' => $post_type,
	'tax_query' => [
		[
			'taxonomy' => $taxonomy,
			'field'    => 'slug',
			'terms'    => 'has-video',
			'operator' => 'NOT IN'
		]
	]
];
$query       = new WP_Query( $args );
$query2      = new WP_Query( $args2 );

// Цикл
if ( $query->have_posts() || $query2->have_posts() ) :
	?>
    <section class="section section__reviews">
        <div class="container">
            <div class="section__reviews-row row justify-content-center p-0">
                <h6 class="section__reviews-row-badge  w-auto text-white text-uppercase"><?= $badge ?></h6>
            </div>
            <div class="section__reviews-row row text-center p-0">
                <h2 class="section__reviews-row-title"><?= $title ?></h2>
            </div>


			<?php if ( $query->have_posts() ): ?>
                <!-- Trigger the modal with a button -->
                <div class="section__reviews-row row">

                    <div class="section__reviews-row-with swiper swiper-with">
                        <div class="swiper-wrapper">
							<?php

							while ( $query->have_posts() ) :
								$query->the_post();

								?>

								<?php
								get_template_part( 'template-parts/parts/reviews/reviews',
									'with' ); ?>
							<?php
							endwhile;
							// Возвращаем оригинальные данные поста. Сбрасываем $post.
							wp_reset_postdata();
							?>
                        </div>
                        <div class="swiper-button-next"><?= file_get_contents( $arrow_right ) ?></div>
                        <div class="swiper-button-prev"><?= file_get_contents( $arrow_left ) ?></div>
                    </div>
					<?php

					while ( $query->have_posts() ) :
						$query->the_post();

						get_template_part( 'template-parts/parts/modals/modals' );
						?>


					<?php endwhile; ?>
                </div>

			<?php endif; ?>

			<?php if ( $query2->have_posts() ): ?>
                <div class="section__reviews-row row">

                    <div class="section__reviews-row-without swiper swiper-without">
                        <div class="swiper-wrapper">
							<?php


							while ( $query2->have_posts() ) :
								$query2->the_post();
								?>

								<?php
								get_template_part( 'template-parts/parts/reviews/reviews',
									'without' ); ?>
							<?php
							endwhile;
							// Возвращаем оригинальные данные поста. Сбрасываем $post.
							wp_reset_postdata();
							?>
                        </div>
                        <div class="swiper-button-next"><?= file_get_contents( $arrow_right ) ?></div>
                        <div class="swiper-button-prev"><?= file_get_contents( $arrow_left ) ?></div>
                    </div>
                </div>

			<?php endif; ?>


        </div>
    </section>
<?php endif; ?>