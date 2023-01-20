<?php
/*
 * About us: Video
 */
defined( 'ABSPATH' ) || exit;

/**
 * Fields
 */
$field   = get_query_var( 'about_us_field' );
$preview = $field['preview'];
//print_r($field);
$iframe  = $field['video_company'];
// Use preg_match to find iframe src.
preg_match( '/src="(.+?)"/', $iframe, $matches );
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
$attributes   = 'frameborder="0" class="w-100" id="about-us-video"';
$video_source = $field['video_source'];
$iframe       = str_replace( '></iframe>', ' ' . $attributes . '></iframe>',
	$iframe );

$video = $field['video_company_file'];
$icon_play        = get_template_directory_uri()
                    . '/assets/userfiles/icons/Play.svg';
?>
<section class="section__video section position-relative">
    <div class="container-fluid px-0 h-100">
        <div class="section__video-row row justify-content-center h-100">
            <div class="col-12 col-sm-12  p-0"data-bs-target="#about-company" >
                <img src="<?= $preview['url'] ?>" alt="<?= $preview['alt']?>" >
                <?= file_get_contents($icon_play)?>
            </div>
        </div>
</section>
<?php
get_template_part( 'template-parts/parts/modals/about-us/modal', 'video',['video'=>$field['video_company']] );
