<?php
/*
 * Referral program: Form
 */
defined( 'ABSPATH' ) || exit;

/**
 * Fields
 */
$field       = get_query_var( 'referral_program_field' );
$image = $field['contact_image'];
$form = $field['form'];
?>
<section class="section section__form-contact" id="section-form">
	<div class="container">
		<div class="section__form-contact-row row ">
			<div class="section__form-contact-row-left col-lg-6 ">
				<?= do_shortcode( '[contact-form-7 id="'.$form.'" title="Refer a friend"]' ) ?>
			</div>
            <div class="section__form-contact-row-right col-lg-6 d-none d-lg-block">
                <img src="<?= $image['url'] ?>" alt="<?= $image['alt'] ?>" class="h-100 w-100">
            </div>
		</div>
	</div>
</section>