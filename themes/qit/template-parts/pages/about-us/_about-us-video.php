<?php
/*
 * About us: Video
 */
defined( 'ABSPATH' ) || exit;

/**
 * Fields
 */
$field  = get_query_var( 'about_us_field' );
$iframe = $field['video'];

// Use preg_match to find iframe src.
preg_match( '/src="(.+?)"/', $iframe, $matches );
$src = $matches[1];

// Add extra parameters to src and replace HTML.
$params  = array(
	'hd'       => 1,
	'autohide' => 1,
	'showinfo' => 0,
	'controls' => 0,
	'rel'=>0,
	'amp;fs'=>0,
	'amp;showinfo'=>0
);
$new_src = add_query_arg( $params, $src );
$iframe  = str_replace( $src, $new_src, $iframe );


// Add extra attributes to iframe HTML.
$attributes = 'frameborder="0" class="h-100 w-100" id="about-us-video"';
$iframe     = str_replace( '></iframe>', ' ' . $attributes . '></iframe>',
	$iframe );

// Display customized HTML.
?>
<section class="section__video section vh-100 position-relative">
    <div class="container-fluid h-100 px-0">
        <div class="section__video-row  h-100 row justify-content-center">
            <div class="col-12 col-sm-12  h-100 p-0">
				<?= $iframe; ?>

            </div>
        </div>
    </div>
</section>