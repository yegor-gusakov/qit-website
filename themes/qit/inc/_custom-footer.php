<?php
defined( 'ABSPATH' ) || exit;
/**
 * @qit_footer_TagFooterOpen
 */
add_action( 'footer_parts', 'qit_footer_TagFooterOpen', 20 );
function qit_footer_TagFooterOpen() {
	?>
    <footer class="footer">
    <div class="container ">
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

	$locations = get_field( 'map_location', 'theme_settings' );

	$copyright               = get_field( 'copyright', 'theme_settings' );
	$reviews_repeater_footer = get_field( 'reviews_repeater_footer',
		'theme_settings' );
	$footer_text             = get_field( 'footer_text', 'theme_settings' );
	?>
    <div class="footer__row row">
        <div class="footer__row-left col-12 col-sm-6 col-md-6   col-lg-4">
            <div class="footer__row-left-logo ">
                <a href="<?= get_home_url() ?>"
                   class="d-flex align-items-center  text-dark text-decoration-none header-logo">
					<?= file_get_contents( $logo_icon['url'] ); ?>
                </a>
            </div>
			<?php if ( $footer_text ): ?>
                <div class="footer__row-left-text">
                    <p><?= $footer_text ?></p>
                </div>
			<?php endif; ?>
	        <?php if ( $reviews_repeater_footer ): ?>
                <div class="footer__row footer__row-reviews row d-none d-sm-block mt-5">
                    <div class="footer__row-left">
                        <div class="col">
                            <ul class="list-group list-group-horizontal">
						        <?php foreach ( $reviews_repeater_footer as $review ) :
							        $review_image = $review['image'];
							        $review_link = $review['link'] ?>
                                    <li class="list-group-item border-0 bg-transparent">
                                        <a href="<?= $review_link ?>"
                                           target="_blank"><img
                                                    src="<?= $review_image['url'] ?>"
                                                    alt="<?= $review_image['alt'] ?>"></a>
                                    </li>
						        <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
	        <?php endif; ?>
        </div>
		<?php if ( $reviews_repeater_footer ): ?>
            <div class="footer__row footer__row-reviews d-block d-sm-none ">
                <div class="col-sm-12">
                    <ul class="list-group list-group-horizontal justify-content-between">
						<?php foreach ( $reviews_repeater_footer as $review ) :
							$review_image = $review['image'] ?>
                            <li class="list-group-item border-0 bg-transparent">
                                <a href="<?= $review_link ?>" target="_blank"><img
                                            src="<?= $review_image['url'] ?>"
                                            alt="<?= $review_image['alt'] ?>"></a>
                            </li>
						<?php endforeach; ?>
                    </ul>
                </div>
            </div>
		<?php endif; ?>
        <div class="footer__row-right col col-sm-6 col-md-6 col-lg-8 d-flex flex-wrap justify-content-lg-end ">
			<?php

			if ( function_exists( 'dynamic_sidebar' ) ) : ?>
                <div class="footer__row-right-menu col-md-4 col-sm-4 col-6 col-lg-3 me-auto "><?php dynamic_sidebar( 'footer-col-5' ); ?>        </div>
			<?php
			endif;
			if ( function_exists( 'dynamic_sidebar' ) ) : ?>
                <div class="footer__row-right-menu col-md-4 col-sm-4 col-6 col-lg-3  me-auto"><?php dynamic_sidebar( 'footer-col-1' ); ?>        </div>
			<?php
			endif;
			if ( function_exists( 'dynamic_sidebar' ) ) : ?>
                <div class="footer__row-right-menu col-md-5 col-sm-5 col-6  col-lg-2 me-auto"><?php dynamic_sidebar( 'footer-col-2' ); ?>        </div>
			<?php
			endif;
			if ( function_exists( 'dynamic_sidebar' ) ) : ?>
                <div class="footer__row-right-menu col-md-3 col-sm-3 col-6  col-lg-3 me-auto "><?php dynamic_sidebar( 'footer-col-3' ); ?>        </div>
			<?php
			endif;
			if ( function_exists( 'dynamic_sidebar' ) ) :?>
                <div class="footer__row-right-menu col-md-6 col-sm-6 col-6  col-lg-3  "><?php dynamic_sidebar( 'footer-col-4' ); ?>        </div>
			<?php
			endif;
			?>
        </div>
    </div>

    <div class="footer__row footer__row-info row">
		<?php if ( have_rows( 'social_icons', 'theme_settings' ) ): ?>
            <div class="footer__row-left col">
                <p class="text-follow-us"><?= __( 'Follow Us' ) ?></p>
                <ul class="list-group list-group-horizontal">
					<?php
					foreach ( $global_socials as $social ):
						$link = $social['link']['url'];
						$icon = $social['icon']; ?>
                        <li class="list-group-item border-0 bg-transparent">
                            <a href="<?= $link ?>"
                               target="_blank"><?= file_get_contents( $icon ) ?></a>
                        </li>
					<?php endforeach; ?>
                </ul>
            </div>
		<?php endif; ?>
        <div class="footer__row-right col-md-6 col-sm-7">

            <p class="text-office"><?= __( 'Offices' ) ?></p>

			<?php foreach ( $locations as $location ):
				$google_map = $location['map_location_url'];
				$flag = $location['country'];
				$address = $location['address'];
				?>
				<?php if ( $google_map ): ?>
                <a href="<?= $google_map ?>"
                   target="_blank" class="text-address">
					<?= file_get_contents( get_stylesheet_directory()
					                       . '/assets/userfiles/icons/countries/'
					                       . $flag . '.svg' ) . $address ?>
                </a>
			<?php
			else:?>
                <p class="text-address">
					<?= file_get_contents( get_stylesheet_directory()
					                       . '/assets/userfiles/icons/countries/'
					                       . $flag . '.svg' ) . $address ?>
                </p>
			<?php endif;
			endforeach; ?>

        </div>
    </div>
    <div class="footer__subfooter d-block text-center ">
        <p class="text-copyright"><?= $copyright ?></p>
    </div>
	<?php
}

/**
 * @qit_footer_TagFooterClose
 */
add_action( 'footer_parts', 'qit_footer_TagFooterClose', 100 );
function qit_footer_TagFooterClose() {
	?></div>
    </footer>
	<?php
}
