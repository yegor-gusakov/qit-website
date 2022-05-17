<?php
$review_position = get_field( 'position', get_the_ID() );
?>
<div class="swiper-slide">
    <div class="card mb-3 border-0 bg-transparent" style="max-width: 540px;">
        <div class="row g-0 align-items-center mb-3">
            <div class="col-md-4 section__reviews-row-without-img rounded-circle bg-white">
                <img src="<?= get_the_post_thumbnail_url() ?>"
                     class="img-fluid rounded-circle"
                     alt="<?= get_the_title() ?>">
            </div>
            <div class="col-md-8 text-start">
                <div class="card-body px-3">
                    <h6 class="card-title m-0 "><?= get_the_title() ?></h6>
                    <p class="card-text"><small><?= $review_position ?></small>
                    </p>
                </div>
            </div>
            <div class="col-md-12 text-start">
				<?= get_the_content() ?>
            </div>
        </div>
    </div>
</div>
