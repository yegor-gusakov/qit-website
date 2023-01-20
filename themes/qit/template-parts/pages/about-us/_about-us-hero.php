<?php
/*
 * About us: Hero
 */
defined( 'ABSPATH' ) || exit;

/**
 * Fields
 */
$field        = get_query_var( 'about_us_field' );
$bgimage      = $field['background_image'];
$badge        = $field['badge'];
$title        = $field['title'];
$text         = $field['text'];
$button       = $field['button'];
$mousescroll  = get_template_directory_uri()
                . '/assets/userfiles/icons/scroll.svg';
$background   = $field['background'];
$video        = $field['video_file'];
$video_source = $field['video_source'];

$iframe = $field['video_link'];
if ( $field['video_link'] ):
// Use preg_match to find iframe src.
	preg_match( '/src="(.+?)"/', $iframe, $matches );
	if ( $matches ):
		$src = $matches[1];

// Add extra parameters to src and replace HTML.
		$params  = array(
//	'hd'       => 1,
//	'autohide' => 1,
//	'showinfo' => 0,
//	'controls' => 0,
//	'rel'=>0,
//	'amp;fs'=>0,
//	'amp;showinfo'=>0,
			'playsinline' => 1
		);
		$new_src = add_query_arg( $params, $src );
		$iframe  = str_replace( $src, $new_src, $iframe );
// Add extra attributes to iframe HTML.
	endif;
	$attributes = 'frameborder="0" class="w-100" id="about-us-video"';
	$iframe     = str_replace( '></iframe>', ' ' . $attributes . '></iframe>',
		$iframe );
endif;
?>
<section class="section section__hero vh-100 position-relative" <?= ( $background == 'image' ) ? 'style="background-image:linear-gradient(90deg, #00000099 26.58%, rgba(0, 0, 0, 0.38) 197%),url(' . $bgimage . ');"' : false ?>>
	<?php if ( $background == 'video' ): ?>
		<?php if ( $video_source == 'link' ):?>
            <div class="video-wrapper">
                <video class="w-100 h-100" id="hero_video" poster="" muted loop playsinline autoplay>
                    <source src="<?= $iframe ?>" type="video/mp4">
                </video>
            </div>
		<?php
		endif;
		if ( $video_source === 'file' ):?>
            <div class="video-wrapper">
                <video class="w-100 h-100" muted loop autoplay playsinline>
                    <source src="<?= $video['url'] ?>" type="video/webm" preload='auto'>
                </video>
            </div>
		<?php endif; ?>
	<?php endif; ?>
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
                        <button class="button btn-outline globalModalQuote" type="button"><?= $button['title'] ?></button>
                    </div>
				<?php endif ?>
            </div>
        </div>
        <div class="section__hero-row row justify-content-center">
            <div class="col-auto">
                <div class="section__hero-mousescroller position-absolute bottom-25">
                    <a href="#metrics"><?= file_get_contents( $mousescroll ) ?></a>
                </div>
            </div>
        </div>
    </div>
</section>