<?php
$review_position  = get_field( 'position', get_the_ID() );
$countries_flag   = get_field_object( 'country' );
$country_flag     = $countries_flag['value'];
$country_flag_svg = get_template_directory_uri()
                    . '/assets/userfiles/icons/countries/' . $country_flag
                    . '.svg';
$avatar = get_template_directory_uri().'/assets/userfiles/icons/Avatar.svg';

?>
<div class="swiper-slide">
    <div class="card border-0 bg-transparent" style="max-width: 540px;">
        <div class="row align-items-center ">
            <div class="col-lg-2 col-12 section__reviews-row-without-img review-person-photo rounded-circle bg-white">
                <?php if(get_the_post_thumbnail()):?>
                    <img src="<?= get_the_post_thumbnail_url() ?>" class="img-fluid rounded-circle" alt="<?= get_the_title() ?>" width="80" height="80">
                <?php else:?>
                    <?= file_get_contents($avatar)?>
                <?php endif;?>
				<?php if ( $country_flag_svg ): ?>
                    <span class="country"><?= file_get_contents( $country_flag_svg ); ?></span>
				<?php endif ?>
            </div>
            <div class="col-lg-9 col-text">
                <div class="card-body ">
                    <h4 class="card-title  "><?= get_the_title() ?></h4>
					<?php if ( $review_position ): ?>
                        <p class="card-text">
                            <small><?= $review_position ?></small>
                        </p>
					<?php endif; ?>
                </div>
            </div>
        </div>
        <div class="row ">
            <div class="col-lg-12 comment-text">
				<?= get_the_excerpt() ?>
            </div>
        </div>
    </div>
</div>
