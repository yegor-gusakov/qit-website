<?php
/*
 * About us: Hero
 */
defined( 'ABSPATH' ) || exit;

/**
 * Fields
 */
$field       = get_query_var( 'about_us_field' );
$bgimage     = $field['background_image'];
$subtitle    = $field['subtitle'];
$title       = $field['title'];
$mousescroll = get_stylesheet_directory()
               . '/assets/userfiles/icons/scroll.svg';
?>

<section class="section__hero section vh-100 position-relative"
         style="background-image:url(<?= $bgimage ?>) ">
	<div class="container h-100">
		<div class="section__hero-row row align-items-center h-100">
			<div class="col-lg-7 col-sm-11">
				<?php if ( $subtitle ): ?>

					<div class="section__hero-row-subtitle d-none d-sm-block">
						<span><?= $subtitle ?></span>
					</div>
				<?php endif ?>
				<?php if ( $title ): ?>

					<div class="section__hero-row-title">
						<h1><?= $title ?></h1>
					</div>
				<?php endif ?>

			</div>
		</div>
		<div class="section__hero-row row justify-content-center">
			<div class="col-auto">
				<div class="section__hero-mousescroller position-absolute bottom-25">
					<a href="#">            <?= file_get_contents( $mousescroll ) ?></a>
				</div>
			</div>
		</div>
	</div>
</section>