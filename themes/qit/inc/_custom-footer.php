<?php
defined( 'ABSPATH' ) || exit;


/**
 * @qit_footer_TagFooterOpen
 */
add_action( 'footer_parts', 'qit_footer_TagFooterOpen', 20 );
function qit_footer_TagFooterOpen() {
	?>
    <!-- FOOTER -->
    <footer class="footer">
    <div class="container pt-5 pb-2">

	<?php
}

;
/**
 * @qit_footer_TagFooterInner
 */
add_action( 'footer_parts', 'qit_footer_TagFooterInner', 30 );
function qit_footer_TagFooterInner() {
	$logo_icon      = get_field( 'logo', 'theme_settings' );
	$global_socials = get_field( 'social_icons', 'theme_settings' );
	$address        = get_field( 'address', 'theme_settings' );
	$flag_estonia   = get_stylesheet_directory()
	                  . '/assets/userfiles/icons/estonia.svg';
	$copyright      = get_field( 'copyright', 'theme_settings' );


	$reviews_repeater_footer = get_field( 'reviews_repeater_footer',
		'theme_settings' )
	?>
    <div class="footer__row row">
        <div class="footer__row-left col-12 col-sm-6 col-md-6 mb-5 mb-sm-0 col-lg-4">
            <div class="footer__row-left-logo ">
                <a href="<?= get_home_url() ?>"
                   class="d-flex align-items-center mb-3 mb-md-0 me-md-auto mx-auto mx-sm-0 text-dark text-decoration-none header-logo">
					<?= file_get_contents( $logo_icon['url'] ); ?>
                </a>
            </div>
            <div class="footer__row-left-text">
                <p><?= get_bloginfo( 'description' ) ?></p>
            </div>
        </div>
		<?php if ( $reviews_repeater_footer ): ?>
            <div class="footer__row footer__row-reviewsmy-4 d-block d-sm-none mb-5">
                <div class="footer__row">
                    <div class="col-sm-12">
                        <ul class="list-group list-group-horizontal justify-content-between">
							<?php foreach (
								$reviews_repeater_footer

								as $review
							) :
								$review_image = $review['image']
								?>

                                <li class="list-group-item border-0 bg-transparent p-0 ">
                                    <img
                                            src="<?= $review_image['url'] ?>"
                                            alt="<?= $review_image['alt'] ?>">
                                </li>
							<?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>

		<?php endif; ?>
        <div class="footer__row-right col col-sm-5 col-md-5 col-lg-7 d-flex flex-wrap offset-sm-1">
			<?php

			if ( function_exists( 'dynamic_sidebar' )
			) : ?>
                <div class="footer__row-right-menu col-md-4 col-sm-4 col-6 col-lg-3 mb-5 mb-sm-0">

					<?php
					dynamic_sidebar( 'footer-col-1' );

					?>        </div>
			<?php
			endif;

			if ( function_exists( 'dynamic_sidebar' )

			) : ?>
                <div class="footer__row-right-menu col-md-5 col-sm-5 col-6 mb-5  col-lg-3 mb-sm-0">

					<?php
					dynamic_sidebar( 'footer-col-2' );

					?>        </div>
			<?php
			endif;

			if ( function_exists( 'dynamic_sidebar' )
			) : ?>
                <div class="footer__row-right-menu col-md-3 col-sm-3 col-6 mb-5  col-lg-3 mb-sm-0">

					<?php
					dynamic_sidebar( 'footer-col-3' );

					?>        </div>
			<?php
			endif;
			if ( function_exists( 'dynamic_sidebar' )
			) :
				?>
                <div class="footer__row-right-menu col-md-6 col-sm-6 col-6 mb-5  col-lg-3 mb-sm-0">

					<?php
					dynamic_sidebar( 'footer-col-4' );

					?>        </div>
			<?php
			endif;
			?>
        </div>
    </div>

	<?php if ( $reviews_repeater_footer ): ?>
        <div class="footer__row footer__row-reviews row d-none d-sm-block my-4">
            <div class="footer__row-left">
                <div class="col-sm-6">
                    <ul class="list-group list-group-horizontal">
						<?php foreach (
							$reviews_repeater_footer

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
            </div>
        </div>

	<?php endif; ?>
    <div class="footer__row footer__row-info row">
		<?php
		if ( have_rows( 'social_icons', 'theme_settings' ) ):

			?>
            <div class="footer__row-left col">
                <p class="text-follow-us"><?= __( 'Follow Us' ) ?></p>
                <ul class="list-group list-group-horizontal">
					<?php
					foreach ( $global_socials as $social ):

						$link = $social['link']['url'];
						$icon = $social['icon'];
						?>
                        <li class="list-group-item border-0 bg-transparent">
                            <a href="<?= $link ?>"><?= file_get_contents( $icon ) ?></a>
                        </li>

					<?php
					endforeach;
					?>
                </ul>
            </div>
		<?php

		endif;
		?>
        <div class="footer__row-right col-md-4 col-sm-6">
            <p class="text-office"><?= __( 'Office' ) ?></p>
            <p class="text-address">            <?= file_get_contents( $flag_estonia )
			                                        . $address ?>
            </p></div>
    </div>
    <div class="footer__subfooter d-block text-center pt-4 mt-4 ">
        <p class="text-copyright"><?= $copyright ?></p>

    </div>
	<?php
}

;
/**
 * @qit_footer_TagFooterClose
 */
add_action( 'footer_parts', 'qit_footer_TagFooterClose', 100 );
function qit_footer_TagFooterClose() {
	?>        </div>

    </footer>
    <!-- END FOOTER -->
	<?php
}
