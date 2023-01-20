<?php
/*
 * Expertise: Hero
 */
defined( 'ABSPATH' ) || exit;

/**
 * Fields
 */
$field       = get_query_var( 'expertise_field' );
$bgimage     = $field['background_image'];
$badge       = $field['badge'];
$title       = $field['title'];
$text        = $field['text'];
$button      = $field['button'];
$mousescroll = get_template_directory_uri()
               . '/assets/userfiles/icons/scroll.svg';
$table_image  = get_field( 'tablet_image', get_the_ID() );
$mobile_image = get_field( 'mobile_image', get_the_ID() );
?>

<section id="section_hero"
         class="section section__hero position-relative vh-100"
         style="background-image:url(<?= $bgimage ?>);"
	<?= ( $table_image ) ? 'data-bg-tablet="' . $table_image . '"' : ' ' ?>

	<?= ( $mobile_image ) ? 'data-bg-mobile="' . $mobile_image . '"' : ' ' ?>>
    <div class="container h-100">
        <div class="section__hero-row row align-items-center h-100">
            <div class="col-lg-8 col-sm-11">
				<?php if ( $badge ): ?>
                    <div class="section__hero-row">
                        <h6 class="section__hero-row-badge white  m-0 w-auto text-uppercase"><?= $badge ?></h6>
                    </div>
				<?php endif ?>
				<?php if ( $title ): ?>
                    <div class="section__hero-row-title">
                        <h1><?= $title ?></h1>
                    </div>
				<?php endif ?>
				<?php if ( $text ): ?>
                    <div class="section__hero-row-text">
                        <p><?= $text ?></p>
                    </div>
				<?php endif ?>
				<?php if ( $button ): ?>
                    <div class="section__hero-row-button">
                        <button class="button btn-outline globalModalQuote" type="button"><?= $button['title'] ?>
                        </button>
                    </div>
				<?php endif ?>
            </div>
        </div>
        <div class="section__hero-row row justify-content-center">
            <div class="col-auto">
                <div class="section__hero-mousescroller position-absolute bottom-25">
                    <a href="#areas"><?= file_get_contents( $mousescroll ) ?></a>
                </div>
            </div>
        </div>
    </div>
</section>