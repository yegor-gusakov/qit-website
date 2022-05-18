<?php
defined( 'ABSPATH' ) || exit;
/**
 * @qit_header_TagHeaderOpen
 */
add_action( 'header_parts', 'qit_header_TagHeaderOpen', 10 );
function qit_header_TagHeaderOpen() {
	$classes = get_body_class();

	?>
    <!-- HEADER -->
    <header class="header">
	<?php
}

/**
 * @qit_header_TagHeaderInner
 */
add_action( 'header_parts', 'qit_header_TagHeaderInner', 20 );
function qit_header_TagHeaderInner() {
	$logo_icon = get_field( 'logo', 'theme_settings' );
	$burger = get_stylesheet_directory().'/assets/userfiles/icons/burger_menu.svg';
	$burger_close= get_stylesheet_directory().'/assets/userfiles/icons/closemark.svg';
	?>

    <!-- container -->
    <div class="container">
        <div class="header__row row flex-wrap justify-content-center align-items-center py-1">
            <div class="header__row-left col-lg-1 col-4 col-sm-2">
                <a href="<?= get_home_url() ?>"
                   class="d-flex align-items-center me-md-auto text-dark text-decoration-none header-logo">
					<?= file_get_contents( $logo_icon['url'] ); ?>
                </a>
            </div>
            <div class="header__row-right col d-flex  justify-content-end align-items-center">

                <!-- menu -->
				<?php
				/*
				 * Args Nav Menu
				 */

				$args = array(
					'menu'            => 'header',
					// match name to yours
					'theme_location'  => 'main_menu',
					'container'       => 'div',
					'container_class' => 'header__menu',
					'fallback_cb'     => false,
					'menu_class' => 'header__menu-list menu nav flex-row pb-4 pb-sm-0 navbar-nav me-auto mb-lg-0',
				);
				wp_nav_menu( $args );
				?>

                <button class="btn button d-none d-sm-block"
                        type="button"><?= __( 'get a quote' ) ?></button>
                <button class="navbar-toggler rekki-toggler border-0 d-sm-none d-block col-2" type="button" data-toggle="collapse" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><div class="animated-icon"><span></span><span></span><span></span></div></button>
                <!-- end menu -->
            </div>
        </div>

    </div>
    <!-- end container -->

	<?php
}

/**
 * @qit_header_TagHeaderClose
 */
add_action( 'header_parts', 'qit_header_TagHeaderClose', 30 );
function qit_header_TagHeaderClose() {
	?>
    </header>
    <!-- END HEADER -->
	<?php
}

