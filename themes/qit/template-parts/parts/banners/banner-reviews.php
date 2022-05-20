<?php
$reviews_repeater = get_field( 'reviews_repeater', 'qit_banners' );
?>
<?php if ( $reviews_repeater ): ?>
    <section class="section section__banner-reviews py-5">
        <div class="container">
            <div class="section__banner-reviews-row row justify-content-between align-items-center">

				<?php foreach (
					$reviews_repeater

					as $item
				): ?>
                    <div class="col-lg-2 col-sm-6 col-12 mb-5 mb-lg-0">
						<?php
						$image = $item['image'];
						echo file_get_contents( $image );
						?>
                    </div>
				<?php endforeach; ?>

            </div>
        </div>
    </section>
<?php endif; ?>
