<?php
$left             = get_field( 'left', 'theme_settings' );
$right            = get_field( 'right', 'theme_settings' );
$contact_title    = $left['contact_title'];
$contact_form     = $left['shortcode_contact_form'];
$fact_title       = $right['facts_title'];
$facts_repeater   = $right['facts_repeater'];
$reviews_repeater = $right['reviews_repeater'];

?>


<section class="section section__banner-contact">

    <div class="container">
        <div class="section__banner-contact-row row align-items-stretch">
            <div class="section__banner-contact-row-left col-md-6 p-5">

                <h4><?= $contact_title ?></h4>

				<?= do_shortcode( $contact_form ) ?>

            </div>
            <div class="section__banner-contact-row-right col-md-6 p-5">
                <h5><?= $fact_title ?></h5>
				<?php if ( $facts_repeater ): ?>
                    <div class="row">

						<?php foreach ( $facts_repeater as $fact ) : ?>
							<?php
							$fact_number = $fact['title'];
							$fact_text   = $fact['text'];
							?>
                            <div class="col-md-6 align-items-stretch mb-5 ">
                            <div class="card  mb-3 border-0 border-bottom bg-transparent h-100"
                                 style="max-width: 18rem;">
                                <div class="card-header p-0 border-0 bg-transparent">
                                    <h5 class="card-title"><?= $fact_number ?>
                                        %</h5></div>
                                <div class="card-body p-0 border-0">
                                    <p class="card-text"><?= $fact_text ?></p>
                                </div>
                            </div>
                            </div><?php
						endforeach; ?>
                    </div>

				<?php endif; ?>
                <div class="row">
					<?php if ( $reviews_repeater ): ?>
                    <ul class="list-group list-group-horizontal">
						<?php foreach (
							$reviews_repeater

							as $review
						) :
							$review_image = $review['image']
							?>

                            <li class="list-group-item border-0 bg-transparent"><img
                                        src="<?= $review_image['url'] ?>"
                                        alt="<?= $review_image['alt'] ?>"></li>
						<?php endforeach; ?>
                    </ul>

                </div>
			<?php endif; ?>

            </div>
        </div>
    </div>
</section>