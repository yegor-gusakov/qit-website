<?php
$post       = get_post( get_the_id() );
$slug       = $post->post_name;
$terms_tags = wp_get_post_terms( get_the_id(), array( 'qit_review_tags' ) );
$icon_play  = get_stylesheet_directory()
              . '/assets/userfiles/icons/Play.svg';
?>
<div class="swiper-slide">
    <div class="card mb-3 border-0 bg-transparent">
        <div class="row g-0 align-items-center mb-3">
            <div class="col-md-5 section__reviews-row-with-modal rounded-circle bg-white position-relative">
                <img src="<?= get_the_post_thumbnail_url() ?>"
                     class="img-fluid rounded-circle"
                     alt="<?= get_the_title() ?>" data-bs-toggle="modal"
                     data-bs-target="#<?= $slug ?>-<?= get_the_id() ?>">
				<?= file_get_contents( $icon_play ) ?>
            </div>
            <div class="col-md-7 text-start">
                <div class="card-body px-3">
                    <p class="card-text ">
						<?php foreach ( $terms_tags as $term ) : ?>
                            <span class="tags tags-<?= $term->slug ?>"><?= $term->name ?></span>
						<?php endforeach; ?>
                    </p>
	                <h3><?= get_the_excerpt() ?></h3>
                    <div class="row">
                        <div class="col-md-2">
                            <img src="<?= get_the_post_thumbnail_url() ?>"
                                 alt="<?= get_the_title() ?>"
                                 class="card-img rounded-circle">
                        </div>
                        <div class="col">
                            <h6 class="card-title m-0"><?= get_the_title() ?></h6>
                            <p class="card-text">
                                <small><?= the_field('position',get_the_id()) ?></small>
                            </p>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>