<?php
$reviews_repeater = get_field( 'reviews_repeater', 'qit_banners' );
?>
<?php if ( $reviews_repeater ): ?>
    <section class="section section__banner-reviews">
        <div class="container">
            <div class="section__banner-reviews-row row justify-content-between align-items-center">
				<?php foreach ( $reviews_repeater as $item ):$image = $item['image'];$link = $item['link']; ?>
                    <div class="col-sm-3 col-12 review">
                        <a href="<?=$link?>" target="_blank">
						<?php echo file_get_contents( $image ); ?>
                        </a>
                    </div>
				<?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endif; ?>
