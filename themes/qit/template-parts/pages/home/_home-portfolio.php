<?php
/*
 * Home: Coop Model
 */
defined( 'ABSPATH' ) || exit;

/**
 * Fields
 */
$field               = get_query_var( 'home_field' );
$badge               = $field['badge'];
$title               = $field['title'];

?>

<section class="section__portfolio section " id="timeline">
	<div class="container ">
		<div class="section__portfolio-row row ">
			<div class="section__portfolio-row row justify-content-center"><h6
					class="section__portfolio-row-badge  w-auto text-white text-uppercase"><?= $badge ?></h6>
			</div>
			<div class="section__portfolio-row row text-center">
				<h2 class="section__portfolio-row-title"><?= $title ?></h2>
			</div>

            <div class="row row-cols-1 row-cols-md-3 g-4">
               <?php

               // задаем нужные нам критерии выборки данных из БД
               $args = array(
	               'post_type' => 'qit_cases',
	               'posts_per_page' => 3,
	               'orderby' => 'date',
                   'order'=>'DESC'
               );

               $query = new WP_Query( $args );

               // Цикл
               if ( $query->have_posts() ) {
	               while ( $query->have_posts() ) {
		               $query->the_post();

                       get_template_part('template-parts/parts/cases/cases');

	               }
               }

               // Возвращаем оригинальные данные поста. Сбрасываем $post.
               wp_reset_postdata();?>
            </div>
		</div>
</section>