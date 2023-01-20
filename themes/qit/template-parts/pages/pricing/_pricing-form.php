<?php
/*
 * Pricing: Form
 */
defined( 'ABSPATH' ) || exit;

/**
 * Fields
 */
$field     = get_query_var( 'pricing_field' );
$badge     = $field['badge'];
$title     = $field['title'];
$shortcode = $field['shortcode'];

?>
<section class="section section__form" id="pricing">
    <div class="container">
		<?php if ( $badge ): ?>
            <div class="section__form-row row justify-content-center">
                <h6 class="section__form-row-badge m-0 w-auto text-white text-uppercase">
					<?= $badge ?>
                </h6>
            </div>
		<?php endif ?>
		<?php if ( $title ): ?>
            <div class="section__form-row row text-center">
                <h2 class="section__form-row-title"><?= $title ?></h2>
            </div>
		<?php endif ?>
        <div class="section__form-row">
			<?php if ( $shortcode ): ?>
				<?= do_shortcode( $shortcode ) ?>
			<?php endif; ?>
        </div>
    </div>
</section>