<?php
$post             = get_post( get_the_id() );
$slug             = $post->post_name;
$terms_tags       = wp_get_post_terms( get_the_id(), array( 'qit_review_tags' ) );
$icon_play        = get_template_directory_uri()
                    . '/assets/userfiles/icons/Play.svg';
$countries_flag   = get_field_object( 'country' );
$country_flag     = $countries_flag['value'];
$country_flag_svg = get_template_directory_uri()
                    . '/assets/userfiles/icons/countries/' . $country_flag
                    . '.svg';


?>
<div class="swiper-slide">
    <div class="card border-0 bg-transparent align-items-center">
        <div class="row  w-100">
            <div class="col-lg-5 section__reviews-row-with-modal rounded-circle bg-white position-relative" data-bs-target="#<?= $slug ?>-<?= get_the_id() ?>" id="review-<?= $slug ?>-<?= get_the_id() ?>">
                <img src="<?= get_the_post_thumbnail_url() ?>" class="img-fluid rounded-circle" alt="<?= get_the_title() ?>" >
                <?= file_get_contents($icon_play)?>
            </div>
            <div class="col-lg-7 col-text ">
                <div class="card-body ">
                    <p class="card-text d-flex"><?php foreach ( $terms_tags as $term ) : ?><span class="tags tags-<?= $term->slug ?>"><?= $term->name ?></span><?php endforeach; ?></p>
                    <h3><?= get_the_excerpt() ?></h3>
                    <div class="row section__reviews-row-comment ">
                        <div class="col-lg-2 col-3 col-md-2 col-sm-2 review-person-photo mb-0">
                            <img src="<?= the_field( 'carousel_image', get_the_id() ) ?>" alt="<?= get_the_title() ?>" class="card-img rounded-circle" width="80" height="80">
                            <span class="country"><?= file_get_contents( $country_flag_svg ); ?></span>
                        </div>
                        <div class="col col-md-auto review-person-name">
                            <h6 class="card-title "><?= get_the_title() ?></h6>
                            <p class="card-text"><small><?= the_field( 'position', get_the_id() ) ?></small>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>