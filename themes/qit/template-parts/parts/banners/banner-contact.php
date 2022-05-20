<?php
$left                  = get_field( 'left', 'theme_settings' );
$right                 = get_field( 'right', 'theme_settings' );
$contact_title         = $left['contact_title'];
$contact_form          = $left['shortcode_contact_form'];
$fact_title            = $right['facts_title'];
$facts_repeater        = $right['facts_repeater'];
$reviews_repeater      = $right['reviews_repeater'];
$right_image           = $right['reviews_full_img'];
$contact_image_of_text = $args['contact_image_of_text'];
?>


<section class="section section__banner-contact">

    <div class="container">
        <div class="section__banner-contact-row row align-items-stretch">
            <div class="section__banner-contact-row-left col-lg-6 p-sm-5">

                <h4><?= $contact_title ?></h4>

				<?= do_shortcode( $contact_form ) ?>

            </div>
			<?php switch ( $contact_image_of_text ):
				case 'text':
					?>
                    <div class="section__banner-contact-row-right col-lg-6 p-sm-5 d-none d-lg-block">
                        <h5><?= $fact_title ?></h5>
						<?php if ( $facts_repeater ): ?>
                            <div class="row">

								<?php foreach ( $facts_repeater as $fact ) : ?>
									<?php
									$fact_number = $fact['title'];
									$fact_text   = $fact['text'];
									?>
                                    <div class="col-lg-6 align-items-stretch mb-5 ">
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
						<?php if ( $reviews_repeater ): ?>

                            <div class="row">
                                <ul class="list-group list-group-horizontal">
									<?php foreach (
										$reviews_repeater

										as $review
									) :
										$review_image = $review['image']
										?>

                                        <li class="list-group-item border-0 bg-transparent">
                                            <img
                                                    src="<?= $review_image['url'] ?>"
                                                    alt="<?= $review_image['alt'] ?>">
                                        </li>
									<?php endforeach; ?>
                                </ul>
                            </div>
						<?php endif; ?>
                    </div>
					<?php
					break;
				case 'image':
					?>
                    <div class="section__banner-contact-row-right col-lg-6 p-0 d-none d-lg-block">
                        <img src="<?= $right_image['url'] ?>"
                             alt="<?= $right_image['alt'] ?>" class="h-100">
                    </div>
					<?php
					break;

			endswitch; ?>

        </div>
    </div>
</section>