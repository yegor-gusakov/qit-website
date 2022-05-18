<?php
/*
 * Home: Hero
 */
defined( 'ABSPATH' ) || exit;

/**
 * Fields
 */
$field       = get_query_var( 'home_field' );
$bgimage     = $field['background_image'];
$subtitle    = $field['subtitle'];
$title       = $field['title'];
$text        = $field['text'];
$button      = $field['button'];
$mousescroll = get_stylesheet_directory()
               . '/assets/userfiles/icons/scroll.svg';
?>

<section class="section__hero section vh-100 position-relative"
         style="background-image:url(<?= $bgimage ?>) ">
    <div class="container h-100">
        <div class="section__hero-row row align-items-center h-100">
            <div class="col-md-7">
                <div class="section__hero-row-subtitle">
                    <span><?= $subtitle ?></span>
                </div>
                <div class="section__hero-row-title">
                    <h1><?= $title ?></h1>
                </div>
                <div class="section__hero-row-text">
                    <p><?= $text ?></p>
                </div>

                <div class="section__hero-row-button">
                    <button class="button btn-outline"
                            type="button"><?= $button['title'] ?></button>
                </div>
            </div>
            <div class="section__hero-mousescroller position-absolute bottom-25">
                <a href="">            <?= file_get_contents( $mousescroll ) ?></a>
            </div>
        </div>
    </div>
</section>