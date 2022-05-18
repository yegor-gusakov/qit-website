<?php
$post             = get_post( get_the_id() );
$slug             = $post->post_name;
$terms_tags       = wp_get_post_terms( get_the_id(),
	array( 'qit_review_tags' ) );
$icon_play        = get_stylesheet_directory()
                    . '/assets/userfiles/icons/Play.svg';
$countries_flag   = get_field_object( 'country' );
$country_flag     = $countries_flag['value'];
$country_flag_svg = get_stylesheet_directory()
                    . '/assets/userfiles/icons/countries/' . $country_flag
                    . '.svg';


?>
<div class="swiper-slide">
    <div class="card mb-3 border-0 bg-transparent align-items-center">
        <div class="row align-items-center mb-3 w-100">
            <div class="col-lg-5 section__reviews-row-with-modal rounded-circle bg-white position-relative">
                <img src="<?= get_the_post_thumbnail_url() ?>"
                     class="img-fluid rounded-circle"
                     alt="<?= get_the_title() ?>" data-bs-toggle="modal"
                     data-bs-target="#<?= $slug ?>-<?= get_the_id() ?>">
				<?= file_get_contents( $icon_play ) ?>
            </div>
            <div class="col-lg-7 text-start p-4 px-0 px-sm-4">
                <div class="card-body px-sm-3 px-0">
                    <p class="card-text mb-4">
						<?php foreach ( $terms_tags as $term ) : ?>
                            <span class="tags tags-<?= $term->slug ?>"><?= $term->name ?></span>
						<?php endforeach; ?>
                    </p>
                    <h3><?= get_the_excerpt() ?></h3>
                    <div class="row section__reviews-row-comment">
                        <div class="col-lg-2 col-3 col-md-2 col-sm-2 review-person-photo">
                            <img src="<?= get_the_post_thumbnail_url() ?>"
                                 alt="<?= get_the_title() ?>"
                                 class="card-img rounded-circle">
                            <span class="country">                            <?= file_get_contents( $country_flag_svg ); ?></span>
                        </div>
                        <div class="col col-md-auto col-sm-4">
                            <h6 class="card-title m-0"><?= get_the_title() ?></h6>
                            <p class="card-text">
                                <small><?= the_field( 'position',
										get_the_id() ) ?></small>
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>