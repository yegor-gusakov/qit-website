<?php
/*
 * Pricing: Hero
 */
defined( 'ABSPATH' ) || exit;

/**
 * Fields
 */
$field       = get_query_var( 'pricing_field' );
$bgimage     = $field['background_image'];
$badge       = $field['badge'];
$title       = $field['title'];
$text        = $field['text'];
$button      = $field['button'];
$mousescroll = get_template_directory_uri()
               . '/assets/userfiles/icons/scroll.svg';
?>

<section class="section section__hero vh-100 position-relative" style="background-image:linear-gradient(90deg, #00000099 26.58%, rgba(0, 0, 0, 0.38) 197%),url(<?= $bgimage ?>);">
    <div class="container h-100">
        <div class="section__hero-row row align-items-center h-100">
            <div class="col-lg-8 col-sm-11">
				<?php if ( $badge ): ?>
                    <div class="section__hero-row ">
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
                        <button class="button btn-outline globalModalQuote" type="button"><?= $button['title'] ?></button>
                    </div>
				<?php endif ?>
            </div>
        </div>
        <div class="section__hero-row row justify-content-center">
            <div class="col-auto">
                <div class="section__hero-mousescroller position-absolute bottom-25">
                    <a href="#pricing"><?= file_get_contents( $mousescroll ) ?></a>
                </div>
            </div>
        </div>
    </div>
</section>