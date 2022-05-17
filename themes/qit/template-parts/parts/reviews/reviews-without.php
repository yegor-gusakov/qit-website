<?php
$review_position  = get_field( 'position', get_the_ID() );
$countries_flag   = get_field_object( 'country' );
$country_flag     = $countries_flag['value'];
$country_flag_svg = get_stylesheet_directory()
                    . '/assets/userfiles/icons/countries/' . $country_flag
                    . '.svg';
?>
<div class="swiper-slide">
    <div class="card mb-3 border-0 bg-transparent" style="max-width: 540px;">
        <div class="row g-0 align-items-center mb-3">
            <div class="col-md-2 section__reviews-row-without-img review-person-photo rounded-circle bg-white">
                <img src="<?= get_the_post_thumbnail_url() ?>"
                     class="img-fluid rounded-circle"
                     alt="<?= get_the_title() ?>">
				<?php if ( $country_flag_svg ): ?>
                    <span class="country">

                    <?= file_get_contents( $country_flag_svg ); ?></span>
				<?php endif ?>
            </div>
            <div class="col-md-10 text-start">
                <div class="card-body px-3">
                    <h6 class="card-title m-0 "><?= get_the_title() ?></h6>
                    <p class="card-text"><small><?= $review_position ?></small>
                    </p>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-12 text-start">
		        <?= get_the_excerpt() ?>
            </div>
        </div>
    </div>
</div>
