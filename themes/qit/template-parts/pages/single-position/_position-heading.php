<?php
/*
 * Position: Heading
 */
defined( 'ABSPATH' ) || exit;

/**
 * Fields
 */
$arrow = get_template_directory_uri().'/assets/userfiles/icons/arrow-left-small.svg';
?>

<section class="section section__heading">
	<div class="container">
		<div class="section__heading-row row">
			<div class="col-lg-10 col-sm-12 col-12">
				<a href="<?= get_post_type_archive_link( get_post_type( get_the_ID() ) ) ?>" class="return-back">
					<?= file_get_contents($arrow). __( 'All positions', 'qit' ) ?>
				</a>
			</div>
		</div>
	</div>
</section>