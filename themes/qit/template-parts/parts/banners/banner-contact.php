<?php
$left             = get_field( 'left', 'theme_settings' );
$right            = get_field( 'right', 'theme_settings' );
$contact_title    = $left['contact_title'];
$contact_form     = $left['shortcode_contact_form'];
$fact_title       = $right['facts_title'];
$facts_repeater   = $right['facts_repeater'];
$reviews_repeater = $right['reviews_repeater'];
$right_image      = $right['reviews_full_img'];
if ( $args ):

	$contact_image_of_text = $args['contact_image_of_text'];
	$image                 = $args['image'];

endif;
?>
<section class="section section__banner-contact" id="section-contact">
    <div class="container">
        <div class="section__banner-contact-row row ">
            <div class="section__banner-contact-row-left col-lg-6 ">
                <h4><?= $contact_title ?></h4>
				<?= do_shortcode( $contact_form ) ?>
            </div>
            <div class="section__banner-contact-row-right col-lg-6 d-none d-lg-block">
                <img src="<?= $image['url'] ?>" alt="<?= $right_image['alt'] ?>" height="700" width="520">
            </div>
        </div>
    </div>
</section>