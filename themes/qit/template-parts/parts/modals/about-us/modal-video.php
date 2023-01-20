<?php
$iframe  = $args['video'];
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
$attributes   = 'frameborder="0" class="w-100 d-block" id="about-us-video"';

$iframe       = str_replace( '></iframe>', ' ' . $attributes . '></iframe>',
	$iframe );

?>
<div class="modal fade bd-example-modal-lg" id="about-company" tabindex="-1" aria-labelledby="about-company-label" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body p-0">
                <?= $iframe?>
			</div>
		</div>
	</div>
</div>