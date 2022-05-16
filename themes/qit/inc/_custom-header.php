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
	?>

    <!-- container -->
    <div class="container">
        <div class="header__row row flex-wrap justify-content-center align-items-center py-1">
            <div class="header__row-left col-md-1">
                <a href="<?=get_home_url()?>"
                   class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none header-logo">
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
		            'theme_location'  => 'main_menu',
		            'container'       => 'nav',
		            'container_class' => 'header__menu',
		            'menu_class'      => 'header__menu-list nav me-auto mb-2 mb-lg-0',
	            );
	            wp_nav_menu( $args );
	            ?>
                <button class="btn button" type="button"><?=__('get a quote')?></button>
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

